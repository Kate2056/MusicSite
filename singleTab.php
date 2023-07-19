<?php 
   require 'dbConnect.php';     

   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   $sql = "SELECT id, songName, artist, genre, difficulty, composer, instrument, fileName FROM tabs WHERE id = :id";  

   $stmt = $conn->prepare($sql); 

   $id = $_GET['iD'];

   $stmt->bindParam(':id', $id);

   $stmt->execute();

   $stmt->setFetchMode(PDO::FETCH_ASSOC);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="music, bluegrass, tabs, mandolin, tablature, kaitlyn, briggs, teacher, music, notation, guitar,
    surf, lessons, student, lesson, beginner, intermediate, advanced, professional" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheets/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="icon" type="image/x-icon" href="images/mandolinsIcon.png">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lugrasimo&family=Noto+Serif:wght@300;400;700&display=swap" rel="stylesheet">
    <title>Home</title>
</head>
<body>
    <div id="header">
        <h1 id="nameHeader">Kaitlyn Briggs</h1>
        <nav>
            
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="tabs.php">Tabs</a></li>
            </ul>
        </nav>
        <div id="headerSocialIcons">
            <a href="https://www.facebook.com/BriggsFamilyBand"><img src="images/facebook.png" alt="facebook"></a>
            <a href="https://www.instagram.com/kaitlyn.briggs.26/"><img src="images/instagram.png" alt="instagram"></a>
            <a href="https://www.youtube.com/channel/UCuKmHoCUaswvfWT5S1H1q0w"><img src="images/youtube.png" alt="youtube"></a>
        </div>
    </div>
   <?php

    if($stmt->rowCount() == 0){
        echo "<p>Oops! This tab isn't available right now.</p>";
    }else{
        echo "<table>";
    while($row = $stmt->fetch() ){
        
        echo "<h1 id='tabTitle'>" . $row['songName'] . "</h1><div id='tabInfo'>";
        echo "<p><strong>Artist: </strong>" . $row['artist'] . "</p>";
        echo "<p><strong>Genre: </strong>" . $row['genre'] . "</p>";
        echo "<p><strong>Difficulty: </strong>" . $row['difficulty'] . "</p>";
        echo "<p><strong>Composer: </strong>" . $row['composer'] . "</p>";
        echo "<p><strong>Instrument: </strong>" . $row['instrument'] . "</p></div>";
        echo "<iframe id='pdfFile' src=\"tabFiles/" . $row['fileName']. "\" width=\"80%\" style=\"height:1000px\"></iframe>";
    }
    echo "</table>";
    }
?>
    

    <footer>
        <div id="footerSocialIcons">
            <a href="https://www.facebook.com/BriggsFamilyBand"><img src="images/facebook.png" alt="facebook"></a>
            <a href="https://www.instagram.com/kaitlyn.briggs.26/"><img src="images/instagram.png" alt="instagram"></a>
            <a href="https://www.youtube.com/channel/UCuKmHoCUaswvfWT5S1H1q0w"><img src="images/youtube.png" alt="youtube"></a>
        </div>
        <div id="copyright">
            <p>Copyright © 2023</p>
            <p>Website Designed and Built by Kaitlyn Briggs</p>
        </div>
    </footer>
</body>
</html>