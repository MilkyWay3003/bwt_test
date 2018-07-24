<?

class UserController extends Controller
{
    public function actionIndex()
    {
        $data = [];
        if (is_array($_SESSION) && array_key_exists('errors', $_SESSION)) {
            $data['errors'] = $_SESSION['errors'];
            unset($_SESSION['errors']);
        }

        $this->view->generate('template', 'signup', $data);
    }

    public function actionSubmit()
    {
        $firstname = false;
        $lastname = false;
        $email = false;
        $pasw1 = false;
        $pasw2=false;
        $gender=false;
        $birthday=false;

        if (isset($_POST['submit'])) {
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $pasw1 = $_POST['password'];
            $pasw2 = $_POST['passwordrepeat'];
            $gender = $_POST['gender'];
            $birthday = $_POST['datebirthday'];

            $errors = [];

            if (!User::isValidFirstName($firstname)) {
                $errors[] = 'Имя не должно быть короче 2-х символов';
            }

            if (!User::isValidLastName($lastname)) {
                $errors[] = 'фамилия не должна быть короче 2-х символов';
            }

            if (!User::isValidLengthPassword($pasw1)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }

            if (!User::isValidPassword($pasw1,$pasw2)) {
                $errors[] = 'Пароли не совпадают';
            }

            if (!User::isValidEmail($email)) {
                $errors[] = 'Неправильный email';
            }

            if (User::isEmailExists($email)) {
                $errors[] = 'Такой email уже используется';
            }

            if (count($errors) === 0) {
                $result = User::registerUser($firstname,$lastname,$email,$pasw1,$gender,$birthday);

                if ($result) {
                    $errors[] = "Данные успешно сохранены!";
                } else {
                    $errors[] = "Произошла ошибка, пожалуйста повторите попытку.";
                }

                User::auth();
                $_SESSION['errors'] = $errors;
                header('Location: /WeatherController/Index');
            } else {
                $_SESSION['errors'] = $errors;
                header('Location: /');
            }
        }
    }

    public function actionLogin()
    {
        $email = false;
        $password = false;
        $errors = false;

        if (isset($_POST['submit'])) {

            $email = $_POST['email'];
            $password = $_POST['password'];

            if (!User::isValidEmail($email)) {
                $errors[] = 'Неправильный email';
            }

            if (!User::isValidLengthPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }

            $userId = User::userExists($email, $password);

            if ($userId == false) {
                $errors[] = 'Неправильные данные для входа на сайт';
            } else {
                User::auth();
                header('Location: /WeatherController/Index');
            }
        }

        $this->view->generate('template','login', [
            'errors' => $errors,
        ]);
    }

    public function actionLogout()
    {
        $_SESSION = [];
        header('Location: /');
    }
}
