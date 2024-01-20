<?php
    // isset -> serve para saber se uma variável está definida
    if(isset($_POST['update']))
    {
       include_once('conexao.php');
       $idpet = $_POST['idpet'];
        $id_usuario = $_POST['id_usuario'];
        $nomepet = $_POST['nomepet'];
        $data = $_POST['data'];
        $ativo = $_POST['ativo'];

        $sqlInsert = "UPDATE pets 
        SET id_usuario='$id_usuario', nomepet='$nomepet', data='$data', ativo='$ativo'
        WHERE idpet=$idpet";
        $result = $conn->query($sqlInsert);
        print_r($result);
        
    }
    header('Location: index.php');

?>