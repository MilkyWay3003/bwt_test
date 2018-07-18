<?

function __autoload($class_name)
{
     $array_paths = [
        '/models/',
        '/controllers/',
    ];

    foreach ($array_paths as $path) {        
        $path =  $path . $class_name . '.php';
         if (is_file($path)) {
            include_once $path;
        }
    }
}