<?php
use PayPal\Rest\ApiContext;

require 'paypal/autoload.php';

define('URL_SITIO', 'http://localhost:8888/html5-boilerplate_v6.0.1');

$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        //Client ID
        'AVCm3MEk5IvL8kSabNxotOTMGIMMdIas2jskvhhK_qT4EpRlV36SUtVjYdXo6thIMdm1Z-bINMhuMR0t',
        //Secret
        'EAJqebwbjgMbkJHN-gmkOyX0HV0AzcLGguh9xdCOfPrvpluFWYlG2ge6wqrzw8POhse779ra_kuuShyD'

    )
    );
    //var_dump($apiContext);

    ?>