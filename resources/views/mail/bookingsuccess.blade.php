<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Success</title>
</head>
<body>
    <h3>Thank you for your booking!</h3>
    <p>Your booking has been successfully completed. Below are the details:</p>

    <ul>
        <li><strong>Order ID:</strong> {{ $booking->order_id_momo }}</li>
        <!-- Include other booking details as needed -->
    </ul>

    <p>We look forward to providing you with a fantastic experience!</p>
</body>
</html>
