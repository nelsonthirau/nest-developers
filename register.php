<?php 
require_once('connect.php');
if(isset($_POST)and $_SERVER['REQUEST_METHOD']=="POST"){
    $firstname=trim(strip_tags($_POST['fname'])); 
    $lastname=$_POST['lname'];
    $contacts=$_POST['contacts'];
    $address=$_POST['address'];
    $email=$_POST['email'];
    
    $username=$_POST['username'];
    $pass=$_POST['password'];
    $dpass=md5($pass);
    $query="INSERT INTO clients(firstname,lastname,contacts,address,email,username,password,account)VALUES(?,?,?,?,?,?,?,?)";
        $prepare=$connect->prepare($query);
        $prepare->bind_param('ssssssss',$firstname,$lastname,$contacts,$address,$email,$username,$dpass,'user');
        if($check=$prepare->execute()){
            
            echo "<div class='alert alert-success'>Inserted successfully</div>";
           

        }else{
            echo "<div class='alert alert-danger'>error occurred when inserting</div>";
            

        
    }
}



















if(isset($_POST['register'])){
        
    

    if($firstname==""){
        
        echo "<div class='alert alert-danger'>Firstname required</div>";
        
    }else{
        
    
    }
}


?>