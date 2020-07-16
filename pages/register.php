<?php
$con=mysqli_connect("localhost","root","");
if (!$con)
  {

  die('Could not connect: ' . mysqli_error());

  }
mysqli_select_db($con,"tuition");
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $email=$_POST['email'];
    $name=$_POST['name'];
    $addr=$_POST['addr'];
    $phone=$_POST['phone'];
   	$age=$_POST['age'];
	$gender=$_POST['gender'];
	$sem=$_POST['sem'];
	$stream=$_POST['stream'];
    $pass=$_POST['pass'];
    $query = "SELECT * FROM student WHERE email='$email'";
    $check = mysqli_query($con, $query);
    if (mysqli_num_rows($check) > 0)
    {
        $message = "Sorry... username already taken";
    }  
    else    
    {
        mysqli_query($con,"insert into student(email,name,address,phone,age,gender,sem,stream,password) values('$email','$name','$addr','$phone','$age','$gender','$sem','$stream','$pass')");
        $message="Registration Successful";
        header("refresh:0.1; url=../index.php");
        mysqli_close($con);
    }    
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="icon" href="../images/logo.jpg" type="image/jpg">
    <?php
        if (isset($message)) {
            echo "<script>alert('$message');</script>";
        }
        ?>
    <style>
                *{
        margin:0;
        padding:0;
        }
        body{
            
            background-image: url(../images/regbg.jpg) ;
            margin-top:40px;
            background-position:center;
            background-size:cover;
            font-family:sans-serif;
            background-position: fixed;
            }
        .regform{
            width:800px;
            background-color:rgb(0,0,0,0.6);
            margin:auto;
            color:#FFFFFF;
            padding:10px 0px 10px 0px;
            text-align:center;
            border-radius:15px 15px 0px 0px ;
            }  
        .main{
            background-color:rgb(0,0,0,0.5);
            background-position: fixed;
            width:800px;
            margin:auto;}
        
        form{padding:5px;} 
        a:link,a:visited{color:white;}
		a:hover{color: #00ff99;}
        
 
        .name{
            margin-left:25px;
            margin-top:30px;       
            color: white;
            font-size: 18px;
            font-weight: 700;
            }
        .firstname{
            width: 480px;
            position: relative;
            left:200px;
            top:-37px;
            line-height: 40px;
            border-radius: 6px;
            padding: 0 22px;
            font-size: 16px;
            
            
        }
        .firstlabel{
            position:relative;
            color:#E5E5E5;    
            text-transform: capitalize;
            font-size: 14px;
            left:203px;
            top:-45px;
        }   
        .lastlabel{
            position:relative;
            color:#E5E5E5;
            text-transform:capitalize;
            font-size:14px;
            left:492px;
            top:-76px;
            } 
        .adddress{
            position:relative;
            left:200px;
            top:-37px;
            line-height: 40px;
            width:480px;
            border-radius: 6px;
            padding: 0 22px;
            font-size: 16px;
            color: #555;  }
        .email{
            position:relative;
            left:200px;
            top:-37px;
            line-height: 40px;
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
            line-height: 40px;
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
            line-height: 40px;
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
        margin-bottom: 10px;
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
            line-height: 40px;
            width:200px;
            height:40px;
            border-radius: 6px;
            padding: 0 22px;
            font-size: 16px;
            color: #555; 
            outline:none;
            overflow:hidden;
        }    
        .option option{font-size:20px;}
        #coustomer{
            margin-left:25px;
            color:white;
            font-size:18px;
            
            } 
        .radio{
        display:inline-block;
        padding-right:70px;
        font-size:25px;
        margin-left:25px;
        margin-top:15px;
        color:white;
        }
        .radio input{
                    width:20px;
            height:20px;
            border-radius:50%;
            cursor:pointer;
            outline:none;
            } 
            .button{
                background-color:#3BAF9F;
            display:block;
            font-size: xx-large;
            margin:20px 0px 0px 20px;
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
        #homebtn{
            position: absolute;
            top:10%;
            right: 370;
            transform: translateY(-50%);
            }
        }     
    </style>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script>
        function reg(e)
        {
          e.preventDefault();  
          var name=/^[A-Za-z]+/;
          var addr=/^[A-Za-z]+/;
          var mail=/^([A-Za-z0-9.\_\-])+\@([A-Za-z0-9.\_\-])+\.([A-Za-z]{2,4})$/;
          var phone=/^\d{10}$/;
          
          var sem = document.getElementById("sem");
          var stream = document.getElementById("stream");
          age=document.regf.age.value
          if(!document.regf.name.value.match(name))
          {
              alert("Name should be character..");
          } 	      
          else if(!document.regf.addr.value.match(addr))
          {
             alert("Invalid Address..");
          } 
         else if(!document.regf.email.value.match(mail))
          {
                alert("Invalid Mail ID....");
                
          }
        else if(!document.regf.phone.value.match(phone))
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
            var p1=document.regf.pass.value;
            var p2=document.regf.pass2.value;
                 if(p1.length<8)
            {
                alert("password must contain atleast 8 characters");
            }
            
             else if(p1!=p2)
            {
                alert("Password missmatch");
            }
             else if (  regf.permit[0].checked == false  )
            {
                alert ( "You must Agree to complete Registartion" );
            }  
            else
            {
                console.log(e.target);
                e.target.submit();
            }          
           }	
        }
     </script>     

</head>
<body>
                <div class="regform">
                    <h1>
            Registration Form</h1>
            <a href="../index.php"><i class="fa fa-home fa-2x" id="homebtn"></i></a>
            </div>
            <div class="main">
                
            <form name="regf" method="post" onsubmit="reg(event)" >
            <h2 class="name">
            Name </h2>
            <input class="firstname" type="text" name="name">
            <h2 class="name">
            Address </h2>
            <input class="adddress" type="text" name="addr">
                        <h2 class="name">
            Email</h2>
            <input class="email" type="text" name="email">
                        <h2 class="name">
            Phone&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+91</h2>

            <input class="phone" type="text"   maxlength="10" name="phone">
            <h2 class="name">
            Age</h2>
            <input class="age" type="text" maxlength="2" name="age">
            <h2 class="name">
                Gender</h2>
                <label class="gender">
                    <input class="radio-one" type="radio" value="male" checked="checked" name="gender">
                    <span class="checkmark"></span>
                    Male
                </label>

                <label class="gender">
                    <input class="radio-two" type="radio" value="female" name="gender">
                    <span class="checkmark"></span>
                    Female
                </label>
                <label class="gender">
                    <input class="radio-two" type="radio" value="custom" name="gender">
                    <span class="checkmark"></span>
                    Custom
                </label>
            <h2 class="name">Semester</h2>
            <select class="option" id="sem" name="sem" value="sem">
                            <option  selected="selected" value="">--Choose option--</option>
                            <option value="S1">Sem 1</option>
                            <option value="S2">Sem 2</option>
                            <option value="S3">Sem 3</option>
                            <option value="S4">Sem 4</option>
                            <option value="S5">Sem 5</option>
                            <option value="S6">Sem 6</option>
                            <option value="S7">Sem 7</option>
                            <option value="S8">Sem 8</option>
                        </select>
            <h2 class="name">Stream</h2>            
            <select class="option" id="stream" name="stream" value="stream">
                            <option  selected="selected" value="">--Choose option--</option>
                            <option value="CSE">CSE</option>
                            <option value="ECE">ECE</option>
                            <option value="EEE">EEE</option>
                        </select>   

                <h2 class="name">
            Enter Password </h2>
            <input class="firstname" type="password" name="pass" ><br>
            <h2 class="name">
            Confirm Password </h2>
            <input class="firstname" type="password" name="pass2" ><br>
                            
                <center>
                        <h2 id="coustomer">
                            I hereby declare that the information given in this application is true and correct.</h2>
            <label class="radio">
                            <input class="radio-one" type="radio" name="permit" value="agree" checked="checked" name="rdiobtn">
                            <span class="checkmark"></span>
                            Agree
                        </label> 
                        <label class="radio">
                            <input class="radio-two" type="radio" name="permit" value="disagree" name="rdiobtn">
                            <span class="checkmark"></span>
                            Disagree
                        </label>
                
                        <input  type="submit" class="button"  value="submit" ></input>
                        
                </center>
                
                    </form>
            </div>
</body>
</html>