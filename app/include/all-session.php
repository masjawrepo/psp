<?php
    session_start();
    echo "<h3> PHP List All Session Variables</h3>";
	echo json_encode($_SESSION);
?>