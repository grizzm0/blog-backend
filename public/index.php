<?php

// Delegate static file requests back to the PHP built-in webserver
if (PHP_SAPI === 'cli-server'
    && is_file(__DIR__ . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH))
) {
    return false;
}

require __DIR__ . '/../config/bootstrap.php';

call_user_func(function () {
    $app = (require __DIR__ . '/../config/container.php')->get(\Zend\Expressive\Application::class);

    require __DIR__ . '/../config/pipeline.php';
    require __DIR__ . '/../config/routes.php';

    $app->run();
});
