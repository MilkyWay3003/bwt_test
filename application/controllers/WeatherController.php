<?


class WeatherController extends Controller
{
     public function actionIndex() {
        $data = [];
        $this->view->generate('template','weather',  $data); 
       }

}
