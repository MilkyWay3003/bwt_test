<?

/**
 * Функция __autoload для автоматического подключения классов
 */
function __autoload($class_name)
{
    // Массив папок, в которых могут находиться необходимые классы
    $array_paths = [
        '/models/',
        '/controllers/',
    ];

    // Проходим по массиву папок
    foreach ($array_paths as $path) {

        // Формируем имя и путь к файлу с классом
        $path =  $path . $class_name . '.php';
        // Если такой файл существует, подключаем его
        if (is_file($path)) {
            include_once $path;
        }
    }
}