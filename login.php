
<?php

// Verifica se o formulário foi enviado
if (isset($_POST['submit'])) {
  // Recebe os dados do formulário
  $username = $_POST['username'];
  $password = $_POST['password'];
  
  // Conecta ao banco de dados
  $db = new mysqli("localhost", "root", "", "neopro");


  // Verifica se os dados de login são válidos
  $query = "SELECT * FROM usuarios WHERE username='$username' AND password='$password'";
  $result = $db->query($query);
  
  if ($result->num_rows > 0) {
    // Os dados de login são válidos, verifique se o usuário é um administrador
    $query = "SELECT * FROM usuarios WHERE username='$username' AND administrador=1";
    $result = $db->query($query);
    
    if ($result->num_rows > 0) {
      // O usuário é um administrador, redirecione para a página de administrador
      header("Location: /leandro/cadastros_escolha.php");
    } else {
      // O usuário não é um administrador, redirecione para a página de usuário comum
      header("Location: /leandro/acesso_colaboradores.php");
    }
  } else {
    // Os dados de login são inválidos, exiba uma mensagem de erro
    echo "Nome de usuário ou senha inválidos.";
  }
}

?>

<!-- Exibe o formulário de login -->
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

img {
  display: inline-block;
  width: 200px;
  margin-bottom: 20px;
}
input[type="submit"]:hover {
  background-color: #444;
}



</style>
<div>
  <img src="imagens/logo.jpeg" alt="Logo">
  <form method="post" action="login.php">
    <label for="username">Nome de usuário:</label><br>
    <input type="text" name="username" id="username"><br>
    <label for="password">Senha:</label><br>
    <input type="password" name="password" id="password"><br><br>
    <input type="submit" name="submit" value="Entrar">
  </form> 
</div>