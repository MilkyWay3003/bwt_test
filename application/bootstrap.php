<?

session_start();
require_once 'config.php';
require_once 'database.php';
require_once 'core/model.php';
require_once 'core/view.php';
require_once 'core/controller.php';
require_once 'core/route.php';
require_once 'core/autoload.php';
Route::start();