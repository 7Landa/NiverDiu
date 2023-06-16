<?php
	$pdo = new PDO('mysql:host=localhost;dbname=msgdiu','root','');
	
$sql = $pdo->prepare("SELECT * FROM msgdiu");
$sql->execute();
$info = $sql->fetchAll();
/*
foreach ($info as $key => $value) {	
	echo ''.$value['nome'];
	echo '  / '.$value['grau'];
	echo '<br />';
	echo ''.$value['mensagem'];
	echo '<br />'; }*/



	
	?>



<!DOCTYPE html>
<html>
<head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="final/index.css">
	<title>Niver da Diu!!!</title>
</head>
<body>
	


<div id="form">
	<form method="post">
		<h2 class="title">Sua mensagem faz toda diferença!</h2>		

		<label class="label">Nome:</label>
		<div class="input">
			<input id="nome" type="text" placeholder="Seu lindo nome é?..." name="nome" required>
		</div> 

		<label class="label">Grau Parentesco:</label>
		<div class="input" >
			<select id="grau" name="grau" required>
				<option value="Pai">Pai</option>
				<option value="Mãe">Mãe</option>
				<option value="Tio">Tio</option>
				<option value="Tia">Tia</option>
				<option value="Esposo">Esposo</option>
				<option value="Filho">Filho</option>
				<option value="Filha">Filha</option>
				<option value="Velha(o) amiga(o)">Velha(o) amiga(o)</option>
				<option value="Amiga(o) distante">Amiga(o) distante</option>
				<option value="Amiga(o) de infância">Amiga(o) de infância</option>
				<option value="Colega de trabalho">Colega de trabalho</option>
				<option value="Conhecida(o)">Conhecida(o)</option>
				<option value="Ex namorado(a)">Ex namorado(a)</option>
				<option value="Rolo">Rolo/Caso/Amante</option>
				<option value="Prima(o)">Prima(o)</option>
				<option value="Subrinhu">Subrinhus</option>
				<option value="Advinha">Advinha</option>
				
			</select>
		</div>

		<label class="label">Sua mensagem:</label>
		<div class="input">
			<textarea id="msg" placeholder="Capricha!!! Pode pular linhas e escrever muuuuuito!!!" name="mensagem" required rows="3" cols="30"></textarea> 

		</div>
		

		<div class="input">
			<input id="enviar" type="submit" name="acao" placeholder="Enviar">

		</div>		

	</form>
	


</div>

</body>


<table>
<?php
	if(isset($_POST['acao'])){
		$nome= @$_POST['nome'];
		$grau= @$_POST['grau'];
		$mensagem= nl2br(@$_POST['mensagem']);

		$sql = $pdo->prepare("INSERT INTO `msgdiu` VALUES (null,?,?,?)");

		$sql->execute(array($nome,$grau,$mensagem));
		$nome=$value['nome']." <br /> ".$grau=$value['grau'];
		$mensagem=$value['mensagem'];
	 
?>
	<tr>
		<td class="nometable"><?=$nome?></td>
		<td class="msgtable"><?=$mensagem?></td>
	</tr>
	<?php
}
?>
</table>
<table>
	<?php 
	foreach ($info as $key => $value) {	
	$nome=$value['nome']." <br /> ".$grau=$value['grau'];
	$mensagem=$value['mensagem'];
	 ?>
	<tr>
		<td class="nometable"><?=$nome?></td>
		<td class="msgtable"><?=$mensagem?></td>
	</tr>
	<?php
}
?>
</table>


