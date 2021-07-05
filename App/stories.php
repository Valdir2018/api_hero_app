<?php  

header('Content-Type: application/json');
require '../vendor/autoload.php';
use Source\Services\ApiServices;

try {
        $services = new ApiServices;

        if (isset($_REQUEST['method']) && $_REQUEST['method'] === 'stories') {
           
            $paramsId = $_REQUEST['params'];
        
            if (method_exists($services, 'stories')) {            
               $services->stories($paramsId);
            } 
        } 

} catch(Exception $error) {
    print $error->getMessage();

}

