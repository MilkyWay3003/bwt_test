<?


class FeedbackController extends Controller
{
    public function actionIndex() {
        $data = [];
        $this->view->generate('template','feedback',  $data);
    }

    public function actionSubmit() {          
        $email = false;
        $password = false;
        $message = false;
        
        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $message = $_POST['message'];
    
            $errors = false;
            echo "Success";
                
            }

    
     }

}
