<?php

if (isset($_REQUEST['logout'])) {
   //remove session data including user_id
    session_unset();
    
    $client->revokeToken();
    
    
    
    
    // header('Location: ' . filter_var('/', FILTER_SANITIZE_URL)); //redirect user back to page
    header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL)); //redirect user back to page 
}
?>