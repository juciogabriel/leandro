<?php


$conn = new mysqli("localhost", "root", "", "neopro");

// Verifique se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Obtenha os dados do formulário
  $nome = $_POST['nome'];
  $funcao = $_POST['funcao'];
  $valor = $_POST['valor'];
  
  // Crie a consulta SQL para inserir os dados na tabela "funcionarios"
  $query = "INSERT INTO colaboradores (nome, funcao, valor) VALUES (?, ?, ?)";

  // Prepare a consulta
  $stmt = mysqli_prepare($conn, $query);


  //$stmt->bind_param("sisd", $string, $int, $float);

  // Ligue os parâmetros aos marcadores de posição
  mysqli_stmt_bind_param($stmt, 'ssi', $nome, $funcao, $valor);

  // Execute a consulta
  mysqli_stmt_execute($stmt);

  // Redirecione o usuário para uma página de sucesso ou exiba uma mensagem de erro
  if (mysqli_stmt_affected_rows($stmt) > 0) {
    header('Location: sucesso_colab.php');
    exit;
  } else {
    $mensagem = "Erro ao cadastrar funcionário: " . mysqli_error($conn);
  }

  // Feche a consulta
  mysqli_stmt_close($stmt);

  // Feche a conexão
  mysqli_close($conn);
}

?>

<!DOCTYPE html>

<html lang="pt-br">
<head>
<meta charset="utf-8"/>
<title>Cadastro de funcionarios</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body class="cd_func">
<div>
<form method="post" action="cadastro_funcionarios.php">
  <h1>Cadastro de Colaboradores</h1>
  <label for="nome">Nome:</label><br>
  <input type="text" name="nome" id="nome" required><br><br>
  <label for="funcao">Função:</label><br>
  <input type="text" name="funcao" id="funcao" required><br><br>
  <label for="custo">Custo por Hora:</label><br>
  <input type="number" name="valor" id="valor" required><br><br>
  <input type="submit" value="Enviar">
</form>
</div>
</body>
</html>