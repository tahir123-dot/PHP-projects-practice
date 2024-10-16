<?php
// Validate if the form is submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get form data and sanitize inputs
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
    $website = filter_var($_POST['website'], FILTER_SANITIZE_URL);
    $message = htmlspecialchars($_POST['message']);

    // Validate required fields
    if ($email && !empty($message)) {
        
        // Email details
        $to = "tahirrashid736333@gmail.com";  // Your email address
        $subject = "New Message from Contact Form";

        // Prepare email content
        $body = "You have received a new message from the contact form:\n\n";
        $body .= "Sender Details:\n";
        $body .= "-----------------\n";
        $body .= "Name: $name\n";
        $body .= "Email: $email\n";
        $body .= "Phone: $phone\n";
        $body .= "Website: $website\n";
        $body .= "-----------------\n\n";
        $body .= "Message:\n$message\n";

        // Additional headers
        $headers = "From: $email";

        // Send the email
        if (mail($to, $subject, $body, $headers)) {
            echo "Success! Your message has been sent.";
        } else {
            echo "Error! Failed to send your message.";
        }

    } else {
        echo "Error! Please fill in all required fields.";
    }

} else {
    echo "Error! Form submission failed.";
}
?>
