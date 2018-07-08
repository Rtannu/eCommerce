<?php
echo "raj";
session_start();
session_destroy();
echo "<script>window.open('admin_login.php?logout=you have logout!!','_self')</script>";
?>
