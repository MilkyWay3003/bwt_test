<?


class SignupController extends Controller
{
     function actionIndex() {
        $data = [];
        $this->view->generate('template','signup',  $data); 
       }

       
   
}


    

   

