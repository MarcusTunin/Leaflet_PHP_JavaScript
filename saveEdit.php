<?php
    // isset -> serve para saber se uma variável está definida
  
    if(isset($_POST['submit']))
    {
       include_once('conexao.php');       

        $result = mysqli_query($conn, "INSERT INTO usuarios (id, nome, email, senha, nascimento, cpf) (SELECT * FROM solicitar)");
        
    }
    header('Location: listuser.php');

?>