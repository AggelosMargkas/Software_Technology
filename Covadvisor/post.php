<?php
session_start();

if (isset($_POST['registration'])) {

    if (
        isset($_POST['title']) && isset($_POST['slug']) &&
        isset($_POST['radio']) && isset($_POST['body'])    
    ) {
        
        $Title  =  $_POST['title'];
        $Slug  = $_POST['slug'];
        $Views = 0;
        $Radio  = $_POST['radio'];
        $Body  = $_POST['body'];
        $Published = 1;

        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "covadvisor";


            $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

            if ($conn->connect_error) {
                die('Could not connect to the database.');
            } else {

                $Insert = "INSERT INTO posts(vac_user_id, title, slug, views, type, body, published) VALUES(?, ?, ?, ?, ?, ?, ?)";
             
                    $stmt = $conn->prepare($Insert);
                    $stmt->bind_param("ississi", $_SESSION['userid'], $Title,  $Slug, $Views, $Radio, $Body, $Published);

                    if ($stmt->execute()) {
                        //echo "New record inserted sucessfully.";
                        header("Location: http://localhost/Covadvisor/homepage.php");
                        die();
                    } else {
                        echo $stmt->error;
                    }
                $stmt->close();
                $conn->close();
            }

    } else {
        echo "All field are required.";
        die();
    }
}
