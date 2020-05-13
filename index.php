<?php
spl_autoload_register(function ($class) { // immer wenn was neues daher kommt
    $file = __DIR__ . '/src/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($file)) {
        require_once($file);
    }
});

\Framework\Injector::register(\Services\Session::class, true);
\Framework\Injector::register(\Model\Interfaces\Authentication::class, false, \Services\Authentication::class);

$repoClass = \Services\MockRepository::class;
$params = null;
// $repoClass = \Services\Repository::class;
// $params = array('server' => 'localhost', 'userName' => 'root', 'password' => '', 'database' => 'bookshop');
\Framework\Injector::register(\Model\Interfaces\Repository::class, false, $repoClass, $params);

// handle request
\Framework\MVC::handleRequest();