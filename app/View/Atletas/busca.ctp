    <table cellpadding="0" cellspacing="0" class="table">
	<tr>
			<th><?php echo $this->Paginator->sort('nome'); ?></th>
			<th><?php echo $this->Paginator->sort('Cidade'); ?></th>
	</tr>
	<?php // var_dump($usuarios);
	foreach ($atletas as $atleta): ?>
	<tr>
		<td><?php echo "<p class='listUsuario' id='".$atleta['Atleta']['id']."-".$atleta['Atleta']['nome']."'>".$atleta['Atleta']['nome']."</p>";?></td>
		<td><?php echo $atleta['Atleta']['cidade']."";?></td>
	</tr>
<?php endforeach; ?>
	</table>
<!--foreach ($usuarios as $id => $usuario) {-->
<!--	echo "<p class='listUsuario' id='".$id."-".$usuario."'>".$usuario."</p>";-->
<!--}-->
<!--?>-->