<!DOCTYPE html>
<html>


<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Covid Advisor Home Page</title>
    <link rel="stylesheet" href="styleHomePage.css">
    <script src="https://kit.fontawesome.com/eb6b0464f7.js" crossorigin="anonymous"></script>


</head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Forum</title>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Titillium+Web:ital@1&display=swap" rel="stylesheet">
</head>

<body>
<header>
    <!--NavBar Section-->
    <div class="navbar">
        <nav class="navigation" id="navigation">
            <span class="close-icon" id="close-icon" onclick="showIconBar()"><i class="fa fa-close"></i></span>
            <ul class="nav-list">
                <li class="nav-item"><a href="qr.html">QR</a></li>
                <li class="nav-item"><a href="homepage.php">HOME</a></li>
                <li class="nav-item"><a href="post.html">POST</a></li>
            </ul>
        </nav>
        <a class="bar-icon" id="iconBar" onclick="hideIconBar()"><i class="fa fa-bars"></i></a>
        <div class="brand">CovAdvisor</div>
    </div>
</header>

<div class="container">

    <div class="subforum">

        <div class="subforum-title">

            <h1>Vaccine</h1>


        </div>
        <?php 
        
        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "covadvisor";

        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

        if ($conn->connect_error) {
            die('Could not connect to the database.');
        } 


            $sql = "SELECT title,body,created_at,views,vac_users.name,type FROM posts INNER JOIN vac_users 
            ON posts.vac_user_id=vac_users.vac_id  WHERE type = 'Vaccine'";

            $result = $conn->query($sql);
           
            if (mysqli_num_rows($result) > 0):
                while ($row = $result->fetch_assoc()): ?>

   


        <div class="subforum-row">

            <div class="subforum-icon subforum-column center">
                <i class="fa fa-viruses"></i>
            </div>

            <div class="subforum-description subforum-column">

                <h1><a href=""><?php echo $row["title"];?></a></h1>
                <p><?php echo $row["body"];?></p>
            </div>

            <div class="subforum-stats subforum-column center">

                <span><?php echo $row["views"];?> Views</span>

            </div>

            <div class="subforum-info subforum-column">

                <b><a href="">Last Post</a></b> by <a href=""><?php echo $row["name"];?></a>

                <br>
                on <small><?php echo $row["created_at"];?></small>

            </div>
        </div>

        <?php endwhile ?>
     <?php endif ?>
    </div>


    <div class="subforum">

        <div class="subforum-title">

            <h1>Covid</h1>


        </div>
        <?php 
        
        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "covadvisor";

        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

        if ($conn->connect_error) {
            die('Could not connect to the database.');
        } 


            $sql = "SELECT title,body,created_at,views,vac_users.name,type FROM posts INNER JOIN vac_users 
            ON posts.vac_user_id=vac_users.vac_id  WHERE type = 'Covid'";

            $result = $conn->query($sql);
           
            if (mysqli_num_rows($result) > 0):
                while ($row = $result->fetch_assoc()): ?>

   


        <div class="subforum-row">

            <div class="subforum-icon subforum-column center">
                <i class="fa fa-viruses"></i>
            </div>

            <div class="subforum-description subforum-column">

                <h1><a href=""><?php echo $row["title"];?></a></h1>
                <p><?php echo $row["body"];?></p>
            </div>

            <div class="subforum-stats subforum-column center">

                <span><?php echo $row["views"];?> Views</span>

            </div>

            <div class="subforum-info subforum-column">

                <b><a href="">Last Post</a></b> by <a href=""><?php echo $row["name"];?></a>

                <br>
                on <small><?php echo $row["created_at"];?></small>

            </div>
        </div>

        <?php endwhile ?>
     <?php endif ?>
     
    </div>



</div>

<footer>

    <span>
        <li class="logout"><a href="WelcomePage.html">Logout</a></li>
        &copy;  CovAvisor | All Rights Reserved
    </span>
</footer>

<script src="home.js"></script>

</body>

</html>