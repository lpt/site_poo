<div class="well">
<h4>
Créé par <em><?= $news['auteur'] ?></em>, le <?= $news['dateAjout']->format('d/m/Y à H\hi') ?> - 
<strong><?= $news['titre'] ?></strong>
</h4>
<p><?= nl2br($news['contenu']) ?></p>
 
<?php if ($news['dateAjout'] != $news['dateModif']) { ?>
  <p style="text-align: right;"><small><em>Modifiée le <?= $news['dateModif']->format('d/m/Y à H\hi') ?></em></small></p>
  </div>
<?php } ?>
 
<p><a href="commenter-<?= $news['id'] ?>.html">Ajouter un commentaire</a></p>
 
<?php
if (empty($comments))
{
?>
<p>Aucun commentaire n'a encore été posté. Soyez le premier à en laisser un !</p>
<?php
}
 
foreach ($comments as $comment)
{
?>
<div class="well well-sm">
  <h4>
    Posté par <em><?= htmlspecialchars($comment['auteur']) ?></em> le <?= $comment['date']->format('d/m/Y à H\hi') ?>
    <?php if ($user->isAuthenticated()) { ?> -
      <a href="admin/comment-update-<?= $comment['id'] ?>.html">Modifier</a> |
      <a href="admin/comment-delete-<?= $comment['id'] ?>.html">Supprimer</a>
    <?php } ?>
  </h4>
  <p><?= nl2br(htmlspecialchars($comment['contenu'])) ?></p>
</div>
<?php
}
?>
 
<p><a href="commenter-<?= $news['id'] ?>.html">Ajouter un commentaire</a></p>
