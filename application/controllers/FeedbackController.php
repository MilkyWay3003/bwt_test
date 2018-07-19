<?


class FeedbackController extends Controller
{
    public function actionIndex() {
        $data = [];
        $this->view->generate('template','feedback',  $data);
    }

}