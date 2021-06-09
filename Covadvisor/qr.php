<?php


if (isset($_POST'generate'])) {

    if (
        isset($_POST['src']) 
    ) {
        
        $Vac_user_id = 1;
        $Image  =  $_POST['src'];     

        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "covadvisor";


            $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

            if ($conn->connect_error) {
                die('Could not connect to the database.');
            } else {

                $Insert = "INSERT INTO qr(vac_user_id, image) VALUES(?, ?)";
             
                    $stmt = $conn->prepare($Insert);
                    $stmt->bind_param("is", $Vac_user_id, $Image);

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
