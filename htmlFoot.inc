<?php
$year = date("Y");
echo <<<heredoc
<footer>
|| &copy; 2020-$year Painting Quote Calculator ||
</footer>
</div><!--wrapper-->
<script src="scripts/script.js"></script>
</body>
</html>
heredoc;
?>