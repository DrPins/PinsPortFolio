<?php require 'header.php' ;?>
<br><br><br><br><br>
<div class="box_admin">

<table id="table_inscrits"><tr>
				<th>id</th>
				<th>Prenom</th>
				<th>Nom</th>
				<th>Email</th>
				
				
				
				</tr>
<?php $client = $DB->query('SELECT * FROM Client ORDER BY valider DESC'); 

foreach ($client as $inscrits)
{
	$valid='non validé';
	if ($inscrits->valider == 1){
		$valid='validé';
	}

	if ($inscrits->id != 108){
echo '

				<tr>
				<td class="tbl_inscrits">'.$inscrits->id.'</td>
				<td class="tbl_inscrits">'.$inscrits->prenom.'</td>
				<td class="tbl_inscrits">'.$inscrits->nom.'</td>
				<td class="tbl_inscrits">'.$inscrits->email.'</td>
				<td class="tbl_inscrits">'.$valid.'</td>
				<td class="tbl_inscrits">'.'<a class="del" href="inscrits.php?validInscrits='.$inscrits->id.'">Valider</a></td>
				<td class="tbl_inscrits">'.'<a class="del" href="inscrits.php?suppInscrits='.$inscrits->id.'">Supprimer</a></td>
				<tr>';



			}
			else{
				echo '

				<tr>
				<td class="tbl_inscrits">'.$inscrits->id.'</a></td>
				<td class="tbl_inscrits">'.$inscrits->prenom.'</td>
				<td class="tbl_inscrits">'.$inscrits->nom.'</td>
				<td class="tbl_inscrits">'.$inscrits->email.'</td>
				';
			}
}
?>
<tr>
				
				
				</tr>
</table>
</div>
<?php require 'footer.php' ;?>