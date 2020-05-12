<?php
/* Author: Brad Botteron
Date: 5/12/2020
Desc: Calculates quote and gives the user feedback
to approve or deny*/
$title = "Quote Received";
$metaDescription = "Receiving your final quote. Here you will choose to accept or deny your quote with a notification sent.";
$pageID = "approvedeny";
$rooms = $_POST['rooms'];
$floors = $_POST['floors'];
$size = $_POST['size'];
$roomsArray = array();
if(isset($_POST['room1'])){ $room1 = $_POST['room1'];array_push($roomsArray, $room1);}
if(isset($_POST['room2'])){ $room2 = $_POST['room2'];array_push($roomsArray, $room2);}
if(isset($_POST['room3'])){ $room3 = $_POST['room3'];array_push($roomsArray, $room3);}
if(isset($_POST['room4'])){ $room4 = $_POST['room4'];array_push($roomsArray, $room4);}
if(isset($_POST['room5'])){ $room5 = $_POST['room5'];array_push($roomsArray, $room5);}
if(isset($_POST['room6'])){ $room6 = $_POST['room6'];array_push($roomsArray, $room6);}
if(isset($_POST['room7'])){ $room7 = $_POST['room7'];array_push($roomsArray, $room7);}
if(isset($_POST['room8'])){ $room8 = $_POST['room8'];array_push($roomsArray, $room8);}

require("functions.inc");
$sizeText = getSizeText($size);
require ("htmlHead.inc");
echo <<<heredoc
<article>
<h1>$title</h1>
<h3>Made a mistake? <a href="index.html.php">Go Home</a></h3>

House size is $sizeText sq feet.<br/>
Number of floors: $floors.<br/>
Number of rooms: $rooms.<br/>
heredoc;
for($i = 1; $i <= count($roomsArray); $i++){
    echo "Room $i sheen: " . getSheenText($roomsArray[$i - 1]) . ".\n<br/>";
}
$total = calculateQuote($size, $rooms, $floors, $roomsArray);
echo "Total Quote: $" . $total;
echo <<<heredoc
<form action="display.php" method="post">
<fieldset>
<legend>Accept or Deny The Calculated Quote</legend>
<input type="hidden" name="size" value="$size"/>
<input type="hidden" name="floors" value="$floors"/>
<input type="hidden" name="rooms" value="$rooms"/>
<input type="hidden" name="total" value="$total"/>

<input type="radio" name="acceptdeny" id="accept" value="0" checked="checked"/>
<label for="accept">Accept</label>
<input type="radio" name="acceptdeny" id="deny" value="1"/>
<label for="deny">Deny</label><br/>
<input type="submit" name="Submit" value="Submit"/>
</fieldset>
</form>
heredoc;

echo "\n\t</article>\n";
require ("htmlFoot.inc");
// mysqli_close($connection);
?>