<head>
   <script>
      var anterior="";

      function desabilitar(justificativa){

	if(anterior!=""){
		document.getElementById(anterior).disabled = false;
	}

	document.getElementById(justificativa).disabled = true;
	anterior = justificativa;

      }
   </script>
</head>

<body>

    <?php
	session_start();

	$rodada = $_SESSION["rodada"];
	$assunto = $_SESSION["assunto"];

    ?>
   <form method="POST" action="manipularAtividade.php" enctype="multipart/form-data">

	<input type="hidden" name="rodada" value="<?=$rodada?>">
	<input type="hidden" name="assunto" value="<?=$assunto?>">
	<!--Assunto: <?=$_SESSION["assunto"]?></b><br>
	 <b>Rodada: <?=$_SESSION["rodada"]?></b><br-->
	<b><font color=blue>Assunto: <?=$assunto?></b><br>
        <b>Rodada: <?=$rodada?></font></b><br>
	Atividade:<br>
	<textarea name="desc_atividade" rows="10" cols="40" placeholder="Descrever aqui o exercício"></textarea><br><br>
	Imagem: <input type="file" name="imagem_atividade" accept="image/jpeg, image/png" > <br><br>

	<br>


	Alternativas:(Marque ao lado das alternativas a correta).</br>

  <?php
    $x = 1;
    while($x<6){
      if($x==1) $letra = "a";
      if($x==2) $letra = "b";
      if($x==3) $letra = "c";
      if($x==4) $letra = "d";
      if($x==5) $letra = "e";

  ?>

  <input type="radio" name="alternativa_correta" value="<?=$letra?>" onclick="desabilitar('justificativa_erro_alternativa<?=$x?>')" required>

  <?=$letra?>) <textarea name="descricao_alternativa<?=$x?>" required placeholder="Descrição da alternativa" cols=40></textarea><br>

  <textarea name ="justificativa_erro_alternativa<?=$x?>" id="justificativa_erro_alternativa<?=$x?>" rows="5" cols="40" required placeholder="Descreva aqui o motivo dessa alternativa não estar correta caso não seja a certa:"></textarea><br><br>

  Imagem: <input type="file" name="imagem_alternativa<?=$x?>" accept="image/jpeg, image/png" > <br><br>

  <br>

<?php
$x++;
} ?>

<input type="submit" value="Cadastrar" id="cadastrando" name="cadastrastrando_atividade">

</form>
