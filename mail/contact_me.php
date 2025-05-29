<?php
// Check for empty fields and validate email
if (
    empty($_POST['name']) ||
    empty($_POST['email']) ||
    empty($_POST['phone']) ||
    empty($_POST['message']) ||
    empty($_POST['service']) ||
    !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)
) {
    echo "No arguments Provided or invalid email!";
    return false;
}

// Sanitize input data
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$service = strip_tags(htmlspecialchars($_POST['service']));
$message = strip_tags(htmlspecialchars($_POST['message']));

// Prepare the email
$to = 'scarzellalauren@gmail.com'; // Replace with your own email address
$email_subject = "Website Contact Form: $name";
$email_body = "You have received a new message from your website contact form.\n\n"
            . "Here are the details:\n"
            . "Name: $name\n"
            . "Email: $email_address\n"
            . "Phone: $phone\n"
            . "Service: $service\n"
            . "Message:\n$message";

$headers = "From: scarzellalauren@gmail.com\n"; // Replace with a real domain email
$headers .= "Reply-To: $email_address";

// Send the email
if (mail($to, $email_subject, $email_body, $headers)) {
    echo "Message sent successfully.";
    return true;
} else {
    echo "Message could not be sent.";
    return false;
}
?>
