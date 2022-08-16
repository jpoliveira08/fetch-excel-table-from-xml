<?php

require './vendor/autoload.php';

if ($_GET) {
    $controller = isset($_GET['controller']) ? ((class_exists($_GET['controller'])) ? new $_GET['controller'] : NULL ) : null;
    $method = isset($_GET['method']) ? $_GET['method'] : null;
    if ($controller && $method) {
        if (method_exists($controller, $method)) {
            $parameters = $_GET;
            unset($parameters['controller']);
            unset($parameters['method']);
            call_user_func(array($controller, $method), $parameters);
        } else {
            echo "Method doesn't found!";
        }
    } else {
        echo "Controller doesn't found!";
    }
}else { ?>

<div class="container"><h2>All Blacks - Seleção Neozelandesa de Rugby</h2><hr>
    <a href="?controller=AllBlacksRugby\FanBase\Controllers\FanBaseController&method=index" class="btn btn-success">
        Acessar base de torcedores 
    </a>
</div>

<?php };

