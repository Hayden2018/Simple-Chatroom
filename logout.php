<?php 

require_once('xmlHandler.php');

if (!isset($_COOKIE["name"])) {
    header("Location: error.html");
    exit;
}

// create the chatroom xml file handler
$xmlh = new xmlHandler("chatroom.xml");
if (!$xmlh->fileExist()) {
    header("Location: error.html");
    exit;
}

$uid = $_COOKIE["id"];

// open the existing XML file
$xmlh->openFile();
 
// Remove the user and its photo
$users = $xmlh->getElement("users");
$user = $xmlh->getElementById($uid);
$photoPath = $user->getAttribute("photo");
$users->removeChild($user);
unlink($photoPath); // Delete the user photo from server

$xmlh->saveFile();

header("Location: login.html");

?>
