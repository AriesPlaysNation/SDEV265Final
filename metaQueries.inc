<?php
$query = "select description
from metaDescription
where pageID = '$pageID'";

$result = mysqli_query($connection, $query)
    or
die("<b>Query Failed</b><br/>" . mysqli_error($connection));

$row = mysqli_fetch_row($result);
$metaDescription = $row[0];
?>