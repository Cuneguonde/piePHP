<link rel="stylesheet" href="./webroot/css/thefuckisgoingon.css">

<?php
define('BASE_URI', str_replace('\\', '/', substr(__DIR__, strlen($_SERVER['DOCUMENT_ROOT']))));
require_once(implode(DIRECTORY_SEPARATOR, ['Core', 'autoload.php']));
$app = new Core\Core();
$app->run();
?>
<?php //On veut afficher les variables $_POST, $_GET, $_SERVER
if (count($_GET) > 0) {
    // foreach ($_GET as $key => $value) {
    //     echo "<pre>" . "GET --" . $key . ": " . $value . "</pre>";
    // }
} else {
    //echo "<pre>GET  -- 0 para finded</pre>";
}
if (count($_POST) == 2) {
    // foreach ($_POST as $key => $value) {
    //     echo "<pre>" . "POST --" . $key . ": " . $value . "</pre>";
    // }
}
?>
<?php // https://www.php.net/manual/en/function.define.php  
// https://www.php.net/manual/en/function.str-replace
// https://www.php.net/manual/en/function.substr
// https://www.php.net/manual/en/function.strlen
// https://www.php.net/manual/fr/function.implode.php
?>