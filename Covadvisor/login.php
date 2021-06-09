<?php


if (isset($_POST['login'])) {

    if (
        isset($_POST['username'])  &&  isset($_POST['password']) && isset($_POST['radio']) && 
        $_POST['radio'] == 'reg'
    ) {


        $Username  = $_POST['username'];
        $Password  = $_POST['password'];
       



        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "covadvisor";

            $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

            if ($conn->connect_error) {
                die('Could not connect to the database.');
            } else {

              $Select = "SELECT usernameOfUser, passwordOfUser FROM users WHERE usernameOfUser = ? AND passwordOfUser = ? LIMIT 1";
             

              $stmt = $conn->prepare($Select);
              $stmt->bind_param("ss", $Username, $Password);
              $stmt->execute();
              $stmt->bind_result($resultUsername,$resultPassword);
              $stmt->store_result();
              $stmt->fetch();

              $rnum = $stmt->num_rows;
              if ($rnum == 0) {

                echo "User not found";
              } else {
                  //echo "Welcome";
                  header("Location: http://localhost/Covadvisor/homepage.php");
                  die();
              }

              $stmt->close();
              $conn->close();
            }
    }elseif(
        isset($_POST['username'])  &&  isset($_POST['password']) &&  isset($_POST['radio']) && 
        $_POST['radio'] == 'vac'
    ) { 
    
        
        $Username  = $_POST['username'];
        $Password  = $_POST['password'];
       



        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "covadvisor";

            $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

            if ($conn->connect_error) {
                die('Could not connect to the database.');
            } else {

              $Select = "SELECT username, password FROM vac_users WHERE username = ? AND password = ? LIMIT 1";

              $stmt = $conn->prepare($Select);
              $stmt->bind_param("ss", $Username, $Password);
              $stmt->execute();
              $stmt->bind_result($resultUsername,$resultPassword);
              $stmt->store_result();
              $stmt->fetch();

              $rnum = $stmt->num_rows;
              if ($rnum == 0) {
                                
                echo "User not found";
              } else {
                  //echo "Welcome";
                  header("Location: http://localhost/Covadvisor/homepage.php");
                  die();
              }

              $stmt->close();
              $conn->close();
            }
        
    } else {
        echo "All field are required.";
        die();
    }
}
