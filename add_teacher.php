<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js">
 </script>
 <!-- <link rel="stylesheet" type="text/css" href="css/mystyle.css"> -->
  <style>
  	
       .myclass{
            
            background: linear-gradient(to left,#e3256b,#fff6b7,#e3256b );
            padding: 30px;
      }	
  </style>

  
</head>
<body>
	<div id="brandname" class="myclass text-center">
        <h2 id="vjeera"><font color="crimson">SVIP</font>COLLEGE</h2>

        
    </div> 

    <br><br>


	<div class="container">
		<form  class="well" method="post">
			<div class="form-group text-center heading abc" >
					<h2>Create Teacher</h2>
			</div>

				<div class="form-group">
					<label>Frist Name</label>
					<input type="text" name="fname" class="form-control  text-capitalize">
				</div>

				<div class="form-group">
				<label>Last Name</label>
				<input type="text" name="lname" class="form-control  text-capitalize">
			</div>

				<div class="form-group">
				<label>Username</label>
				<input type="text" name="uname" class="form-control  text-capitalize">
			</div>

				<div class="form-group">
				<label>Email</label>
				<input type="email" name="email" class="form-control  text-capitalize">
			</div>

				<div class="form-group">
				<label>Phone No.</label>
				<input type="number" name="phone" class="form-control  text-capitalize">
			</div>

				<div class="form-group">
				<label>Password</label>
				<input type="password" name="pass" class="form-control  text-capitalize">
			</div>

				<div class="text-center">
			<button type="submit" class="btn btn-info" name="create_user">Create Teacher</button>
			
            <a href="dashboard.php" type="button" class="btn btn-info">Go To Dashbord</a>
 
			<button type="reset" class="btn btn-info">Reset</button>
			<a type="button" class='btn btn-info' href="index.php" style='color:white'>Log Out</a>	
			</div>

							

				<?php 
				include("includes/config.php");
				if(isset($_POST['create_user']))
				{

					$fname=$_POST['fname'];
					$lname=$_POST['lname'];
					$uname=$_POST['uname'];
					$email=$_POST['email'];
					$phone=$_POST['phone'];
					$password=$_POST['pass'];


					$query="insert into teachers(fname,lname,uname,email,phone,password) values('$fname','$lname','$uname','$email','$phone','$password')";

					if(mysqli_query($conn,$query))
					 {
                	 echo "<tr bgcolor='gold'  align='center'>
                	             <td colspan='2'>Create New Teacher successfully..</td>
                	       </tr>";
                           header("refresh:3;url=add_teacher.php");
                	       
                }
                else
                {
                	   echo "<tr bgcolor='red'  align='center'>
                	             <td colspan='2'>Enter The Correct Details Of User</td>
                	       </tr>";
                	       header("refresh:3;url=add_teacher.php");

                }



				}/*end of if isset*/

				?>
			</table>
			
		</form>
	</center>

</body>
</html>