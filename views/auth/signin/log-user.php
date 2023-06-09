<?php
    require_once("../../../controllers/adminController.php");
    define('ROOT',$_SERVER['DOCUMENT_ROOT']."/assessment_portal/controllers/");
    require_once(ROOT."Connection.php");
    $adminController = new AdminController();

    $db = new Connection("localhost", "root", "", "portal");
    $con = $db->openConnection();
    
    if (isset($_GET['email_address'])) {
        session_start();
        $emailAddress = stripslashes($_REQUEST['email_address']);  
        $emailAddress = mysqli_real_escape_string($con, $emailAddress);

        $password = stripslashes($_REQUEST['password']);  
        $password = mysqli_real_escape_string($con, $password);

        if($adminController->login($emailAddress, $password)=="admin"){
            $_SESSION['email_address'] = $emailAddress;
            $msg = "You have been logged in successfully";
            header("Location: ../../admin/dashboard/dashboard.php?msg=$msg");
            die();
        }elseif($adminController->login($emailAddress, $password)=="student"){
            $_SESSION['email_address'] = $emailAddress;
            $msg = "You have been logged in successfully";
            header("Location: ../../students/dashboard/dashboard.php?msg=$msg");
            die();
        }elseif($adminController->login($emailAddress, $password)=="assessor"){
            $_SESSION['email_address'] = $emailAddress;
            $msg = "You have been logged in successfully";
            header("Location: ../../assessor/dashboard/dashboard.php?msg=$msg");
            die();
        }elseif($adminController->login($emailAddress, $password)=="supervisor"){
            $_SESSION['email_address'] = $emailAddress;
            $msg = "You have been logged in successfully";
            header("Location: ../../supervisor/dashboard/dashboard.php?msg=$msg");
            die();
        }else{
            $msg = "Password or Email is wrong please try again";
            header("Location: signin.php?msg=$msg");
            die();
        }

    }
?>