<?php
$year = date("Y");
echo <<<heredoc
<footer>
|| &copy; 2020-$year Painting Quote Calculator ||
</footer>
</div><!--wrapper-->
heredoc;
if($pageID == "notification"){
    echo "<script src=\"script.js\"></script>";
}
echo <<<heredoc
</body>
</html>
heredoc;
?>