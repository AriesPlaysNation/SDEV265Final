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
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['1phone'] . "-" . $_POST['2phone'] . "-" . $_POST['3phone'];
$sizeText = getSizeText($size);

sendNotification($email, $total, $name, $phone);

echo "<article>\n";
echo "\t<h1>$title</h1>\n";

echo "An email has been sent to <code>$email</code>. Thank you for accepting the quote
of $$total <code>$name</code>.\n<br/>";

echo "\t<fieldset>\n";
echo "\t\t<legend>Details of your quote:</legend>\n";
echo "\t\tHouse size is $sizeText.\n";
echo "\t\tNumber of floors: $floors\n";
echo "\t\tNumber of rooms: $rooms\n";
echo "\t\tQuote Total: $$total\n";
echo "\t</fieldset>\n";
echo "<h2>Try a <a href='index.php'>new quote!</a></h2>\n";

echo "<br/>";
echo "</article>\n";
require ("htmlFoot.inc");
// mysqli_close($connection);
?>