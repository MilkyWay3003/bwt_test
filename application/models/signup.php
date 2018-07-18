<?

define('LENGHTMINNAME', '2');
define('LENGHTMINPASSW', '6');


class User extends Model
{  
      
   public function register($firstname,$lastname,$email,$pasw1,$gender,$birthday)   {     
      
       $sql = 'INSERT INTO user(firstname,lastname,email,passw,gender,datebirthday)  
               VALUES ($firstname,$lastname,$email,SHA2($pasw1,256),$gender,$birthday)';
       $result = Database::connect($sql);

      if ($result) {
            echo "Данные успешно сохранены!";
        }
        else {
              echo "Произошла ошибка, пожалуйста повторите попытку.";
        } 
    }

   public function checkUserData($email, $pasw1)   {

       $sql = 'SELECT * FROM user WHERE email = $email AND passw = $pasw1';
       $result = Database::connect($sql);       

       $user = $result->fetch();

       if ($user) {
          return $user['id'];
       }
       return false;      
   }

  
   public function auth($userId)   {
       $_SESSION['user'] = $userId;
   }

   public function checkFirstname($firstname)   {
       if (strlen($firstname) >= LENGHTMINNAME) {
           return true;
       }
       return false;
   }
   
   public function checkLastname($lastname)   {
       if (strlen($lastname) >= LENGHTMINNAME) {
           return true;
       }
       return false;
   }
   
   public function checkPasswordLength($password)   {
       if (strlen($password) >= LENGTHMINPASSW) {
           return true;
       }
       return false;
   }

   public function checkPassword($pasw1,$pasw2)   {
       if ($pasw1==$pasw2) {
           return true;
       }
       return false;
   }

   public static function checkEmail($email)   {
       if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
           return true;
       }
       return false;
   }

   public function checkEmailExists($email)   {     
       
       $sql = 'SELECT COUNT(*) FROM user WHERE email = $email';
       $result = Database::connect($sql);
     
       if ($result)
           return true;
       return false;      
   }


}