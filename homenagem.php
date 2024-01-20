<?php 
session_start();
if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true))
{
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: login.php');
}

$logado = $_SESSION['email'];

include_once('conexao.php');

 $msg = false;

 if(isset($_FILES['arquivo'])){

$arquivo = $_FILES['arquivo'];
$pasta = "upload/"; //define diretorio
$nomedoarquivo = $arquivo['name'];
$novo_nome = uniqid();
$extensao = strtolower(pathinfo($nomedoarquivo, PATHINFO_EXTENSION));
$path = $pasta . $novo_nome;

$idanimal = $_POST['idpet'];
$descricao = $_POST['descricao'];
$nomeanimal = $_POST['nomeanimal'];
move_uploaded_file($arquivo['tmp_name'], $pasta . $novo_nome);//faz upload

$result = mysqli_query($conn, "INSERT INTO homenagem(arquivo, idanimal, descricao, nomeanimal) 
VALUES ('$path', '$idanimal', '$descricao', '$nomeanimal')");
header('Location: index.php');
 }

 else {
    $sql = "SELECT nomepet FROM pets";
    $result2 = $conn->query($sql);
 }



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário | GN</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
        }
        .box{
            color: white;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            background-color: rgba(0, 0, 0, 0.6);
            padding: 15px;
            border-radius: 15px;
            width: 20%;
        }
        fieldset{
            border: 3px solid dodgerblue;
        }
        legend{
            border: 1px solid dodgerblue;
            padding: 10px;
            text-align: center;
            background-color: dodgerblue;
            border-radius: 8px;
        }
        .inputBox{
            position: relative;
        }
        .inputUser{
            background: none;
            border: none;
            border-bottom: 1px solid white;
            outline: none;
            color: white;
            font-size: 15px;
            width: 100%;
            letter-spacing: 2px;
        }
        .labelInput{
            position: absolute;
            top: 0px;
            left: 0px;
            pointer-events: none;
            transition: .5s;
        }
        .inputUser:focus ~ .labelInput,
        .inputUser:valid ~ .labelInput{
            top: -20px;
            font-size: 12px;
            color: dodgerblue;
        }
        #data_nascimento{
            border: none;
            padding: 8px;
            border-radius: 10px;
            outline: none;
            font-size: 15px;
        }
        #submit{
            background-image: linear-gradient(to right,rgb(0, 92, 197), rgb(90, 20, 220));
            width: 100%;
            border: none;
            padding: 15px;
            color: white;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
        }
        #submit:hover{
            background-image: linear-gradient(to right,rgb(0, 80, 172), rgb(80, 19, 195));
        }

        ul {
list-style: none;
background: #333;
text-align: right;
}
ul li h2 a:hover {
background: #222;
margin: 0px 0px;
}
ul h2 a{
float: left;
display: block;
padding: 20px 25px;
color: #FFF;
text-decoration: none;
text-align: left;
font-size: 16px;
}
ul li h2 a:hover {
background: #222;
margin: 0px 0px;
}
ul li {
display: inline-block;
position: relative;
}
ul li a {
display: block;
padding: 20px 25px;
color: #FFF;
text-decoration: none;
text-align: left;
font-size: 16px;
margin: 0px 0px;
}
ul li ul.dropdown li {
display: block;
background: #333;
margin: 0px 0px;
}
ul li ul.dropdown {
width:auto;
position: absolute;
z-index: 999;
display: none;
margin: 0px 0px;
}
ul li a:hover {
background: #222;
margin: 0px 0px;
}
ul li:hover ul.dropdown{
display: block;
margin: 0px 0px;
}

    </style>
</head>
<body>
<ul>

<h2><a href="index.php">REMEMBER PETS</a></h2>

<li><a>Tutores</a>
<ul class="dropdown">
<li><a href="Cadastro.php">Solicitar Cadastro</a></li>
<li><a href="listuser.php">Aprovar Cadastro</a></li>
</ul>
</li>

<li><a>Pets</a>
<ul class="dropdown">
<li><a href="cadastropet.php">Cadastro de pets</a></li>
<li><a href="listpet.php">Covas</a></li>
<li><a href="homenagem.php">Fazer Homenagem</a></li>
</ul>
</li>
<li><a><?php print_r($logado);?></a>
<ul class="dropdown">
<li><a href="sair.php">Sair</a></li>
</ul>
</li>
</ul>


   <div class="box">
   <form method="POST" enctype="multipart/form-data"  action="homenagem.php">
   <legend><b>Formulário de homenagem</b></legend>
    <br><br>
   <div class="inputBox">
   <label for="descricao" class="labelInput">Nome do Tutor</label>
   <br>
   <select name="nomeanimal" id="nomeanimal">
    <?php   while($user_data = mysqli_fetch_assoc($result2)){
        $cu = $user_data['nomepet'];
            echo "<option value='".$cu."'>".$cu."</option>";
    }?>
                
  </select>

                </div>
                <br><br>
                <div class="inputBox">
                    <textarea type="textarea" name="descricao" id="descricao" class="inputUser" required></textarea>
                    <label for="descricao" class="labelInput">Descrição</label>
                </div>
    <p><label for="">Selecione um arquivo</label>
<input name="arquivo" type="file"></p>
<input  type="submit" name="submit" id="submit">
</form> 
    </div>
</body>
</html>