<?php
$telegramBotToken = '6868336670:AAEc7e1oZlmBE_hmo-57WAEc2wWxbaQjxj4';
$chatId = '6868336670';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['cname'];
    $phone = $_POST['cemail'];
    $message = $_POST['cmessage'];

    // Compose the message
    $telegramMessage = "New Contact Form Submission\n";
    $telegramMessage .= "Name: $name\n";
    $telegramMessage .= "Phone: $phone\n";
    $telegramMessage .= "Message: $message";

    // Send the message to Telegram
    file_get_contents("https://api.telegram.org/bot$telegramBotToken/sendMessage?chat_id=$chatId&text=" . urlencode($telegramMessage));
}
