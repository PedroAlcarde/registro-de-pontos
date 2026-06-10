<?php 

session_start();
unset($_SESSION["nome"]);
unset($_SESSION["tipo_usuario"]);
session_destroy();
header("Location: index.php");
exit;
?>