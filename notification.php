<!-- Author: Brad Botteron
Date: 5/4/2020
Desc: Quote Application Home Page -->
<?php
$metaDescription = "Accepting or Denying the quote and sending out notifications.";
$title = "Your Notification Has Been Sent!";
$pageID = "notification2";
//require ("connecti2db.inc.php"); // sets $connection
//require ("metaQueries.inc"); // DB for meta desc

require ("htmlHead.inc");
require("functions.inc");
$size = $_POST['size'];
$floors = $_POST['floors'];
$rooms = $_POST['rooms'];
$total = $_POST['total'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$sizeText = getSizeText($size);
$filename = "quotes/Quotes2020.csv";

sendNotification($email, $total, $fname, $lname, $phone);
saveQuote($sizeText, $floors, $rooms, $total, $fname, $lname, $phone, $email);
$filehandle = fopen($filename, "a")
    or die("<b>Cannot open file $filename for appending.");

$filecontents = "Name, Email, Phone, Size, Floors, Rooms, Total\n";
if(!file_exists($filename)){
    fputs($filehandle, $filecontents);
    fclose($filehandle);
    chmod("$filename", 0664);
}
if(file_exists($filename)){
    $filecontents = "$fname $lname, $email, \"$phone\", $sizeText, $floors, $rooms, $$total\n";
    fputs($filehandle, $filecontents);
    fclose($filehandle);
    chmod("$filename", 0664);
}


echo "<article>\n";
echo "\t<h1>$title</h1>\n";

echo "An email has been sent to <code>$email</code>. Thank you for accepting the quote
of $$total <code>$fname $lname</code>.\n<br/>";

echo "\t<fieldset>\n";
echo "\t\t<legend>Details of your quote:</legend>\n";
echo "\t\tHouse size is $sizeText.\n";
echo "\t\tNumber of floors: $floors\n";
echo "\t\tNumber of rooms: $rooms\n";
echo "\t\tQuote Total: $$total\n";
echo "\t</fieldset>\n";
echo "<h2>Try a <a href='index.php'>new quote!</a></h2>\n";

if(!file_exists($filename)){
    echo "<h2>Oops!</h2>\n";
    echo "<p>Something went wrong. The CSV file was not created.</p>\n";
} else{
    echo "<p>Right-Click this link to <a href=\"$filename\"";
    echo "title=\"Right-Click and SAVE AS...\">Download CSV</a> file.</p>\n";
}

echo "<br/>";
echo "</article>\n";
require ("htmlFoot.inc");
// mysqli_close($connection);
?>