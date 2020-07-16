<?php
    session_start();
    $con=mysqli_connect("localhost","root","");
    mysqli_select_db($con,"tuition");
    $email=$_SESSION["usrid"];
    if ($_SERVER['REQUEST_METHOD'] === 'POST')
    {
      $newpass=$_POST['newpass'];
      $currpass=$_POST['currpass'];
      $query = "SELECT * FROM student WHERE email = '$email'";
      $select = mysqli_query($con,$query);
      $result = mysqli_fetch_all($select, MYSQLI_ASSOC);
      if ($currpass == $result[0]['password'])  
      {
        $update = "UPDATE `student` SET `password` = '$newpass' WHERE `student`.`email` = '$email'";
        mysqli_query($con,$update);
        $message="Password changed successfully!";
        header("refresh:0.1; url=./user.php");
      }
      else
        {$message="You entered wrong current password!!!";}
    }
?>  
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Myprofile/Change Password</title>
    <link rel="icon" href="../images/logo.jpg" type="image/jpg">
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

		    a:link,a:visited{color:white;
				}
		    a:hover{color: #00ff99;}
            /*Footer Ends*/   
            /*Main-Table  */
            body{
                    background:url(../images/probg.jpg) no-repeat ;
                    background-size:cover;
            }
            .welcome{
                margin-top:-20px;
                background:black;
                opacity:0.5;
                color:white;
            }
            .home{
                position: absolute;
            color: white;
            top:25%;
            right: 60;
            transform: translateY(-50%);
            }
            /*navbar*/
            nav{
            margin-top:-15px;
            margin-left:0px;
			padding:0px;
			font-family:sans-serif;
			}
		    nav{
			position:fixed;
			
			width:18%;
			height:80%;
			background-color:#151719;
            opacity:0.8;

            }
            nav a{
			
			text-decoration:none;
			}
			
	
		    nav ul li{
			text-align:center;
			list-style:none;
			padding:45px 20px;
			border-bottom:1px solid rgba(100,100,100,0.3);
		}
        /*Change pssword-Main*/
        .login-box{
              width: 400px;
              position: absolute;
              top: 60%;
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
            .tuition{color: #00ff99;}


</style>  
<?php
        if (isset($message)) {
            echo "<script>alert('$message');</script>";
        }
        ?>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>  
<script>
            function password(e)
            {
                e.preventDefault();
                var cp=document.f.currpass.value;
                var np=document.f.newpass.value;
                var p1=document.f.pass1.value;
                if(cp=='')
                    {
                        alert("Please enter Current password !");
                    }
               
                else if(np=='')
                    {
                        alert("Please enter new password !");
                    }	
    
    
                else if(np.length<8)
                    {
                        alert("Password must contain atleast 8 characters");			
                    }	
                                
                else if(np!=p1)
                     {
                         alert("Password missmatch");
                    }			
                else{
                         e.target.submit();
                    }         
                        
            }				
            </script>
</head>

    <body>
        <header>
            <div class="logo-wrapper">
                <img id="college_logo" src="../images/logo.jpg" alt="Logo">
            </div>
            <div class="title">
                
            <h1><span class="tuition">Tuition4u</span> Institute of Online Tutoring</h1>
                
            </div>
        </header>
        <div class="welcome">
                   <h1> <?php echo "welcome " . $email; ?></h1>
                   <div class="home"><a href="../index.php"><i class="fa fa-home fa-2x" id="homebtn"></i></a>
                    </div>
         </div>
        <nav id="nav" >
        <ul class="nav-links">
            <li><a class="nav-link" href="./user.php">View Profile</a></li>
            <li><a class="nav-link" href="./edit.php">Edit Profile</a></li>
            <li><a class="nav-link" href="./password.php">Change Password</a></li>
            <li><a class="nav-link" href="../index.php">Logout</a></li>
        </ul>
        </nav>
        <main>
        <div class="login-box">
                <form name="f" method="post"  onsubmit="password(event)" >
                <h1>Change Password</h1>
                <div class="textbox">
                <i class="fas fa-user"></i>
                  <input type="password" placeholder="Enter current password" name="currpass">
                </div>
                <div class="textbox">
                <i class="fas fa-lock"></i>
                  <input type="password" placeholder="Enter new password" name="newpass">
                </div>
                <div class="textbox">
                <i class="fas fa-check"></i>
                  <input type="password" placeholder="Confirm your Password" name="pass1">
                </div>
                <input type="submit" class="btn" value="Change" >
            </form>
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
    