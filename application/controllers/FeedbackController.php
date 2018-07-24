<?
require "vendor/autoload.php";
include_once('application/models/user.php');

use ReCaptcha\ReCaptcha;

class FeedbackController extends Controller
{
    protected $feedback;

    public function __construct()
    {
        $this->feedback = new Feedback;
    }

    public function actionIndex()
    {
        $data = [];
        if (is_array($_SESSION) && array_key_exists('errors', $_SESSION)) {
            $data['errors'] = $_SESSION['errors'];
            unset($_SESSION['errors']);
        }

        $this->view->generate('template','feedback',  $data);
    }

    public function actionSubmit()
    {
        $email = false;
        $password = false;
        $message = false;
        $errors = false;

        $secret = '6Lfh6GQUAAAAAJcFpEk5wdakPmnmxgdkp_anQKv0';
        $reCaptcha = new ReCaptcha($secret);

        if (isset($_POST['g-recaptcha-response'])) {
            $resp = $reCaptcha->verify(
                $_POST['g-recaptcha-response'],
                $_SERVER['REMOTE_ADDR']
            );

            if ($resp->isSuccess()) {
                if (isset($_POST['submit'])) {
                    $firstname = $_POST['firstname'];
                    $email = $_POST['email'];
                    $messages = $_POST['message'];
                    $datecreate = date("Y-m-d");

                    if (!User::isValidFirstName($firstname)) {
                        $errors[] = 'Имя не должно быть короче 2-х символов';
                    }

                    if (!User::isValidEmail($email)) {
                        $errors[] = 'Неправильный email';
                    }

                    if (!User::isValidLengthMessage($messages)) {
                        $errors[] = 'Сообщение не должно быть короче 20-ти и больше 255 символов';
                    }

                    $userId = User::userExists($email, $password);

                    if ($errors == false) {
                        $result = $this->feedback->InsertFeedback($messages, $datecreate, $userId);

                        if ($result) {
                            $errors[] = "Ваш отзыв успешно сохранен!";
                        } else {
                            $errors[] = "Произошла ошибка, пожалуйста повторите попытку.";
                        }

                        header('Location: /FeedbackController/ListFeedbacks');
                    } else {
                        $_SESSION['errors'] = $errors;
                        header('Location: /FeedbackController/Index');
                    }
                }
            } else {
                $errors[] = 'Заполните CAPTCHA';
                $_SESSION['errors'] = $errors;
                header('Location: /FeedbackController/Index');
            }
        }
    }

    public function actionListFeedbacks()
    {
        if (isset($_SESSION['login']) && $_SESSION['login']) {
            $feedbacksList = $this->feedback->GetListFeedbacks();
            $this->view->generate('template', 'listfeedbacks', [
                'feedbacks' => $feedbacksList,
            ]);
        } else {
            header('Location: /');
        }
    }


}
