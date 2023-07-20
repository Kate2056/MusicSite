<?php

    $date = date('Y');
    $errorMsg = "";
    $showForm = true;

    if(isset($_POST['submit'])){

        if($_POST['name'] == "" || $_POST['email'] == "" || $_POST['message'] == ""){
            $errorMsg = "Please fill out all fields";

        }else{
            if($_POST['phone'] != ""){
                $phone = $_POST['phone'];
            }else{
                $phone = "No phone number given";
            }
            
            $name = $_POST['name'];
            $email = $_POST['email'];
            $message = $_POST['message'];
            $fullDate = date_create();
            
            $fromEmail = "kaitlynbriggs@kaitlynbriggs.name";
            $headers = "MIME-Version: 1.0" . "\r\n"; 
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
            $headers .= "From: $fromEmail" . "\r\n";
    
            $emailContent = "Kaitlyn Briggs has recieved your message from the Contact page on her website. She should respond in the next few days. Thanks for reaching out!";
                
            $contactEmailMessage = "New Email Contact Form Entry: ";
            $contactEmailMessage .= "Contact Name: " . $name;
            $contactEmailMessage .= "Email Address: " . $email;
            $contactEmailMessage .= "Phone Number: " . $phone;
            $contactEmailMessage .= "Message: " . $message;
            $contactEmailMessage .= "Date of Response: " . date_format($fullDate, "m/d/Y");
    
            try{
                mail($email, "Your message was recieved!", $emailContent, $headers);
                mail("kaitlynbriggs99@gmail.com", "New Music Contact Form Response", $contactEmailMessage, $headers);
                $showForm = false;
            }catch (PDOException $e){
                $errorMsg = "Issues with progam, error message: " . $e->getMessage();;
            }
        }
            

        
    }
    if(!$showForm){

      
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
    <div id="confirmation">
        <span id="error"><?php echo $errorMsg; ?></span>
        <h3>Thanks for reaching out! Kaitlyn should respond within the next few days. </h3>
        <p>In the meantime, check out some of her <a href="tabs.php">tabs!</a></p>
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
    <sript src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>
</html>

<?php
    }else{
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
    <div id="contactInfo">
        <h3>Contact Me!</h3>
        <p><strong>Email: </strong>kaitlynbriggs99@gmail.com</p>
        <p><strong>Phone: </strong>515-729-9133</p>
    </div>
    <div id="mainDiv">
    <form action="contact.php" method="POST">
        <span id="error"><?php echo $errorMsg; ?></span>
        <p>
            <label for="name">Name: <em class="required">*</em></label>
            <input name="name" id="name" type="text">
        </p>
        <p>
            <label for="email">Email: <em class="required">*</em></label>
            <input name="email" id="email" type="email">
        </p>
        <p>
            <label for="phone">Phone: <em class="required" style="visibility:hidden;">*</em></label>
            <input name="phone" id="phone" type="text" value="">
        </p>
        <p>
            <label for="message" >Message: <em class="required">*</em></label>
            <textarea name="message" id="message"></textarea>
        </p>
        <div class="g-recaptcha" data-sitekey="6Lf8Ph4lAAAAAL1qOW5lA60VcKXfcHWyeKkCOj6_"></div>
        <p class="center">
            <input type="submit" name="submit" value="Submit" class="button">
            <input type="reset" value="Reset" class="button">
        </p>
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
    <sript src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>
</html>
<?php 
    }
?>