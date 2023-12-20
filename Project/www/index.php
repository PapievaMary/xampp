
<?php
    spl_autoload_register(function ($className){ 
        require_once('../'.str_replace('\\','/',$className).'.php');
    });

    $isRouteFound = false;
    $url = $_GET['route'] ?? '';
    $routes = require('../src/routes.php');
    foreach($routes as $pattern=>$controllerAndAction){ 
        preg_match($pattern, $url, $matches);  
        if(!empty($matches)){  
            $isRouteFound=true;
            break;
        }
    }

    unset($matches[0]); 
    $action = $controllerAndAction[1]; 
    $controllerName = $controllerAndAction[0];

    if ($isRouteFound){
        $controller = new $controllerName; 
        $controller->$action(...$matches); 
    }else echo "Страница не найдена"; 
   
    // $pattern = '~^$~';
    // preg_match($pattern, $url, $matches);
    // if(!empty($matches)){
    //     $controller->main();
    //     return;
    // }

    // require('src/Models/Users/User.php');
    // require('src/Models/Articles/Article.php');

    // $user = new src\models\Users\User("Ivan");
    // $article = new src\models\Articles\Article('title', 'text', $user);
    // echo $article->getAuthor()->getName();
?>