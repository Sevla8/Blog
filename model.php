<?php
global $db;

try {
	$db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
}
catch(Exception $exception) {
	die('Erreur : '.$exception->getMessage());
}

function getBillet($id) {
	global $db;
	$query = $db->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, "%d/%m/%Y à %Hh%imin%ss") AS date_creation FROM billets WHERE id = ?');
	$query->execute(array($id));
	$fetch = $query->fetch();
	return $fetch;
}

function setBillet($titre, $contenu, $date_creation) {
	global $db;
	$query = $db->prepare('INSERT INTO billets(titre, contenu, date_creation) VALUES (?, ?, ?, ?)');
	$query->execute(array($titre, $contenu, $date_creation));
}

function get5Billets() {
	global $db;
	$query = $db->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, "%d/%m/%Y à %Hh%imin%ss") AS date_creation FROM billets ORDER BY date_creation LIMIT 0, 5');
	$query->execute();
	$fetch = $query->fetchAll();
	return $fetch;
}

function existsBillet($id) {
	global $db;
	$query = $db->prepare('SELECT * FROM billets WHERE id = ?');
	$query->execute(array($id));
	$count = $query->rowCount();
	return $count;
}

function getCommentaires($id_billet) {
	global $db;
	$query = $db->prepare('SELECT id, id_billet, auteur, commentaire, DATE_FORMAT(date_commentaire, "%d/%m/%Y à %Hh%imin%ss") AS date_commentaire FROM commentaires WHERE id_billet = ?');
	$query->execute(array($id_billet));
	$fetch = $query->fetchAll();
	return $fetch;
}

function setCommentaire($id_billet, $auteur, $commentaire) {
	global $db;
	$query = $db->prepare('INSERT INTO commentaires(id_billet, auteur, commentaire, date_commentaire) VALUES (?, ?, ?, NOW())');
	$query->execute(array($id_billet, $auteur, $commentaire));
	echo "string";
}
