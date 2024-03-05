<?php

require_once("sendgridkey.php");
// Set up SendGrid API endpoint and API key
$url = 'https://api.sendgrid.com/v3/mail/send';
$apiKey = returnSendGridApiKey();


// Connect to database
require_once("db_connection.php");
$conn = getDBConnection();

// Get Current Date and Time in PST
$current_time = new DateTime('now', new DateTimeZone('America/Los_Angeles'));
$current_date = $current_time->format('Y-m-d');
$current_time = $current_time->format('H:i');
$current_time = $current_time . ":00";

echo "Current Date: " . $current_date . "Current Time: " . $current_time;

// Query to retrieve email information and associated times
$query = "SELECT * FROM email_info";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    // Loop through each row
    while ($row = $result->fetch_assoc()) {
        $email = $row['receipient_email'];
        $send_time = $row['send_time']; // send_time in database
        $send_date = $row['send_date'];
        $email_contents = $row['email_contents'];
        $subject_line = $row['subject_line'];


        // Compare send_date and send_time with current date and time (PST)
        if ($send_date == $current_date && $send_time == $current_time) {
            // Set up the email data
            $data = [
                'personalizations' => [
                    [
                        'to' => [['email' => $email, 'name' => 'Recipient']], // Use $email variable from the database
                        'subject' => $subject_line // Use $subject_line variable from the database
                    ]
                ],
                'from' => ['email' => 'douglasc@douglascerrato2.digital', 'name' => 'SendLater'],
                'content' => [
                    [
                        'type' => 'text/plain',
                        'value' => $email_contents // Use $email_contents variable from the database
                    ]
                ]
            ];

            // Set up cURL request
            $curl = curl_init();
            curl_setopt_array($curl, [
                CURLOPT_URL => $url,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => json_encode($data),
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPHEADER => [
                    'Content-Type: application/json',
                    "Authorization: Bearer $apiKey"
                ]
            ]);

            // Execute the cURL request
            $response = curl_exec($curl);

            // Check for errors
            if ($response === false) {
                echo "Error sending email: " . curl_error($curl);
            } else {
                echo "Email sent successfully to $email!";
            }

            // Close cURL resource
            curl_close($curl);
        }
    }
}

// Close the database connection
$conn->close();
?>