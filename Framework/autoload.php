<?php

spl_autoload_register(function($className) {
    $namespace = str_replace("\\","/",__NAMESPACE__);
    $namespace = empty($namespace) ? "" : "/$namespace";
    $className = '/' . str_replace("\\","/",$className);
    $class = ROOT_PATH . "$namespace$className.php";
    require_once($class);
});