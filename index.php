<!-- Author: Brad Botteron
Date: 5/4/2020
Desc: Quote Application Home Page -->
<?php
$metaDescription = "Painter Quote Application Home Page";
$title = "Quote Calculator";
$pageID = "home";

require ("htmlHead.inc");

echo <<<heredoc
<article>
<h1>$title</h1>
<ul>
<li>Start your quote!</li>
</ul>
<form action="floorInfo.php" method="post">
<fieldset>
<legend>What size house do you have?</legend>
<input class="inputs" type="radio" value="0" name="size" checked="checked"/>Less than 1200<br/>
<input class="inputs" type="radio" value="1" name="size"/>1200 - 1800<br/>
<input class="inputs" type="radio" value="2" name="size"/>1801 - 2600<br/>
<input class="inputs" type="radio" value="3" name="size"/>2600 - 3200<br/>
<input class="inputs" type="radio" value="4" name="size"/>More than 3200
</fieldset>
<fieldset>
<legend>How many Floors do you need painted?</legend>
<select id="floorSelect" name="floors">
<option value="1">1 Floor</option>
<option value="2">2 Floors</option>
<option value="3">3 Floors</option>
<option value="4">4 Floors</option>
<option value="5">5+ Floors</option>
</select>
</fieldset>
<fieldset>
<legend>How many Rooms do you need painted?</legend>
<select id="roomSelect" name="rooms">
<option value="1">1 Room</option>
<option value="2">2 Room</option>
<option value="3">3 Room</option>
<option value="4">4 Room</option>
<option value="5">5 Room</option>
<option value="6">6 Room</option>
<option value="7">7 Room</option>
<option value="8">8+ Room</option>
</select>
</fieldset>
<input type="reset" name="Clear" value="Clear"/>
<input type="submit" name="Submit" value="Next -> Entering Color"/>
</form>
</article>

heredoc;


require ("htmlFoot.inc");
// mysqli_close($connection);
?>
