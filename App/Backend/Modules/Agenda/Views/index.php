
 
<table class="table">
  <tr><th>Date</th><th>Evenement</th><th>Adresse</th><th>Ville</th><th>Contact</th><th>Commentaire</th></tr>
<?php
foreach ($listeAgenda as $agenda)
{
  echo 	'<tr><td>', $agenda['dateEvent']
	//->format('d/m/Y')
	,
				'</td><td>', $agenda['nom'],
				'</td><td>', $agenda['ville'],
				'</td><td>', $agenda['adresse'],
				'</td><td>', $agenda['contact'],
				'</td><td>', $agenda['commentaire'],
				'</td><td>
					<a href="agenda-update-', $agenda['id'], '.html"><img src="/images/update.png" alt="Modifier" /></a>
					<a href="agenda-delete-', $agenda['id'], '.html"><img src="/images/delete.png" alt="Supprimer" /></a></td></tr>', "\n";
}
?>
</table>

