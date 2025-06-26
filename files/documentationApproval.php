<?php

class Documentation {
    public $documentName;
    public $documentVersion;
    public $documentText;
    public $translatedDocumentName;

    public function __construct($data) {
        $this->documentName = isset($data['documentName']) ? $data['documentName'] : '';
        $this->documentVersion = isset($data['documentVersion']) ? $data['documentVersion'] : '';
        $this->documentText = isset($data['documentText']) ? $data['documentText'] : '';
        $this->translatedDocumentName = '';
    }

    public function displayInfo() {
        return "Document Name: {$this->documentName}, Version: {$this->documentVersion}";
    }

    public function displayDocumentationText() {
        return $this->documentText;
    }
}

class DocumentationCollection {
    private $documents = [];
    public function __construct(array $data) {
        foreach ($data as $item) {
            if (isset($item['documentation']) && is_array($item['documentation'])) {
                foreach ($item['documentation'] as $docData) {
                    $this->documents[] = new Documentation($docData);
                }
            } else {
                error_log("Documentation data can not found.");
            }
        }
    }

    public function getAllDocuments() {
        return $this->documents;
    }

    public function findDocumentByName($name) {
        foreach ($this->documents as $doc) {
            if ($doc->documentName === $name) {
                return $doc;
            }
        }
        return null;
    }
}

class UserApproval {
    public function save($db, $userId, $document) {

        $query = "INSERT INTO userApprovals (documentName, documentVersion, userId, approvalStatus, approvalDate) 
                  VALUES (:documentName, :documentVersion, :userId, :approvalStatus, :approvalDate)";
    
        $stmt = $db->prepare($query);                
    
        // UTC format
        $timezone = new DateTimeZone('UTC');
        $date = new DateTime('now', $timezone);
        $iso_zoned_date_time = $date->format(DateTime::ATOM);

        $stmt->bindValue(':documentName', $document->documentName, SQLITE3_TEXT);
        $stmt->bindValue(':documentVersion', $document->documentVersion, SQLITE3_INTEGER);
        $stmt->bindValue(':userId', $userId, SQLITE3_INTEGER);
        $stmt->bindValue(':approvalStatus', "TRUE", SQLITE3_TEXT);
        $stmt->bindValue(':approvalDate', $iso_zoned_date_time, SQLITE3_TEXT);
    

        if (!$stmt->execute()) {
            $errorInfo = $stmt->errorInfo();
            error_log("SQL Error: " . print_r($errorInfo, true));
            return false;
        }
    
        return true;
    }
    

    public function findByUserAndDocument($db, $userId, $documentName) {
        $query = "SELECT * FROM userApprovals WHERE userId = :userId AND documentName = :documentName";
        $stmt = $db->prepare($query);

        $stmt->bindValue(':userId', $userId, PDO::PARAM_INT);
        $stmt->bindValue(':documentName', $documentName, PDO::PARAM_STR);

        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result ? true : false;
    }

    function getWebconfigLang($db){
        	// Language
	    $rowLang = $db->prepare("SELECT webconfigLanguage FROM generalSettings WHERE id= :id");
	    $rowLang->bindValue(':id', 1, SQLITE3_INTEGER);
	    $langResult = $rowLang->execute();
	    $lang = $langResult->fetchArray();
        return $lang["webconfigLanguage"];

    }

    function getUnapprovedDocuments($db, $userId, $documentCollection) {
        $unapprovedDocuments = [];
        $languagesFile = file_get_contents('privacyDocumentTranslations.json');
        $languages = json_decode($languagesFile, true); // json to array
        $webconfigLanguage = $this -> getWebconfigLang($db);
        foreach ($documentCollection->getAllDocuments() as $document) {
            $query = "SELECT 1
                        FROM userApprovals
                        WHERE userId = :userId
                          AND documentName = :documentName
                          AND documentVersion = :documentVersion
                        LIMIT 1;"; // it is used for only existence
            $stmt = $db->prepare($query);


            $stmt->bindValue(':userId', $userId, SQLITE3_INTEGER);
            $stmt->bindValue(':documentName', $document->documentName, SQLITE3_TEXT);
            $stmt->bindValue(':documentVersion', $document->documentVersion, SQLITE3_INTEGER);
            $result = $stmt->execute();
            if ($result) {
                $row = $result->fetchArray(SQLITE3_ASSOC);
                if (!$row) {
                    // unapproved documents
                    // check the language and translate
                    $document->translatedDocumentName = $this->translateDocument($document->documentName, $languages, $webconfigLanguage);

                    $document->documentText = $this->translateDocument($document->documentText, $languages, $webconfigLanguage);

                    // add the unapproved documents
                    $unapprovedDocuments[] = $document;
                }
            } else {
                error_log("SQLite3 execute failed: " . $db->lastErrorMsg());
            }
                
        }

        return $unapprovedDocuments;
    }

    function translateDocument($key, $languages, $language) {
        $converted_res = $languages[$key][$language] ? 'true' : 'false';
        return isset($languages[$key][$language]) ? $languages[$key][$language] : $key;
    }
}
?>
