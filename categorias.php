<?php

//categorias usadas
//horas de fabrica, 
//hora de teste
//servicos em campo
//serviços em garantia 
//projeto eletrico 
//projeto mecanico

$conn = new mysqli("localhost", "root", "", "neopro");

// Verifique se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Obtenha os dados do formulário
  $horasfabrica = $_POST['horasfabrica'];
  $horasteste = $_POST['horasteste'];
  $servicosemcampo = $_POST['servicosemcampo'];
  $servicosemgarantia = $_POST['servicosemgarantia'];
  $projetoeletrico = $_POST['projetoeletrico'];
  $projetomecanico = $_POST['projetomecanico'];

  // Crie a consulta SQL para inserir os dados na tabela "funcionarios"
  $query = "INSERT INTO categorias (horasfabrica, horasteste, servicosemcampo, servicosemgarantia, projetoeletrico, projetomecanico) VALUES (?, ?, ?, ?, ?, ?)";

  // Prepare a consulta
  $stmt = mysqli_prepare($conn, $query);


  // Ligue os parâmetros aos marcadores de posição
  mysqli_stmt_bind_param($stmt, 'ssssss', $horasfabrica, $horasteste, $servicosemcampo, $servicosemgarantia, $projetoeletrico, $projetomecanico);

  // Execute a consulta
  mysqli_stmt_execute($stmt);

  // Redirecione o usuário para uma página de sucesso ou exiba uma mensagem de erro
  if (mysqli_stmt_affected_rows($stmt) > 0) {
    header('Location: sucesso_cat.php');
    exit;
  } else {
    $mensagem = "Erro ao cadastrar categoria: " . mysqli_error($conn);
  }

  // Feche a consulta
  mysqli_stmt_close($stmt);

  // Feche a conexão
  mysqli_close($conn);
}

?>

<style>

body {
  font-family: Arial, sans-serif;
  color: #333;
  background-color: #f5f5f5;
}

form {
  width: 300px;
  margin: 0 auto;
  text-align: center;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
  background-color: #fff;
}

label {
  display: block;
  margin-bottom: 5px;
  font-size: 14px;
}

input[type="text"], input[type="password"] {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  margin-bottom: 20px;
  box-sizing: border-box;
}

input[type="submit"] {
  width: 100%;
  padding: 10px;
  border: none;
  border-radius: 5px;
  background-color: #333;
  color: #fff;
  font-size: 16px;
  cursor: pointer;
}

div {
  text-align: center;
}

input[type="submit"]:hover {
  background-color: #444;
}
</style>

<!DOCTYPE html>
<html>
<head>
  <title>Página protegida</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div>

<form action="categorias.php" method="post">
  <label for="horasfabrica">Horas na fábrica:</label><br>
  <input type="number" id="horasfabrica" name="horasfabrica" required><br>
  <label for="horasteste">Horas em teste:</label><br>
  <input type="number" id="horasteste" name="horasteste" required><br>
  <label for="servicosemcampo">Serviços em campo:</label><br>
  <input type="number" id="servicosemcampo" name="servicosemcampo" required><br>
  <label for="servicosemgarantia">Serviços em garantia:</label><br>
  <input type="number" id="servicosemgarantia" name="servicosemgarantia" required><br>
  <label for="projetoeletrico">Projeto elétrico:</label><br>
  <input type="number" id="projetoeletrico" name="projetoeletrico" required><br>
  <label for="projetomecanico">Projeto mecânico:</label><br>
  <input type="number" id="projetomecanico" name="projetomecanico" required><br><br>
  <input type="submit" value="Enviar">

</form>
</div>
</body>
</html>
