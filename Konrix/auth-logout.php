<?php
include('services/session.php');
logout();
header("Location: index.php");
exit();
