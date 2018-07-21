<?
require "vendor/autoload.php";

class FeedbackController extends Controller
{
    public $feedbacks;
    
    public function actionIndex() {
        $data = [];
        $this->view->generate('template','feedback',  $data);
    }
 
    public function actionSubmit() {          
        $email = false;
        $password = false;
        $message = false;
        $errors = false;

        $secret = '6Lfh6GQUAAAAAJcFpEk5wdakPmnmxgdkp_anQKv0';
        $reCaptcha = new \ReCaptcha\ReCaptcha($secret);

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

            $feedbacks = new Feedback; 

            if ($feedbacks->checkFirstname($firstname)) {
                $errors[] = 'Имя не должно быть короче 2-х символов';
            } 

            if ($feedbacks->checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }            

            if (!$feedbacks->CheckLengthMessage($messages)) {
                $errors[] = 'Сообщение не должно быть короче 20-ти и больше 255 символов';
            }
           
            $userId = Feedback::FindUser($email);
                        
            if ($errors == false) {
                $feedbacks->Insertfeedback($messages, $datecreate, $userId);
                header('Location: /FeedbackController/Listfeedbacks');
            } else {
                $_SESSION['errors'] = $errors;
                header('Location: /');
            }

          }        
        }
      }    
    }

    public function actionListfeedbacks() {
        $data = [];            
        $feedbacks = new Feedback ;      
        $data = $feedbacks->GetListfeedbacks(); 
        $this->view->generate('template','listfeedbacks',  $data);
    }


}
