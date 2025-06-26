<?php
$context = new ZMQContext();
$publisher = new ZMQSocket($context, ZMQ::SOCKET_PUB);
$publisher->bind("ipc:///var/lib/webconfig.ipc");
$publisher->send("initialization");
sleep(1);
function sendZeroMqMessage($message){
    global $publisher;
    $message = array("type" => $message);
    $message = json_encode($message, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    $publisher->send($message);
}
function sendZeroMqMessageWithCommand($command, $message){
    global $publisher;
    $message = array(
        "type" => $command,
        "data" => array("command" => $message)
    );
    $message = json_encode($message, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    $publisher->send($message);
}
function sendZeroMqMessageWithLocation($command, $message,$file_path){
    global $publisher;
    $message = array(
        "type" => $command,
        "data" => array(
            "command" => $message,
            "location" => $file_path
        )
    );
    $message = json_encode($message, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    $publisher->send($message);
}

function sendZeroMqMessageWithTimestamp($type,$action, $payloadType, $techInfo){
    global $publisher;
    $message = array(
        "type" => $type,
        "data" =>  array(
            "action" => $action,
            "payload" => array(
                "type"=> $payloadType,
                "timestamp" => gmdate("Y-m-d\TH:i:s\Z"),
                "techInfo" => $techInfo
            )
        )
        
    );
    $message = json_encode($message, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    $publisher->send($message);
}

function sendZeroMqMessageWithResetRequired($command, $resetRequired){
    global $publisher;
    $message = array(
        "type" => $command,
        "resetRequired" => $resetRequired);
    $message = json_encode($message, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    $publisher->send($message);
}
?>
