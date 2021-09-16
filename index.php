<?php      
    session_start();
    error_reporting(E_ALL & ~E_NOTICE);
    ini_set('display_errors', 1);

    function shutDownFunction() { 
        $error = error_get_last();
        
        if(!empty($error)){
            if($_SERVER['REMOTE_ADDR'] == '159.205.65.170'){
                $errortype = ['RECOVERABLE_ERROR' => E_RECOVERABLE_ERROR,
                    'ERROR' => E_STRICT,
                    'WARNING' => E_WARNING,
                    'PARSE' => E_PARSE,
                    'NOTICE' => E_NOTICE,
                    'CORE_ERROR' => E_CORE_ERROR,
                    'CORE_WARNING' => E_CORE_WARNING,
                    'COMPILE_WARNING' => E_COMPILE_WARNING,
                    'USER_ERROR' => E_USER_ERROR,
                    'USER_WARNING' => E_USER_WARNING,
                    'USER_NOTICE' => E_USER_NOTICE,
                    'COMPILE_ERROR' => E_COMPILE_ERROR
                 ];
                 foreach ($errortype as $key => $value) {
                    
                     if($error['type'] == $value){
                         if(strripos($error['message'], 'mysqli::more_results()')){

                         }else{
                             //$_SESSION['error'] = $error;
                            echo '<div class="error"><p><b>' . $key . ': </b></p><p>' . $error['message'] . '</p> <p> in </p>' . '<p><b>' . $error['file'] . '</b></p> on line' . '<p><b> - ' . $error['line'] . '</b></p></div>';
                         }
                     }
                 }
            }else{
                if($error['type'] != 8){
                    die('<h1>Error Servera 500</h1>');
                }
            }
        }
    }
    //register_shutdown_function('shutDownFunction');

    require_once 'application/lib/Dev.php';
    require_once 'application/core/Router.php';
    $router = new Router;
    $router->run();

?>







