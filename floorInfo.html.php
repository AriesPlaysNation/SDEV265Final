<!-- Author: Brad Botteron
Date: 5/4/2020
Desc: Quote Application Home Page -->
<?php
require("functions.inc");
$metaDescription = "Painter Quote Application Home Page";
$title = "Enter your color of choice and sheen";
$pageID = "colorpicker";
$size = $_POST['size'];
$floors = $_POST['floors'];
$rooms = $_POST['rooms'];
$sizeText = "";
$sizeText = getSizeText($size);

require ("htmlHead.inc");

echo <<<heredoc
<article>
<h1>$title</h1>
<h3>Made a mistake? <a href="index.html.php">Go Back</a> </h3>

House size is $sizeText sq feet.<br/>
Number of floors: $floors.<br/>
Number of rooms: $rooms.<br/>
<form action="calculate.php" method="post">
heredoc;
echo "<br/>";
echo "\t<fieldset>\n";
echo "\t\t<legend>Sheen/Color Selection</legend>\n";
for($i = 1; $i <= $rooms; $i++){
        echo "\t\t<label>Select your sheen for room $i:</label>\n";
        echo "\t\t\t<select id=\"floorSelect\" name=\"room$i\">\n";
        echo "\t\t\t\t<option value=\"1\">Flat</option>\n";
        echo "\t\t\t\t<option value=\"2\">Matte</option>\n";
        echo "\t\t\t\t<option value=\"3\">Semi-Gloss</option>\n";
        echo "\t\t\t\t<option value=\"4\">Satin</option>\n";
        echo "\t\t\t</select>\n<br/>";
}
echo "\t</fieldset>\n";
echo <<<heredoc
<input type="hidden" name="size" value="$size"/>
<input type="hidden" name="floors" value="$floors"/>
<input type="hidden" name="rooms" value="$rooms"/>
<input type="reset" name="Clear" value="Reset"/>
<input type="submit" name="Submit" value="Next -> Quote Approval"/>
</form>
</article>

heredoc;


require ("htmlFoot.inc");
// mysqli_close($connection);
?>
