<?


class SignupController extends Controller
{
     public function actionIndex() {
        $data = [];
        $this->view->generate('template','signup',  $data); 
       }

    public function actionSubmit()    {    
        $firstname = false;
        $lastname = false;
        $email = false;
        $pasw1 = false;
        $pasw2=false;
        $gender=false;
        $birthday=false;
        $result = false;

        $submit = $_POST['submit'];
        var_dump($_POST);

        if (isset($_POST['submit'])) {
            
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname']; 
            $email = $_POST['email'];
            $pasw1 = $_POST['password'];
            $pasw2 = $_POST['passwordrepeat'];
            $gender = $_POST['gender']; 
            $birthday = $_POST['datebirthday'];    

            $errors = false;

            if (!User::checkFirstname($firstname)) {
                $errors[] = 'Имя не должно быть короче 2-х символов';
            }

            if (!User::checkLastname($lastname)) {
                $errors[] = 'фамилия не должна быть короче 2-х символов';
            }

            if (!User::checkPasswordLength($pasw1)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }

            if (!User::checkPassword($pasw1,$pasw2)) {
                $errors[] = 'Пароли не совпадают';
            }

            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }
            if (User::checkEmailExists($email)) {
                $errors[] = 'Такой email уже используется';
            }
                             
            if ($errors == false) 
              {
                $result = User::register($firstname,$lastname,$email,$pasw1,$gender,$birthday);
                $this->view->generate('template','register', $result);
               }
            else  
                {
                    $this->view->generate('template','register', $errors);
                }
        }       
    
        return true;
    }
    
    
   public function actionLogin()    {

        $email = false;
        $password = false;       
        
        if (isset($_POST['submit'])) {
          
            $email = $_POST['email'];
            $password = $_POST['password'];           
            $errors = false;

            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }

            if (!User::checkPasswordLength($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }

            $userId = User::checkUserData($email, $password);

            if ($userId == false) {
            
                $errors[] = 'Неправильные данные для входа на сайт';
            } else {
             
                User::auth($userId);
                require_once('application/views/weather.php');
            }
        }

        //require_once('application/views/login.php');
        $this->view->generate('template','login', []);
        return true;
    }

    
    public function actionLogout()   {       
        session_start();        
        unset($_SESSION["user"]);        
        require_once('application/views/login.php');
    }  
   
}


    

   

