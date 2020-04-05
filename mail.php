<?php
if(empty($_POST)){ 
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

    $headers = [
        'From' => 'danamarin.com',
        'Reply-To' =>$name.'<'.$email.'>'
    ];

    if(mail($recipient, 'New message!', $message, $headers)){
            header("Location: http://danamarin.com/message_sent.html");
        }else {
            header("Location: http://danamarin.com/error.html");
        }
?>