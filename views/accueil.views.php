<?php
unset($_SESSION['alert']);
ob_start(); 
$content = ob_get_clean();
require "layout.php";

