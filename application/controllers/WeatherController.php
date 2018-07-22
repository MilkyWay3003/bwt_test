<?


class WeatherController extends Controller
{
    public $weather;

    public function actionIndex()
    {
        $weather = new Weather;

        $this->view->generate('template','weather', [
            'data' => [
                $weather->parser(),
                $weather->myparser(),
            ],
        ]);
    }

}
