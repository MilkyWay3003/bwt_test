<?
 const LENGTHMINNAME = 2;
 const LENGTHMINMESSAGE = 20;
 const LENGTHMAXMESSAGE = 255;

class Feedback extends Model
{
    public function Insertfeedback($messages,$datacreate,$id_user)
    {
        $sql = "INSERT INTO feedback(messages,datacreate,id_user)
               VALUES ('$messages','$datacreate','$id_user');";

        $result = Database::connect($sql);

        if ($result) {
            echo "Ваш отзыв успешно сохранен!";
        } else {
            echo "Произошла ошибка, пожалуйста повторите попытку.";
        }
    }

    public  function checkFirstname($firstname)
    {
        if (strlen($firstname) >= self::LENGTHMINNAME) {
            return true;
        }

        return false;
    }    
    
    public function CheckEmail($email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
     }   
    
    public function CheckLengthMessage($messages) {
        if ((strlen($messages) >= self::LENGTHMINMESSAGE) and (strlen($messages) <= self::LENGTHMAXMESSAGE)){
            return true;
         }
     }
     
     public static function FindUser($email, $pasw1)
    {
        $sql = "SELECT * FROM user WHERE email = '$email'";
        $result = Database::connect($sql);

        $user = $result->fetch_assoc();

        if ($user) {
            return $user['id'];
        }
        return false;
    }

    public function GetListfeedbacks(){
        $sql = "SELECT datacreate, firstname, lastname, messages
        FROM user INNER JOIN feedback ON user.id=feedback.id_user";
        $result = Database::connect($sql);
        $data = [];

        if ($result->num_rows>0) {
             while($row = $result->fetch_assoc()) {

                $data[] = [ $row["datacreate"],
                            $row["firstname"],
                            $row["lastname"],
                            $row["messages"], 
                ];
            }
        }

        return $data;
    }


    

    
}