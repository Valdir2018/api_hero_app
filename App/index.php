<?php  

header('Content-Type: application/json');
require '../vendor/autoload.php';
use Source\Services\ApiServices;

try {

        $services = new ApiServices;

        if (isset($_REQUEST['method']) && $_REQUEST['method'] === 'stories') {
           
            $paramsId = $_REQUEST['params'];
        
            if (method_exists($services, 'stories')) {
            
                if($services->stories($paramsId) == ''){
                    throw new Exception("Error Processing Request", 1);
                    exit;
                } 

                $services->stories($paramsId);
            } else {
                throw new Exception("Method not found", 1);
                exit;
            }
          
        } else {
           $services->listCharactersFavorites();
       }

} catch(Exception $error) {
    print $error->getMessage();

}

