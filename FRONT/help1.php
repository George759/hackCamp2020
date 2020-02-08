<?php
//print_r($_POST);
include_once 'conn_vol.php';
$name =$_POST['name'];
$uname =$_POST['uname'];
$password =$_POST['password'];

$mobile=$_POST['mobile'];
$email =$_POST['email'];
$pincode =$_POST['pincode'];

if(1){
 if(empty($name)||empty($mobile)||empty($email)||empty($pincode)||(empty($uname))||(empty($password))){
    header("Location: http://localhost/random_php_files/asd/project/help.php?submit=empty");
    exit();
}
else{
  
    if( !preg_match("/[^A-Za-z ]/",$name) && !preg_match("/[^A-Za-z@0-9. ]/",$email) && !preg_match("/[^A-Za-z@0-9. ]/",$uname) && !preg_match("/[^A-Za-z@0-9. ]/",$password) && is_numeric($mobile) && is_numeric($pincode)){
        $sql ="INSERT INTO request(uname,pass, name1, mobile, email, pincode) VALUES('$uname','$password',$name',$mobile,'$email','$pincode');";
        //echo $sql;
        //exit();
        mysqli_query($conn,$sql);
        header("Location: http://localhost/random_php_files/asd/project/help.php?submit=success");
        exit();
    }
    else{
        header("Location: http://localhost/random_php_files/asd/project/help.php?submit=char");
        exit(); 
    }
}
}/*else{
    header("Location: http://localhost/random_php_files/test9.php");
    exit();
}*/


?>