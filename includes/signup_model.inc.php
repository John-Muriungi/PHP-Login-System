<?php
declare(strict_types=1);
//  <!-- gooig to take care of querring the data getting the data or submiting the data -->
//   <!-- interacting with the database -->
//    <!-- the only thing to interact with these functions are the contrller file  because controller 
    
//     takes care of handling  input fromuser and then uses these functions her to send that information
//    to these functions so that they can do something with the database -->


function get_username(object $pdo, string $username)
{
  $query="SELECT username FROM  users  WHERE username=:username;";
// sending prepared statement
  $stmt=$pdo->prepare($query);
  // binding the parameters
  $stmt-> bindParam(":username", $username);
  $stmt->execute();

  // grab the first result
  // AS PDO OBJECT AS AN ASSOCIATIVE ARRAY
  $result= $stmt->fetch(PDO::FETCH_ASSOC);
  return $result;


}
function get_email(object $pdo, string $email)
{
  $query="SELECT username FROM  users  WHERE email=:email;";
// sending preapared statement
  $stmt=$pdo->prepare($query);
  // binding the parameters
  $stmt-> bindParam(":email", $email);
  $stmt->execute();

  // grab the first result
  // AS PDO BJEVT AS AN ASSOCIATIVE ARRAY
  $result= $stmt->fetch(PDO::FETCH_ASSOC);
  return $result;

}
function set_user(object $pdo, string $pwd, string $username,string $email){
  $query = "INSERT INTO users (username,pwd,email) VALUES(:username, :pwd, :email)";
  // sending prepared statement
  $stmt = $pdo->prepare($query);

  $options=[
    'cost'=>12
  ];
  $hashedpwd=password_hash($pwd,PASSWORD_BCRYPT,$options);
  // binding the parameters
  $stmt->bindParam(":username", $username);
  $stmt->bindParam(":pwd", $hashedpwd);
  $stmt->bindParam(":email", $email);
  $stmt->execute();

 
}