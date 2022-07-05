<!--    Macabulos, Julius M.    BSCPE 3-7p      Activity No. 1-->

<?php
    include("connection.php");

    if(isset($_POST['submit']))
	{
		//something was posted
		$userName = $_POST['userName'];
		$password = $_POST['password'];

        $data = '{"userName":"' . $userName.'", "password" : "'. $password . '"}';
        $json_data = json_decode($data, false);

		if(!empty($userName) && !empty($password) && !is_numeric($userName))
		{

			//read from database
			$query = "select * from users where userName = '$userName' limit 1";
			$result = mysqli_query($conn, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{ 
						echo '<script type="text/javascript"> alert("Logged in Successfully") </script>';
					}
                    else{
                        echo '<script type="text/javascript"> alert("Invalid Password!") </script>';
                    }
				}
                else{
                    echo '<script type="text/javascript"> alert("Register First") </script>';
                }
			}
		}else
		{
			echo '<script type="text/javascript"> alert("Username should be alphanumerical!") </script>';
		}
	}
?>

<!DOCTYPE html>

<html>
    <head>
        <script>
            function validateForm(){
                let userName = document.getElementById("userName").value;
                let password = document.getElementById("password").value;

                if(userName == "" || password == ""){
                    alert("Username and password is required");
                    return false;
                }
            }
        </script>
    </head>
    <body>
        <div class=box>
            <p class="title">Authorization</p><br>
            <form method="POST" action=""> 
                <label for="userName">Username</label>
                <input class ="inputBox" type="text" id="userName" name="userName"><br><br>
                <label for="pass">Password</label>
                <input class ="inputBox" type="password" id="pass" name="password"><br><br>
                <input class ="button" type="submit" value="Submit" name="submit">
                <input class ="button" type="submit" value="Cancel">
            </form>
        </div>
    </body>
    <style>
        .button
        {
            background-color: #42b0f5;
            border: none;
            color: white;
            padding: 14px 32px;
            text-decoration: none;
            margin: 4px 5px;
            cursor: pointer;
            border-radius: 20px;
        }
        .box
        {
            border: 3px solid #b6e3f2;
            padding: 50px 32px;
            margin: 100px 500px;
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
        }
        .inputBox
        {
            padding: 5px 20px;
        }
        .inputBox:focus
        {
            border: 3px solid #555;
        }
        .title
        {
            font-weight: bold;
        }
    </style>
</html>