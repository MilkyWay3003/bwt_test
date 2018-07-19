<?

class User extends Model
{
    const LENGTHMINNAME = 2;
    const LENGTHMINPASSW = 6;

    public static function register($firstname,$lastname,$email,$pasw1,$gender,$birthday)
    {
        $sql = "INSERT INTO user(firstname,lastname,email,passw,gender,datebirthday)
               VALUES ('$firstname','$lastname','$email',SHA2('$pasw1',256),'$gender','$birthday');";
        $result = Database::connect($sql);

        if ($result) {
            echo "Данные успешно сохранены!";
        } else {
            echo "Произошла ошибка, пожалуйста повторите попытку.";
        }
    }

    public static function checkUserData($email, $pasw1)
    {
        $sql = "SELECT * FROM user WHERE email = '$email' AND passw = '" . hash('SHA256', $pasw1) . "'";
        $result = Database::connect($sql);

        $user = $result->fetch_assoc();

        if ($user) {
            return $user['id'];
        }

        return false;
    }


    public static function auth($userId)
    {
        $_SESSION['user'] = $userId;
    }

    public static function checkFirstname($firstname)
    {
        if (strlen($firstname) >= self::LENGTHMINNAME) {
            return true;
        }

        return false;
    }

    public static function checkLastname($lastname)
    {
        if (strlen($lastname) >= self::LENGTHMINNAME) {
            return true;
        }
        return false;
    }

    public static function checkPasswordLength($password)
    {
        if (strlen($password) >= self::LENGTHMINPASSW) {
            return true;
        }
        return false;
    }

    public static function checkPassword($pasw1,$pasw2)
    {
        if ($pasw1==$pasw2) {
            return true;
        }

        return false;
    }

    public static function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }

        return false;
    }

    public static function checkEmailExists($email)
    {
        $sql = "SELECT COUNT(*) FROM user WHERE email = '$email'";
        $result = Database::connect($sql);

        if ($result) {
           $result = $result->fetch_array()[0];
           return intval($result) > 0;
        }

        return false;
    }
}
