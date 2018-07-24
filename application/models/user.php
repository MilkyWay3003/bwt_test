<?

class User extends Model
{
    const LENGTHMINNAME = 2;
    const LENGTHMINPASSW = 6;
    const LENGTHMINMESSAGE = 20;
    const LENGTHMAXMESSAGE = 255;

    public static function isValidFirstName($firstname)
    {
        return (strlen($firstname) >= self::LENGTHMINNAME);
    }

    public static function isValidLastName($lastname)
    {
        return (strlen($lastname) >= self::LENGTHMINNAME);
    }

    public static function isValidLengthPassword($password)
    {
        return (strlen($password) >= self::LENGTHMINPASSW);
    }

    public static function isValidPassword($pasw1,$pasw2)
    {
        return ($pasw1==$pasw2);
    }

    public static function isValidEmail($email)
    {
        return (filter_var($email, FILTER_VALIDATE_EMAIL));
    }

    public static function isValidLengthMessage($messages)
    {
        return ((strlen($messages) >= self::LENGTHMINMESSAGE) and (strlen($messages) <= self::LENGTHMAXMESSAGE));
    }

    public static function isEmailExists($email)
    {
        $sql = "SELECT COUNT(*) FROM user WHERE email = '$email'";
        $result = Database::connect($sql);

        if ($result) {
           $result = $result->fetch_array()[0];
           return intval($result) > 0;
        }

        return false;
    }

    public static function userExists($email, $pasw1)
    {
        $sql = "SELECT * FROM user WHERE email = '$email' AND passw = '" . hash('SHA256', $pasw1) . "'";
        $result = Database::connect($sql);

        $user = $result->fetch_assoc();

        if ($user) {
           return $user['id'];
        }

        return false;
    }

    public static function registerUser($firstname,$lastname,$email,$pasw1,$gender,$birthday)
    {
        $sql = "INSERT INTO user(firstname,lastname,email,passw,gender,datebirthday)
               VALUES ('$firstname','$lastname','$email',SHA2('$pasw1',256),'$gender','$birthday');";
        $result = Database::connect($sql);

        return $result;
    }

    public static function auth()
    {
        $_SESSION['login'] = true;
    }
}



