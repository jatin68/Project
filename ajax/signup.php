<?php
include('connection.php');
if(isset($_POST['token']) && password_verify("logintoken",$_POST['token']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $Gender = $_POST['Gender'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    if($name!= "" && $email!="" && $number!="" && $Gender!="" && $password!="")
    {
        $query = $db->prepare("INSERT INTO signupform(name,email,number,Gender,password) VALUES (?,?,?,?,?)");
        $data = array($name,$email,$number,$Gender, password_hash($password, PASSWORD_DEFAULT));
        $execute = $query->execute($data);
        if($execute)
        {
            echo("data inserted ");
        }
        else
        {
            eco("error");
        }
    }
}
else
{
    echo("server error");
}
?>