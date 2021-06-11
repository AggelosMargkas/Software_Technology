<?php


if (isset($_POST['registration'])) {

    if (
        $_POST['name']!=NULL && $_POST['surname']!=NULL  &&
        $_POST['username']!=NULL  && $_POST['email']!=NULL  &&
        $_POST['password1']!=NULL  && $_POST['password2']!=NULL  &&
        $_POST['vaccine']!=NULL  && $_POST['date']!=NULL  
    ) {

        $Name  =  $_POST['name'];
        $Lastname  = $_POST['surname'];
        $Username  = $_POST['username'];
        $Email  = $_POST['email'];
        $Password1  = $_POST['password1'];
        $Password2  = $_POST['password2'];
        $vac_password  = $_POST['vaccine'];
        $Date  = $_POST['date'];



        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "covadvisor";



        if ($Password1 == $Password2) {

            $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

            if ($conn->connect_error) {
                die('Could not connect to the database.');
            } else {


                $Select = "SELECT email FROM vac_users WHERE email = ? LIMIT 1";
                $Insert = "INSERT INTO vac_users(name, lastname, username, email, password, vac_password, birthday) VALUES(?, ?, ?, ?, ?, ?, ?)";

                $stmt = $conn->prepare($Select);
                $stmt->bind_param("s", $Email);
                $stmt->execute();
                $stmt->bind_result($resultEmail);
                $stmt->store_result();
                $stmt->fetch();

                $rnum = $stmt->num_rows;
                if ($rnum == 0) {
                    $stmt->close();

                    $stmt = $conn->prepare($Insert);
                    $stmt->bind_param("sssssss", $Name, $Lastname, $Username, $Email, $Password1, $vac_password, $Date);

                    if ($stmt->execute()) {
                        //echo "New record inserted sucessfully.";
                        header("Location: http://localhost/Covadvisor/login.html");
                        die();
                    } else {
                        echo $stmt->error;
                    }
                } else {
                    echo "Someone already registers using this email.";
                }

                $stmt->close();
                $conn->close();
            }
        } else {
            echo "Wrong password";
            die();
        }
    } else {
        echo "All field are required.";
        die();
    }
}
