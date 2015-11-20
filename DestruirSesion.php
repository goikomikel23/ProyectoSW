<?php
session_start();

session_destroy();

header('location:layout.html');


//unset($_SESSION['nombre']); para eliminar la variable de sesion
?>