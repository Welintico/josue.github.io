<?php
session_start();
session_destroy();
header('Location: ../roles.html');
exit();
?>