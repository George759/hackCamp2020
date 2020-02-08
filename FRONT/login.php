<?php
//print_r($_POST);
include_once 'conn_vol.php';
$email=$_POST['email'];
$pass =$_POST['pass'];
session_start();

if(1){
    if(empty($email)|| empty($pass)){
        header("Location: http://localhost/random_php_files/asd/login.php?submit=empty");
        exit();
    }

    else{
        if( !preg_match("/[^A-Za-z ]/",$name)){
            $sql =" SELECT * FROM volunteer where email='" . $email . "' AND pass='" .$pass . "';";
            $res = array();
            $result 
            = $conn->query($sql);
            $r_result = $result->fetch_assoc();
            $s = 0;
            if ($result->num_rows > 0) {
                $sql1 =" SELECT * FROM pothole WHERE pincode = " . $r_result['pincode'] . " ;";
                $result = $conn->query($sql1);
                while($row = $result->fetch_assoc()) {
                    $res[$s] = "Road : " . $row['road'] . " Landmark :  " . $row['landmark'] . " Potholes : " . $row['potholes'] . "Danger Level  : " . $row['danger_level'] . "Pincode :".$row['pincode']; 
                    $s += 1;
                }
                $_SESSION['result'] = $res;
                print_r($res);
                header("Location: http://localhost/random_php_files/asd/login.php?submit=success");
                exit(); 
            } else {
                $res[0]="0 results";
                $_SESSION['result'] = $res;

            }
            header("Location: http://localhost/random_php_files/asd/login.php?submit=char");
            exit(); }
            else{
                header("Location: http://localhost/random_php_files/asd/login.php?submit=char");
                exit(); 
            }
        
        
        }
    }
    ?>