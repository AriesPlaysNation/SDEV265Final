<!-- Author: Brad Botteron
Date: 5/4/2020
Desc: Quote Application Home Page -->
<?php
$metaDescription = "Accepting or Denying the quote and sending out notifications.";
$title = "Thank you for Accepting our quote!";
$pageID = "notification";
$accept = $_POST['acceptdeny'];
$thisScript = htmlspecialchars($_SERVER['PHP_SELF']);
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
if($accept == 0){
    echo <<<heredoc

<h3>Restart Your Quote <a href="index.php">Here</a>! </h3>
House size is $sizeText sq feet.<br/>
Number of floors: $floors.<br/>
Number of rooms: $rooms.<br/>
Total Quote: $$total.<br/><br/>
heredoc;
    if(!isset($_POST['submit'])){
        echo "\n";
        echo <<<herdoc
<form action="$thisScript" method="post">
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
<input type="hidden" name="acceptdeny" value="$accept"/>

<input type="reset" name="Clear" value="Clear"/>
<input type="submit" name="Submit" value="Submit"/>
</fieldset>
</form>
herdoc;
    }
    else{
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['1phone'] . "-" . $_POST['2phone'] . "-" . $_POST['3phone'];
        $total = $_POST['total'];
        echo <<<heredoc

<h2>An email has been sent to $email. Thank you for accepting the quote of $$total $name</h2>
heredoc;

    }
} else{
    echo "Thank you for taking the time to get a quote
    with us.<br/>To redo your quote click <a href='index.php'>here!</a>\n";
}
echo "<br/>";
echo "</article>";
require ("htmlFoot.inc");
// mysqli_close($connection);
?>