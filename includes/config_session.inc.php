<?php

ini_set('session.use_only_cookies',1);
ini_set('session.use_strict_mode',1);

// change cookie parameters
session_set_cookie_params([
    'lifetime'=> 1800,
    'domain'=>'localhost',
    'path'=>'/',
    'secure'=> true,
    'httponly'=> true

]);

session_start();
// running an update on the cookie id
// the condition checks if the particular session doesn't exists in the system
if(!isset($_SESSION["last_regeneration"])){
    // session_regenerate_id();
    // $_SESSION["last_regeneration"]=time();
    // instead of aving the above code repeated i  created a fuction for the  code
    regenerate_session_id();

}
else{
    // interval is time in seconds that will haev to pass in order to update the session
    $interval=60 * 30;
    if(time()-$_SESSION["last_regeneration"]>=$interval){
        regenerate_session_id();
     
    }
}
function regenerate_session_id(){
    session_regenerate_id();
    $_SESSION["last_regeneration"] = time();
}