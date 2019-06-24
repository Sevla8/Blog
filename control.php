<?php
session_start();
include('model.php');

if (!isset($_POST['auteur']) || !isset($_POST['commentaire']) || !isset($_POST['submit']))
	header('Location: commentaires.php?billet='.$_SESSION['id_billet']);

$auteur = htmlspecialchars($_POST['auteur']);
$commentaire = htmlspecialchars($_POST['commentaire']);

setCommentaire($_SESSION['id_billet'], $auteur, $commentaire);

header('Location: commentaires.php?billet='.$_SESSION['id_billet']);
?>
