<?


class WeatherController extends Controller
{
    public $weather; 

    public function actionIndex()
    {
        $data = [];
        $this->view->generate('template','weather',  $data);
        
        $weather = new Weather;      
        $weather->myparser();
    }

}
