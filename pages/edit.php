<?php
    session_start();
    $con=mysqli_connect("localhost","root","");
    mysqli_select_db($con,"tuition");
    $email=$_SESSION["usrid"];
    $query = "SELECT * FROM student WHERE email = '$email'";
    $select = mysqli_query($con,$query);
    $result = mysqli_fetch_all($select, MYSQLI_ASSOC);
    if ($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        $name=$_POST['name'];
        $addr=$_POST['addr'];
        $phone=$_POST['phone'];
        $age=$_POST['age'];
        $gender=$_POST['gender'];
        $sem=$_POST['sem'];
        $stream=$_POST['stream'];
 
        $update="UPDATE `student` SET `name` = '$name', `address` = '$addr', `phone` = '$phone', `age` = '$age', `sem` = '$sem', `stream` = '$stream' WHERE `student`.`email` = '$email'";
        mysqli_query($con,$update);
        header("Location: ./user.php");
    }   
?>  
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Myprofile/Edit</title>
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
            /*Layout */
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
            /*Main-Editform */

            
        .editform {
            margin-top:40px;
            background-position:center;
            background-size:cover;
            font-family:sans-serif;
             background-position: fixed;
            width:800px;
            background-color:rgb(0,0,0,0.6);
            margin-top:-15px;
           
            color:#FFFFFF;
            padding:-15px 0px 10px 0px;
            text-align:center;
            border-radius:15px 15px 0px 0px ;
            }  
    
            main{
            background-color:rgb(0,0,0,0.5);
            background-position: fixed;
            width:800px;
            margin:auto;}
        form{
            padding:0px;
        
        } 
        
 
        .name{
                    margin-left:25px;
                     margin-top:-5px;
                     margin-bottom:0px;

                    color: white;
                    font-size: 18px;
                    font-weight: 700;}
        .firstname{
            width: 480px;
            position: relative;
            left:200px;
            top:-37px;
            line-height: 30px;
            border-radius: 6px;
            padding: 0 22px;
            font-size: 16px;
            
            
        }

        .adddress{
            position:relative;
            left:200px;
            top:-37px;
            line-height: 30px;
            width:480px;
            border-radius: 6px;
            padding: 0 22px;
            font-size: 16px;
            color: #555;  }
        .email{
            position:relative;
            left:200px;
            top:-37px;
            line-height: 30px;
            width:480px;
            border-radius: 6px;
            padding: 0 22px;
            font-size: 16px;
            color: #555;  
            }     
        
        .phone{
            position:relative;
            left:200px;
            top:-37px;
            line-height: 30px;
            width:480px;
            border-radius: 6px;
            padding: 0 22px;
            font-size: 16px;
            color: #555; 
        }

        .age{
            position:relative;
            left:200px;
            top:-37px;
            line-height: 30px;
            width:70px;
            border-radius: 6px;
            padding: 0 22px;
            font-size: 16px;
            color: #555; 

        }  
     .gender{
                
        display:inline-block;
        padding-right:120px;
        font-size:25px;
        margin-left:25px;
        margin-top:20px;
        margin-bottom: 25px;
        color:white;
        }
        .gender input{
             width:20px;
            height:20px;
            border-radius:50%;
            cursor:pointer;
            outline:none;
            } 
        .option{
            position:relative;
            left:200px;
            top:-37px;
            line-height: 25px;
            width:200px;
            height:40px;
            border-radius: 6px;
            padding: 0 22px;
            font-size: 16px;
            color: #555; 
            outline:none;
            overflow:hidden;
        }    
            .option option{
                        font-size:20px;
            }
            .button{
                background-color:#3BAF9F;
            display:block;
            font-size: large;
            margin:-10px 0px 0px 20px;
            text-align:center;
            border-radius:12px;
            border:2px solid #366473;
            padding:14px 110px;
            outline:none;
            color:white;
            cursor:pointer;
            transition:0.25px;
            } 
        .button:hover{
                        background-color:#5390F5;
            } 
        .tuition{color: #00ff99;}


</style>  
<script src="https://kit.fontawesome.com/a076d05399.js"></script>  
<script>
        function edit(e)
        {
          e.preventDefault();  
          var name=/^[A-Za-z]+/;
          var addr=/^[A-Za-z]+/;
          var phone=/^\d{10}$/;
          
          var sem = document.getElementById("sem");
          var stream = document.getElementById("stream");
          age=document.editf.age.value
          if(!document.editf.name.value.match(name))
          {
              alert("Name should be character..");
          } 	      
          else if(!document.editf.addr.value.match(addr))
          {
             alert("Invalid Address..");
          } 
         else if(!document.editf.phone.value.match(phone))
          {
             alert("Phone Number Should be of 10 digits!!!");
          }
         else if (isNaN(age) || age < 1 || age > 100)
          { 
            alert("The age must be a number between 1 and 100");
          }
         else if (sem.value == "")
          {
            alert("Please select a semester!");
          }
         else if (stream.value == "")
          {
            alert("Please select a stream!");
            
          } 
          else
           {
            alert("Details Updated");
                console.log(e.target);
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
            <li><a class="nav-link" href="./delete.php">Delete Account</a></li>
            <li><a class="nav-link" href="../index.php">Logout</a></li>
        </ul>
        </nav>
        <main>
        <div class="editform">
                    <h1>
            Edit Profile</h1>
            </div>
            <div class="main">
                
            <form name="editf" method="post" onsubmit="edit(event)" >
            <h2 class="name">
            Name </h2>
            <input class="firstname" type="text" name="name" value="<?php echo $result[0]['name']; ?>">
            <h2 class="name">
            Address </h2>
            <input class="adddress" type="text" name="addr" value="<?php echo $result[0]['address']; ?>">
                        <h2 class="name">
            Phone&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+91</h2>

            <input class="phone" type="text"   maxlength="10" name="phone" value="<?php echo $result[0]['phone']; ?>">
            <h2 class="name">
            Age</h2>
            <input class="age" type="text" maxlength="2" name="age" value="<?php echo $result[0]['age']; ?>">
            <h2 class="name">
                Gender</h2>
                <label class="gender">
                    <input class="radio-one" type="radio" value="male" <?php echo ($result[0]['gender']=='male')?'checked':'' ?> name="gender">
                    <span class="checkmark"></span>
                    Male
                </label>

                <label class="gender">
                    <input class="radio-two" type="radio" value="female" <?php echo ($result[0]['gender']=='female')?'checked':'' ?> name="gender">
                    <span class="checkmark"></span>
                    Female
                </label>
                <label class="gender">
                    <input class="radio-two" type="radio" value="custom" <?php echo ($result[0]['gender']=='custom')?'checked':'' ?> name="gender">
                    <span class="checkmark"></span>
                    Custom
                </label>
            <h2 class="name">Semester</h2>
            <select class="option" id="sem" name="sem" value="sem">
                            <option value="" <?php if ($result[0]['sem'] == '')  echo 'selected = "selected"'; ?>>--Choose option--</option>
                            <option value="S1" <?php if ($result[0]['sem'] == 'S1')  echo 'selected = "selected"'; ?>>Sem 1</option>
                            <option value="S2" <?php if ($result[0]['sem'] == 'S2')  echo 'selected = "selected"'; ?>>Sem 2</option>
                            <option value="S3" <?php if ($result[0]['sem'] == 'S3')  echo 'selected = "selected"'; ?>>Sem 3</option>
                            <option value="S4" <?php if ($result[0]['sem'] == 'S4')  echo 'selected = "selected"'; ?>>Sem 4</option>
                            <option value="S5" <?php if ($result[0]['sem'] == 'S5')  echo 'selected = "selected"'; ?>>Sem 5</option>
                            <option value="S6" <?php if ($result[0]['sem'] == 'S6')  echo 'selected = "selected"'; ?>>Sem 6</option>
                            <option value="S7" <?php if ($result[0]['sem'] == 'S7')  echo 'selected = "selected"'; ?>>Sem 7</option>
                            <option value="S8" <?php if ($result[0]['sem'] == 'S8')  echo 'selected = "selected"'; ?>>Sem 8</option>
                        </select>
            <h2 class="name">Stream</h2>            
            <select class="option" id="stream" name="stream" value="stream">
                            <option value="" <?php if ($result[0]['stream'] == '')  echo 'selected = "selected"'; ?>>--Choose option--</option>
                            <option value="CSE" <?php if ($result[0]['stream'] == 'CSE')  echo 'selected = "selected"'; ?>>CSE</option>
                            <option value="ECE" <?php if ($result[0]['stream'] == 'ECE')  echo 'selected = "selected"'; ?>>ECE</option>
                            <option value="EEE" <?php if ($result[0]['stream'] == 'EEE')  echo 'selected = "selected"'; ?>>EEE</option>
                        </select>   
                            
                <center> 
                        <input  type="submit" class="button"  value="Update" ></input>        
                </center>
                
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
    