
<?php
    if(getenv('GOOGLE_CLIENT_ID') !== false){
        $google_client_id = getenv('GOOGLE_CLIENT_ID');
        $google_client_secret = getenv('GOOGLE_CLIENT_SECRET');
    }    
    else{
        $google_client_id = "448788181225-5vemsffjm1oecp880fddhvbgmv2fj9r4.apps.googleusercontent.com";
        $google_client_secret = "q-BRBuKp5vZJQrfyN2s9CNiv";
    }    
    
?>