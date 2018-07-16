<?

define('PATH_SITE', $_SERVER['DOCUMENT_ROOT']);
define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', '');
define('NAME_BD', 'bwttest');
define ('DS', DIRECTORY_SEPARATOR);
$mysqli = new mysqli(HOST, USER, PASSWORD,NAME_BD) or die("Невозможно установить соединение c базой данных" . $mysqli->connect_errno());
$mysqli->query("set names utf8");
