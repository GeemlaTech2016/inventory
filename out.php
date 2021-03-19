<?php
session_start();

session_unset($_SESSION["uid"]);
session_unset($_SESSION["is_loged"]);
session_unset($_SESSION["password"]);

session_destroy();
header("Location:index.php");
?>