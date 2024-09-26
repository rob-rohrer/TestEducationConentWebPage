<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate the input email
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Email subject and body with patient education links
        $subject = "Patient Education Resources";
        
        $message = "
        <html>
        <head>
        <title>Patient Education Resources</title>
        </head>
        <body>
        <h2>Health and Savings</h2>
        <h3>GoodRX</h3>
        <ul>
            <li><a href='https://support.goodrx.com/hc/en-us'>GoodRX Help Center</a></li>
            <li><a href='https://www.youtube.com/watch?v=9qkXs768JKY'>How to Use GoodRX (video)</a></li>
            <li><a href='https://www.valuepenguin.com/goodrx-insurance#What'>What is GoodRX?</a></li>
        </ul>
        
        <h3>Apple Health</h3>
        <ul>
            <li><a href='https://support.apple.com/en-us/104997'>Health App on iPhone and iPad</a></li>
            <li><a href='https://www.youtube.com/watch?v=RKve2P1bAMc'>iPhone Tips</a></li>
        </ul>

        <h3>Android Health</h3>
        <ul>
            <li><a href='https://support.google.com/android/topic/12203284?hl=en&ref_topic=7313245&sjid=9874266977391800367-NC'>Android Health Connect</a></li>
        </ul>

        <h2>Heart Health</h2>
        <h3>Kardia</h3>
        <ul>
            <li><a href='https://alivecor.zendesk.com/hc/en-us/articles/1500000111761-Setting-up-your-Kardia-account'>Setting up your Kardia Account</a></li>
            <li><a href='https://www.youtube.com/watch?v=eA9pv6TVr-c'>How to Record an EKG with KardiaMobileCard</a></li>
            <li><a href='https://www.youtube.com/watch?v=muCn3bXrr9Q'>Checking Your Heart with KardiaMobile</a></li>
        </ul>

        <h3>My Fitness Pal</h3>
        <ul>
            <li><a href='https://support.myfitnesspal.com/hc/en-us/categories/360001951372-Using-the-App'>MyFitnessPal - Using the App</a></li>
            <li><a href='https://www.youtube.com/watch?v=I9cdBAcuhXU&list=PLuSu4aLbmgPXUMEieOoeeBCwlkfbYJMQZ&index=1'>How to Log Food in MyFitnessPal</a></li>
            <li><a href='https://www.youtube.com/watch?v=CCoXyH-FiDU&list=PLuSu4aLbmgPXUMEieOoeeBCwlkfbYJMQZ&index=4'>Customize the MyFitnessPal Dashboard</a></li>
        </ul>

        <h2>Mindfulness</h2>
        <h3>Calm</h3>
        <ul>
            <li><a href='https://support.calm.com/hc/en-us/categories/360000654214-Using-the-Calm-App'>Using the Calm App</a></li>
            <li><a href='https://www.youtube.com/watch?v=fTQ9CRl_XPM'>Calm App (video)</a></li>
            <li><a href='https://www.healthline.com/health/mental-health/calm-app-reviews#1'>A 2024 Breakdown of the Calm App</a></li>
        </ul>

        <h3>Headspace</h3>
        <ul>
            <li><a href='https://help.headspace.com/hc/en-us/categories/19497864665243-Getting-Started'>Headspace Getting Started</a></li>
            <li><a href='https://www.youtube.com/channel/UC3JhfsgFPLSLNEROQCdj-GQ'>Headspace (video)</a></li>
            <li><a href='https://www.choosingtherapy.com/headspace-review/'>Headspace App Review 2024</a></li>
        </ul>
        </body>
        </html>
        ";
        
        // To send HTML mail, the Content-type header must be set
        $headers  = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // Additional headers
        $headers .= 'From: no-reply@yourwebsite.com' . "\r\n";

        // Send email
        if (mail($email, $subject, $message, $headers)) {
            echo "Email successfully sent to $email.";
        } else {
            echo "Failed to send email.";
        }
    } else {
        echo "Invalid email format.";
    }
} else {
    echo "Invalid request.";
}
?>
