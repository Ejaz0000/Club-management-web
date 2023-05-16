<?php

session_start();

	include("connection.php");
	include("function.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Webpage Design</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    
</head>
<body>

<ul class="circles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
</ul>
  
    <header>
    <h2 class="logo">Club Management System</h2>
    <nav class="navigation">
        <a href="../homepage/index.html">Home</a>
        <a href="#">About</a>
        <a href="#">Survices</a>
        <a href="#">Contract</a>
        <button class="btnLogin-popup">Login</button>

    </nav>
</header>
<div class="wrapper">
    <span class="icon-close"><ion-icon name="close"></ion-icon></span>
    <div class="form-box login">
        <h2>Login</h2>
        <form action="#">
            <div class="input-box">
                <samp class="icon"><ion-icon name="mail"></ion-icon></samp>
                <input type="email" id="lemail" required>
                <label>Email</label>
            </div>
            <div class="input-box">
                <samp class="icon"><ion-icon name="lock-closed"></ion-icon></samp>
                <input type="password" id="lpassword" required>
                <label>Password</label>
            </div>
            <div class="remember-forgot">
                <label>
                    <input type="checkbox"> Remember me
                </label>
                <a href="#">Forgot Password?</a>
            </div>
            <button type="submit" id="log_btn" class="btn">Login</button>
            <div class="login-register">
                <p>Don't have an account? <a href="#" class="register-link">Register</a> </p>
            </div>
        </form>
    </div>


    <div class="form-box register">
        <h2>Registration</h2>
        <form action="#">
                <div class="input-box">
                    <samp class="icon"><ion-icon name="person"></ion-icon></samp>
                    <input type="text" id="sname" required>
                    <label>Full Name</label>
                </div>
            <div class="input-box">
                <samp class="icon"><ion-icon name="mail"></ion-icon></samp>
                <input type="email" id = "semail" required>
                <label>Email</label>
            </div>
            <div class="input-box">
                <samp class="icon"><ion-icon name="lock-closed"></ion-icon></samp>
                <input type="password" id = "spassword" required>
                <label>Password</label>
            </div>
            <div class="input-box">
                <samp class="icon"><ion-icon name="person"></ion-icon></samp>
                <input type="text" id="sdep" required>
                <label>Department</label>
            </div>
            <div class="input-box">
                <samp class="icon"><ion-icon name="person"></ion-icon></samp>
                <input type="text" id="sphone" required>
                <label>Phone</label>
            </div>
            <div class="remember-forgot">
                <label>
                    <input type="checkbox"> agree to the term and conditons
                </label>
                
            </div>
            <button type="submit" id="reg_btn" class="btn">Create Account</button>
            <div class="login-register">
                <p>Already  have an account? <a href="#" class="login-link">Login</a> </p>
            </div>
        </form>
        
    
    </div>

</div>




<script src="uiu.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

<script type="text/javascript">

$(document).ready(function(){

$("#reg_btn").on("click",function(e){

    e.preventDefault();
    
    var name = $("#sname").val();
    var email = $("#semail").val();
    var password = $("#spassword").val();
    var department = $("#sdep").val();
    var phone = $("#sphone").val();


    $.ajax({

        url: "reg-load.php",
        type: "POST",
        data : {sname:name,semail:email,spassword:password, sdepartment:department, sphone:phone},
        success : function(data){
            
            if(data=="registered"){
                location.reload(true);
            }

            
        }
    });

});

$("#log_btn").on("click",function(e){

e.preventDefault();

var email = $("#lemail").val();
var password = $("#lpassword").val();


$.ajax({

    url: "log-load.php",
    type: "POST",
    data : {lemail:email,lpassword:password},
    success : function(data){
        
        if(data=="loged in"){
            location.href = '../user/userview.php';
        }
        else if(data=="wrong password!"){
            alert(data);
        }

        else if(data=="wrong email or password!"){
            alert(data);
        }

        else if(data=="Enter email and password!"){
            alert(data);
        }

        else if(data=="admin"){
            location.href = '../admin/admin.php';
        }
        
    }
});

});
});
</script>



</body>
</html>