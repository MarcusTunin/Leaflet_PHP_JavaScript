<?php
    if(isset($_POST['submit']))
    {
       include_once('conexao.php');

        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $nascimento = $_POST['nascimento'];
        $cpf = $_POST['cpf'];
       

        $result = mysqli_query($conn, "INSERT INTO usuarios(nome, email, senha, nascimento, cpf) 
        SELECT nome, email, senha, nascimento, cpf FROM solicitar where id=$id ");
  header('Location: index.php');
    }
  
?>
