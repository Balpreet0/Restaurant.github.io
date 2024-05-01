<?php
// Get form data (you can use $_POST or $_GET depending on your form method)
$name = $_POST['name'];
$date = $_POST['date'];
$time = $_POST['time'];
$guests = $_POST['guests'];

 // Create a new user element
 $table = new SimpleXMLElement('<booking/>');
 $table->addChild('name', $name);
 $table->addChild('date', $date);
 $table->addChild('time', $time);
 $table->addChild('guests', $guests);


 // Load existing XML file or create a new one
 $xml = simplexml_load_file('bookings.xml');
 $xml->addChild('booking', $table);

 // Save changes back to the XML file
 $xml->asXML('bookings.xml');

echo 'Booking saved successfully!';

// You can also provide a link to the saved XML file for users to download
echo '<br><a href="' . $xmlFilePath . '">Download Booking XML</a>';
?>