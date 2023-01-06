<?php

if (isset($_POST['opcao'])) {
  if ($_POST['opcao'] == 'colaboradores') {
    header("Location: /leandro/cadastro_funcionarios.php");
    exit();
  }
}

if (isset($_POST['opcao'])) {
    if ($_POST['opcao'] == 'projetos') {
      header("Location: /leandro/projetos.php");
      exit();
    }
  }

  if (isset($_POST['opcao'])) {
    if ($_POST['opcao'] == 'categorias') {
      header("Location: /leandro/categorias.php");
      exit();
    }
  }
?>


<!DOCTYPE html>
<html>
<head>
  <title>Página protegida</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div style="display: flex; justify-content: center;">
<form method="post" action="cadastros_escolha.php">
  <h1>Cadastro</h1>
  <h2>Selecione o tipo de cadastro:</h2>
  <input type="radio" name="opcao" value="colaboradores" id="colaboradores"><label for="colaboradores">Colaboradores</label>
  <br>
  <input type="radio" name="opcao" value="projetos" id="projetos">
  <label for="projetos">Projetos</label>
  <br><br>
  <input type="radio" name="opcao" value="categorias" id="categorias">
  <label for="categorias">Categorias</label>
  <br>
  <input type="submit" value="Enviar">
</form>
</div>
</body>
</html>