<?php

require 'database.php';
$idLineaCarrito = $_POST["idLineaCarrito"];
$eliminar = "DELETE FROM `LineaCarrito` WHERE `LineaCarrito`.`idLineaCarrito` = $idLineaCarrito";
$result = $conn->query($eliminar);
?>