<?

class Database
{

   public function connect($sql)
    {
            $mysqli = new mysqli(HOST, USER, PASSWORD,NAME_BD) or die("Невозможно установить соединение c базой данных" . $mysqli->connect_errno());
            $mysqli->query("set names utf8");

            $result = $mysqli->query($sql);

            //$mysqli->close();
            return $result;        
    }
}