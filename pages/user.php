<?php
    session_start();
    $con=mysqli_connect("localhost","root","");
    mysqli_select_db($con,"tuition");
	$email=$_SESSION["usrid"];
    $query = "SELECT * FROM student WHERE email = '$email'";
    $select = mysqli_query($con,$query);
    $result = mysqli_fetch_all($select, MYSQLI_ASSOC);
?>  
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Myprofile/View</title>
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

            table,th,td{ 
                width:45%;
                margin:auto;
                border"1px solid white;
                border-collapse:collapse;
                text-align:left;
                font-size:25px;
                table-layout:fixed;
                background:black;
                opacity:0.4;
                color: #00cc00;
                margin-top:-15px;

            }
            th,td{
                padding:15px;
                opacity:0.9;
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
			height:70%;
			background-color:#151719;
            opacity:0.8;

            }
            nav a{
			
			text-decoration:none;
			}
			
	
		    nav ul li{
			text-align:center;
			list-style:none;
			padding:40px 20px;
			border-bottom:1px solid rgba(100,100,100,0.3);
		}
        .tuition{color: #00ff99;}


</style>  
<script src="https://kit.fontawesome.com/a076d05399.js"></script>  
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
            <li><a class="nav-link" href="./delete.php">Delete Account</a></li>
            <li><a class="nav-link" href="../index.php">Logout</a></li>
        </ul>
        </nav>
        <main>
                    <table>
                        <tr>
                            <td>Name</td>
                            <td> <?php echo $result[0]['name']; ?> </td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td> <?php echo $result[0]['address']; ?> </td>
                        </tr>
                        <tr>
                            <td>Mail ID</td>
                            <td> <?php echo $result[0]['email']; ?> </td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td> <?php echo $result[0]['phone']; ?> </td>
                        </tr>
                        <tr>
                            <td>Age</td>
                            <td> <?php echo $result[0]['age']; ?> </td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td> <?php echo $result[0]['gender']; ?> </td>
                        </tr>
                        <tr>
                            <td>Semester</td>
                            <td> <?php echo $result[0]['sem']; ?> </td>
                        </tr>   
                        <tr>
                            <td>Stream</td>
                            <td> <?php echo $result[0]['stream']; ?> </td>
                        </tr>                                                            
                    </table>
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
    