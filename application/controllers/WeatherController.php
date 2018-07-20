<?


class WeatherController extends Controller
{
    public $weather; 

    public function actionIndex()
    {
        $data = [];        
        $weather = new Weather;      
        $data = $weather->parser(); 
        $this->view->generate('template','weather',  $data);
        
        $data = $weather->myparser(); 
        $this->view->generate('template','weather',  $data);
         
    }

}
