<?php
// itens a ser inseridos no banco de dados
//item
//bu
//tipo
//status
//cliente
//descrição
//engenheiro chefe
//gerente de projeto
//cpm
//projeto
//os
?>
<?php


$conn = new mysqli("localhost", "root", "", "neopro");

// Verifique se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Obtenha os dados do formulário
  $item = $_POST['item'];
  $bu = $_POST['bu'];
  $tipo = $_POST['tipo'];
  $statusp = $_POST['statusp'];
  $cliente = $_POST['cliente'];
  $descricao = $_POST['descricao'];
  $engenheirochefe = $_POST['engenheirochefe'];
  $gerentedeprojeto = $_POST['gerentedeprojeto'];
  $cpm = $_POST['cpm'];
  $projeto = $_POST['projeto'];
  $os = $_POST['os'];

  // Crie a consulta SQL para inserir os dados na tabela "funcionarios"
  $query = "INSERT INTO projetos (item, bu, tipo, statusp, cliente, descricao, engenheirochefe, gerentedeprojeto, cpm, projeto, os) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

  // Prepare a consulta
  $stmt = mysqli_prepare($conn, $query);

  // Ligue os parâmetros aos marcadores de posição
  mysqli_stmt_bind_param($stmt, 'ississssssi', $item, $bu, $tipo, $statusp, $cliente, $descricao, $engenheirochefe, $gerentedeprojeto, $cpm, $projeto, $os);


  // Execute a consulta
  mysqli_stmt_execute($stmt);

  // Redirecione o usuário para uma página de sucesso ou exiba uma mensagem de erro
  if (mysqli_stmt_affected_rows($stmt) > 0) {
    header('Location: sucesso_pro.php');
    exit;
  } else {
    $mensagem = "Erro ao cadastrar projetos: " . mysqli_error($conn);
  }

  // Feche a consulta
  mysqli_stmt_close($stmt);

  // Feche a conexão
  mysqli_close($conn);
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Página protegida</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div>
<img src="imagens/logo.jpeg" alt="Logo">
<form action="projetos.php" method="post">
  <label for="item">Item:</label><br>
  <input type="text" id="item" name="item" required><br>
  <label for="bu">BU:</label><br>
  <input type="text" id="bu" name="bu" required><br>
  <label for="tipo">Tipo:</label><br>
  <input type="text" id="tipo" name="tipo" required><br>
  <label for="status">Status:</label><br>
  <input type="text" id="statusp" name="statusp" required><br>
  <label for="cliente">Cliente:</label><br>
  <input type="text" id="cliente" name="cliente" required><br>
  <label for="descricao">Descrição:</label><br>
  <input type="text" id="descricao" name="descricao" required><br>
  <label for="engenheiro_hefe">Engenheiro chefe:</label><br>
  <input type="text" id="engenheirochefe" name="engenheirochefe" required><br>
  <label for="gerentedeprojeto">Gerente de projeto:</label><br>
  <input type="text" id="gerentedeprojeto" name="gerentedeprojeto" required><br>
  <label for="cpm">CPM:</label><br>
  <input type="texT" id="cpm" name="cpm" required><br>
  <label for="projeto">Projeto:</label><br>
  <input type="text" id="projeto" name="projeto" required><br>
  <label for="os">Os:</label><br>
  <input type="text" id="os" name="os" required><br>
  <input type="submit" value="Enviar">
</div>
</body>
</html>