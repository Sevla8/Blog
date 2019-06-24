<?php 
session_start();
include('model.php');
$billets = get5Billets();
include('header.php');
?>

<h1>Liste des  billets</h1>
<p>Derniers billets du blog :</p>

<?php foreach ($billets as $billet) { ?>
<div class="news">
	<h3>
		<?= $billet['titre'] ?>
		<em>le <?= $billet['date_creation'] ?></em>
	</h3>
	<p>
		<?= nl2br($billet['contenu']) ?>
		<br/>
		<em><a href="commentaires.php?billet=<?= $billet['id'] ?>">Commentaires</a></em>
	</p>
</div>
<?php } ?>

<?php
include('footer.php');
?>
