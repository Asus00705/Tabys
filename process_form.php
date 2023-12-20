<?php
$telegramBotToken = '6868336670:AAEc7e1oZlmBE_hmo-57WAEc2wWxbaQjxj4';
$chatId = '-4007661050';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['cname'];
    $phone = $_POST['cphone'];
    $message = $_POST['cmessage'];

    // Compose the message
    $telegramMessage = "New Contact Form Submission\n";
    $telegramMessage .= "Name: $name\n";
    $telegramMessage .= "Phone: $phone\n";
    $telegramMessage .= "Message: $message";

    // Send the message to Telegram using cURL
    $url = "https://api.telegram.org/bot$telegramBotToken/sendMessage";
    $params = [
        'chat_id' => $chatId,
        'text' => $telegramMessage,
    ];

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);

    // Check for errors
    if (!$result) {
        error_log("Telegram API request failed: " . curl_error($ch));
    }
}
