<?php 
    require "dbConnect.php";

    $search = false;

    $errorMessage = "";
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

if(isset($_GET['submit'])){
    $userSearchInput = '%' . $_GET['userSearch'] . '%';

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    try{
        $sql = "SELECT * from tabs WHERE songName like :userInput OR artist like :userInput OR genre like :userInput OR difficulty like :userInput 
        OR composer like :userInput  OR instrument like :userInput ";
        
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':userInput', $userSearchInput);
       
    
        $stmt->execute();
    
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
        $errorMessage =  "\n Issues with SQL, error message: " . $e->getMessage();
    }
    if($stmt->rowCount() == 0){
        $errorMessage = "Uh oh! No tabs found.";
    }
    }else{
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
            $sql = "SELECT * from tabs";
            
            $stmt = $conn->prepare($sql);
        
            $stmt->execute();
        
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
        }
        catch(Exception $e){
            $errorMessage = "\n Issues with SQL, error message: " . $e->getMessage();
        }
    }

?> <div id="mainDiv">
    <form method='GET' action="tabs.php">
    <div id="searchDiv">
                    <input type="text" name="userSearch" placeholder="Search Available Tabs" id="searchBar">
                    <input type="submit" value="Search" name="submit" id="searchButton">
                </div>
    <span id="error"><?php echo $errorMessage;?></span>
    <table id="table">
        <tr>
            <th>Song Name</th><th>Artist</th><th class='hiddenTab'>Genre</th><th>Difficulty</th><th class='hiddenTab'>Composer</th><th class='hiddenTab'>Instrument</th>
        </tr>
        <?php
            while($row = $stmt->fetch()){
                echo "<tr><td><a href='singleTab.php?iD=" . $row['id'] ."'>" . $row['songName'] . "</a></td><td>" . $row['artist'] . "</td><td class='hiddenTab'>" . $row['genre'] . 
                "</td><td>" . $row['difficulty'] . "</td><td class='hiddenTab'>" . $row['composer'] . "</td><td class='hiddenTab'>" . $row['instrument'] . "</td></tr>";

            }
        ?>
    </table>
    
    </form>
    </div>
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