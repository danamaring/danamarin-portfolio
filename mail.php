<?php
if(empty($_POST)){ 
    echo 'No...';
    exit;
}
    $name = '';
    $email = '';
    $message = '';
    $recipient = 'dana.magarc@gmail.com';
    $headers = 'new message!';

    //Some validation
    if(isset($_POST['name'])){
        $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    }

    if(isset($_POST['email'])){
        $email = str_replace(array("\r", "\n", "%0a", "%0d"),'',$_POST['email']);
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    if(isset($_POST['message'])){
        $message = $_POST['message'];
    }

    // $headers = [
    //     'From' => 'noreply@test.ca',
    //     'Reply-To' =>$name.'<'.$email.'>'
    // ];

    if(mail($recipient, $message, $headers)){
        echo '<p>Thank you for contacting me, '.$name.'. You will get a reply within 24 hours</p>';
    }else{
        echo '<p>We are sorry but the contact form is temporarily disabled. Please send a direct email to dana.macarg@gmail.com or try again later. Thanks!</p>';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">

    <!-- CSS links -->
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/main.css">

    <!-- Fonts links -->
    <link rel="stylesheet" href="https://use.typekit.net/fdq3zps.css">
    <title>Dana Marin Portfolio</title>
</head>
<body>
    <button id="form-error">
        <a href="index.html">
            back to home
        </a>
    </button>
</body>
</html>