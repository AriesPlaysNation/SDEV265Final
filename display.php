<!-- Author: Brad Botteron
Date: 5/4/2020
Desc: Quote Application Home Page -->
<?php
$metaDescription = "Accepting or Denying the quote and sending out notifications.";
$title = "Thank you for Accepting our quote!";
$pageID = "notification";
$accept = $_POST['acceptdeny'];
//require ("connecti2db.inc.php"); // sets $connection
//require ("metaQueries.inc"); // DB for meta desc

require ("htmlHead.inc");
require("functions.inc");

$size = $_POST['size'];
$floors = $_POST['floors'];
$rooms = $_POST['rooms'];
$total = $_POST['total'];
$sizeText = getSizeText($size);

if($accept == 0){
    $title = "Thank you for accepting our quote!";
} else { $title = "Thank you for trying out our quote calculator!";} // if else for if they accept or deny quote

echo "<article>\n";
echo "\t<h1>$title</h1>\n";
// This is where the form should start for accept/deny
if($accept == 1){
    echo "<h2>Thank you for trying out our quote calculator!</h2>\n";
    echo "<h2>To try for a new quote click <a href='index.php'>here!</a></h2>\n";
} else { // end if $accept = no
    echo "\t<fieldset>\n";
    echo "\t\t<legend>Details of your quote:</legend>\n";
    echo "\t\tHouse size is $sizeText.<br/>";
    echo "\t\tNumber of floors: $floors<br/>";
    echo "\t\tNumber of rooms: $rooms<br/>";
    echo "\t\tQuote Total: $$total<br/>";
    echo "\t</fieldset>\n";
    echo <<<herdoc
<form action="notification.php" method="post">
<fieldset>
<legend>Fill in your information to be emailed a copy of your quote.</legend>
<label>Name</label>
<input type="text" name="name" placeholder="Enter your full name"/><br/>
<label>Email</label>
<input type="email" name="email" placeholder="Enter your email"/><br/>
<label>Phone</label>
<input class="phone" type="number" name="1phone" minlength="3" maxlength="3"/>
<input class="phone" type="number" name="2phone" minlength="3" maxlength="3"/>
<input class="phone" type="number" name="3phone" minlength="4" maxlength="4"/><br/>
<input type="hidden" name="size" value="$size"/>
<input type="hidden" name="floors" value="$floors"/>
<input type="hidden" name="rooms" value="$rooms"/>
<input type="hidden" name="total" value="$total"/>

<input type="reset" name="Clear" value="Clear"/>
<input type="submit" name="Submit" value="Submit"/>
</fieldset>
</form>
herdoc;
} // end if else $accept == 1,0

echo "<br/>";
echo "</article>";
require ("htmlFoot.inc");
// mysqli_close($connection);
?>