<?php
spl_autoload_register(function ($class) {
    $file = __DIR__ . '/src/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($file)) {
        require_once($file);
    }
});

\Framework\Injector::register(\Services\Session::class, true);
\Framework\Injector::register(\Model\Interfaces\Authentication::class, false, \Services\Authentication::class);

// $repoClass = \Services\MockRepository::class;
// $params = null;
$repoClass = \Services\Repository::class;
$params = array('server' => 'localhost', 'userName' => 'root', 'password' => '', 'database' => 'yasn');
\Framework\Injector::register(\Model\Interfaces\Repository::class, false, $repoClass, $params);

// handle request
\Framework\MVC::handleRequest();