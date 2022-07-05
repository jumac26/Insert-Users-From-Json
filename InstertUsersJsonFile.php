<?php
    include("connection.php");

    $filename = "users.json";

    $data = file_get_contents($filename);

    $array = json_decode($data, true);

    foreach($array as $row)
    {
        $query = "INSERT INTO users (firstName, lastName, age, gender, homeAddress, email, contactNumber, userName, password) 
		values ('".$row["firstName"]."', '".$row["lastName"]."', '".$row["age"]."', '".$row["gender"]."', '".$row["homeAddress"]."', 
        '".$row["email"]."', '".$row["contactNumber"]."', '".$row["userName"]."', '".$row["password"]."')";

        mysqli_query($conn, $query);
    }

    echo '<script type="text/javascript"> alert("Data Inserted") </script>';
?>