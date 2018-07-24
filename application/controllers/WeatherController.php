<?


class WeatherController extends Controller
{
    protected $weather;

    public function __construct()
    {
        $this->weather = new Weather;
    }

    public function actionIndex()
    {
        $data = [];
        if (is_array($_SESSION) && array_key_exists('errors', $_SESSION)) {
            $data['errors'] = $_SESSION['errors'];
            unset($_SESSION['errors']);
        }

        if (isset($_SESSION['login']) && $_SESSION['login']) {
            $data['data'] = [
                $this->weather->parser(),
                $this->weather->myparser(),
            ];

            $this->view->generate('template','weather', $data);
        } else {
            header('Location: /');
        }
    }
}
