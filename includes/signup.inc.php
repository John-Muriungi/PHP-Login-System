<?php
// check if the  user  filled in the form to get into this place or he typed inti the url
if($_SERVER["REQUEST_METHOD"]==="POST"){
    // store the variables picked from input by the user
    $username=$_POST["username"];
    $pwd = $_POST["pwd"];
    $email = $_POST["email"];
// connecting to the database
    try{
        require_once 'dbh.inc.php';
        // model must cme first after connection before the controller
        require_once 'signup_model.inc.php';
        require_once 'signup_contr.inc.php';
        // ERROR  HANDLERS
        // running errror handlers -> ways of making sure that things are  running appropriately inside our code
        $errors = [];
        // checking if inputs are empty
    if( is_input_empty($username, $pwd, $email)){
        $errors["empty_input"]="Fill in all fields";

    }
    //    checking the validity of the email
        if (is_email_invalid($email)) {
            $errors["invalid_email"] = "Invalid email used";
        }
        // check if user name is taken
        if (is_username_taken( $pdo,  $username)) {
            $errors["username_taken"] = "Username already taken!";
        }
        // check if email is registered
        if (is_email_registered( $pdo,  $email)) {
            $errors["Query_used"] = "Email already registered!";
        }
    //   link to config file
        require_once 'config_session.inc.php';

        if($errors){
            $_SESSION["errors_signup"]=$errors;

            // to retain the data on the form when there is is an error
            // helps avoid tedious work of re-entering the data in the  fields

            $signupData=[
                "username"=>$username,
                "email"=>$email,
            ];
            $_SESSION["signupData"]=$signupData;

            header("Location: ../index.php");
            die();
        }
        create_user( $pdo, $pwd,  $username,  $email);
        header("Location: ../index.php?signup=success");
        // killling the connection
        $pdo=null;
        $stmt=null;

        die();


    }catch(PDOException $e){
        die("Query failed: " . $e-> getMessage());
    }



}else{
    // send them back to the index page 
    // back the directory 
    header("Location: ../index.php");
    
    die();
}