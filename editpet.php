<?php
    include_once('conexao.php');

    session_start();
    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true))
    {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: login.php');
    }
    
    $logado = $_SESSION['email'];

    if(!empty($_GET['idpet']))
    {
        $idpet = $_GET['idpet'];
        $sqlSelect = "SELECT * FROM pets WHERE idpet=$idpet";
        $result = $conn->query($sqlSelect);
        if($result->num_rows > 0)
        {
            while($user_data = mysqli_fetch_assoc($result))
            {
                $id_usuario = $user_data['id_usuario'];
                $nomepet = $user_data['nomepet'];
                $data = $user_data['data'];
                $ativo = $user_data['ativo'];
               
            }
        }
        else
        {
            header('Location: listpet.php');
        }
    }
    else
    {
        header('Location: listpet.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
            text-align: center;
            color: white;
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
        .box{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            background-color: rgba(0, 0, 0, 0.6);
            padding: 30px;
            border-radius: 10px;
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
<li><a href="listuser.php">Lista Tutores</a></li>
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
        <form action="saveEditpet.php" method="POST">
            <fieldset>
                <legend><b>Editar Pet</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="id_usuario" id="id_usuario" class="inputUser" value=<?php echo $id_usuario;?> required>
                    <label for="id_usuario" class="labelInput">Tutor</label>
                </div>
                
                <br><br>
                <div class="inputBox">
                    <input type="text" name="nomepet" id="nomepet" class="inputUser" value=<?php echo $nomepet;?> required>
                    <label for="nomepet" class="labelInput">Nome Do Pet</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="data" id="data" class="inputUser" value=<?php echo $data;?> required>
                    <label for="data" class="labelInput">Data</label>
                </div>
                <br><br>
             
                <div class="inputBox">
                <select name="ativo" id="ativo" value=<?php echo $ativo;?> required>
                <option value="nao">NAO</option>
      <option value="sim">SIM</option>
  </select>
  <label for="ativo" class="labelInput">Ativo</label>
                </div>
                <br><br>
               
                <br><br>
				<input type="hidden" name="idpet" value=<?php echo $idpet;?>>
                <input type="submit" name="update" id="submit">
            </fieldset>
        </form>
    </div>
</body>
</html>