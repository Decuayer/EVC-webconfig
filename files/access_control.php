<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

ob_start();
$error_language_translations = array(
  "ba" => "Prvo se morate prijaviti!",
  "bg" => "Първо трябва да влезете!",
  "cz" => "Nejprve se musíte přihlásit!",
  "da" => "Du skal først logge ind!",
  "de" => "Bitte melden Sie sich zunächst an!",
  "en" => "You need to login first!",
  "es" => "¡Primero tiene que iniciar sesión!",
  "fi" => "Sinun on kirjauduttava sisään ensin!",
  "fr" => "Vous devez vous connecter !",
  "gr" => "Πρέπει να συνδεθείτε πρώτα!",
  "he" => "עליך להיכנס קודם!",
  "hr" => "Prvo se trebate prijaviti!",
  "hu" => "Először be kell jelentkeznie!",
  "it" => "Devi prima effettuare il login!",
  "me" => "Prvo se morate prijaviti!",
  "nl" => "U moet zich eerst aanmelden!",
  "no" => "Du må logge inn først!",
  "pl" => "Należy się najpierw zalogować!",
  "ro" => "Mai întâi trebuie să vă conectați!",
  "rs" => "Prvo se morate prijaviti!",
  "sk" => "Najprv sa musíte prihlásiť!",
  "sv"  => "Du måste logga in först!",
  "tr" => "Önce giriş yapmanız gerekiyor!"
);

$currentURI = $_SERVER['REQUEST_URI'];
if($currentURI != "/" && $currentURI != "/index.php" && $currentURI != "/changePassword.php"){
    if (!isset($_SESSION["loginStatus"]) || $_SESSION["loginStatus"] !== true) {
        if(isset($_SESSION['lang']) && ($_SESSION['lang'] == "en" || $_SESSION['lang'] == "tr" || $_SESSION['lang'] == "fr" || $_SESSION['lang'] == "de" || $_SESSION['lang'] == "es" || $_SESSION['lang'] == "it" || $_SESSION['lang'] == "ro"  || $_SESSION['lang'] == "da" || $_SESSION['lang'] == "fi" || $_SESSION['lang'] == "no" || $_SESSION['lang'] == "hu" || $_SESSION['lang'] == "sv" || $_SESSION['lang'] == "pl" || $_SESSION['lang'] == "sk" || $_SESSION['lang'] == "he" || $_SESSION['lang'] == "cz" || $_SESSION['lang'] == "nl" || $_SESSION['lang'] == "ba" || $_SESSION['lang'] == "bg" || $_SESSION['lang'] == "gr" || $_SESSION['lang'] == "hr" || $_SESSION['lang'] == "me" || $_SESSION['lang'] == "rs")){
            $_SESSION["error"] = $error_language_translations[$_SESSION['lang']];

        }else{
            $_SESSION["error"] = $error_language_translations["en"];
        }
        ob_end_clean();

        header("Location: " . "http://" . $_SERVER['HTTP_HOST']);
        exit();
    }
}
ob_end_flush();
?>
