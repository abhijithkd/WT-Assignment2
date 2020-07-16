  
<?php
// Only executes for POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST')
 {
    session_start();
    $email = $_POST["email"];
    $password = $_POST["pass"];
    $conn = mysqli_connect("localhost","root","");
    mysqli_select_db($conn,"tuition");

    if (!$conn) {
        $errorMessage = "Oops! Database Connection Failed";
    }

    $query = "SELECT * FROM student WHERE email = '$email'";

    $select = mysqli_query($conn,$query);
    

    //while($result = mysqli_fetch_all($select, MYSQLI_ASSOC)))
       // {
        $result = mysqli_fetch_all($select, MYSQLI_ASSOC);
        if (empty($result)) {
            $errorMessage = "User not found";
        }
        else if ($result[0]['password'] === $password) {
            $_SESSION["usrid"]=$email;
            header("Location:pages/user.php");
        } else {
            $errorMessage = "Invalid Password";
        }
        //}
        mysqli_close($conn);
}
?>
<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Signup</title>
    <link rel="icon" href="images/logo.jpg" type="image/jpg">
        <style>
            
            /*Header*/
            header{
		    background-color:#1C2833;
		    color:#F8F9F9;
		    font-size:17px;
		    grid-column: 1/7;
            display: flex;
		    justify-content: flex-start;
		    align-items: center;
		    padding: 0 3.5%;}
		    .logo-wrapper {
			width: 8rem;
			height: 8rem;
			border-radius: 50%;
			display: flex;
			align-items: center;
			justify-content: center;
			background-color: white;
			margin-right: 3rem;
			}
			#college_logo {
				width: 5.0rem;
                width: 100px;
			}
            .title{font-size: 30;}
            /*header ends*/            
            /*Footer*/
            #footer{
            background-color:#17202A;
			color:white;
            position: fixed;
            bottom: 0px;
            width: 100%;
			margin:0px;
			padding:0px;
			width:100%;
			text-decoration:none;
			font-style:bold;
			grid-column: 1/13;
			display: flex;
			align-items: center;
			justify-content: center;
			}
	        #footer a{text-decoration:none;}
	        #name{margin-right:350px;
			}
	        #mail{margin-left:200px;
			}	

		    a:link,a:visited{color:white;}
		    a:hover{color: #00ff99;}
            /*Footer Ends*/
            /*Login/Reg*/
            body{
              margin: 0;
              padding: 0;
              font-family: sans-serif;
              background: url(images/bg.jpg) no-repeat;
              background-size: cover;
                }
            .login-box{
              width: 280px;
              position: absolute;
              top: 50%;
              left: 50%;
              transform: translate(-50%,-50%);
              color: white;
            }
            .login-box h1{
              float: left;
              font-size: 40px;
              border-bottom: 6px solid #4caf50;
              margin-bottom: 50px;
              padding: 13px 0;
            }
            .textbox{
            width: 100%;
            overflow: hidden;
            font-size: 20px;
            padding: 8px 0;
            margin: 8px 0;
            border-bottom: 1px solid #4caf50;
            }
            .textbox i{
            width: 26px;
            float: left;
            text-align: center;
            }
            .textbox input{
            border: none;
            outline: none;
            background: none;
            color: white;
            font-size: 18px;
            width: 80%;
            float: left;
            margin: 0 10px;
            }
            .btn{
            width: 100%;
            background: none;
            border: 2px solid #4caf50;
            color: white;
            padding: 5px;
            font-size: 18px;
            cursor: pointer;
            margin: 12px 0;
            }      
            .separator {
                display: flex;
                align-items: center;
                text-align: center;
            }
            .separator::before, .separator::after {
                content: '';
                flex: 1;
                border-bottom: 1px solid rgba(5, 89, 110, 0.877);
            }
            .separator::before {
                margin-right: .25em;
            }
            .separator::after {
                margin-left: .25em;
            }
            .tuition{color: #00ff99;}
            .about{
                background-color:black;
                opacity:0.5;
                color:white;
                margin-bottom:-10px;
                font-size:15px;
                width:65%;
                margin-top:400px;
                margin-left:270px;
                border-radius:15px 15px 15px 15px ;
            }
        </style>
         <?php
        if (isset($errorMessage)) {
            echo "<script>alert('Username or password is incorrect');</script>";
        }
        ?>
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <script>
            function login(e)
            {
                e.preventDefault();
                var u=document.f.email.value;
                var p=document.f.pass.value;
                var mail=/^([A-Za-z0-9.\_\-])+\@([A-Za-z0-9.\_\-])+\.([A-Za-z]{2,4})$/;
                if(u=='')
                    {
                        alert("Please enter username!");
                    }
    
                else if(!document.f.email.value.match(mail))
                    {
                        alert("Invalid Email....");
                    }				
                else if(p=='')
                    {
                        alert("Please enter password !");
                    }	
    
    
                else if(p.length<8)
                    {
                        alert("Password must contain atleast 8 characters");			
                    }				
                else{
                         //alert("LOgged In");
                         console.log(e.target);
                         e.target.submit();
                    }         
                        
            }				
            </script>
    </head>

    <body>
        <header>
            <div class="logo-wrapper">
                <img id="college_logo" src="images/logo.jpg" alt="Logo">
            </div>
            <div class="title">
                
            <h1><span class="tuition">Tuition4u</span> Institute of Online Tutoring</h1>
                
            </div>
        </header>
        <main>

            <div class="login-box">
                <form name="f" method="post"  onsubmit="login(event)" >
                <h1>Login|Register</h1>
                <div class="textbox">
                  <i class="fas fa-user"></i>
                  <input type="text" placeholder="Username" name="email">
                </div>
                <div class="textbox">
                  <i class="fas fa-lock"></i>
                  <input type="password" placeholder="Password" name="pass">
                </div>
                <input type="submit" class="btn" value="login" >
                <div class="separator">OR</div>
                
               <a href="pages/register.php"> <input type="button" class="btn" value="Register"></a>
            </form>
            </div>   
            <div class="about">
                  <blockquote>
                  <center><h2>About T4uIOT</h2></center>
                  <p>Tuition4u is a leading Online Tutoring  Company providing world-class online tutoring services for BTech students.
                      The institute is an initiative of few 3rd Btech students and there are student tutors and other faculties for tutoring services.</p>    
                 The Tuition4u team is comprised of highly skilled educators and technologists with a collective experience of over 5 years in education and technology.
                   All the tutors are highly experienced and go through a rigorous selection process.<br> We only pick the best of the best!
                 
                  </blockquote>    
            </div>    
        </main>
        <footer>
            <div id="footer">
		
                <div id="name"><i class="fa fa-code fa-sm"></i>&nbsp;&nbsp;  Developed by : <a target="_blank"
                        href="https://github.com/abhijithkd">Abhijith&nbsp;K D</a>
                </div>		
                <div id="mail"><i class="fa fa-envelope fa-sm"></i>&nbsp;&nbsp; Mail ID : <a target="_blank"
                        href="mailto:abhijithkd123@gmail.com">abhijithkd123@gmail.com</a>
                </div>
        </footer>        
    </body>
</html>