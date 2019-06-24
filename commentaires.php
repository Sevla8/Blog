<?php 
session_start();
include('model.php');

$x = intval(htmlspecialchars($_GET['billet']));
if (!existsBillet($x))
	header('Location: index.php');
$billet = getBillet($x);
$commentaires = getCommentaires($x);

$_SESSION['id_billet'] = $x;

include('header.php');
?>

<h1>Liste des commentaires</h1>
<p><a href="index.php">Retour à la liste des billets</a></p>

<h2>Billet :</h2>
<div class="news">
	<h3>
		<?= $billet['titre'] ?>
		<em>le <?= $billet['date_creation'] ?></em>
	</h3>
	<p>
		<?= nl2br($billet['contenu']) ?>
	</p>
</div>

<h2>Commentaires :</h2>
<?php foreach ($commentaires as $commentaire) { ?>
<p><strong><?= $commentaire['auteur'] ?></strong> le <?= $commentaire['date_commentaire'] ?></p>
<p><?= nl2br($commentaire['commentaire']) ?></p>
<?php } ?>

<h2>Poster un commentaire :</h2>

<?php 
include('form.php');
include('footer.php');
?>
