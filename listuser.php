<?php
include_once("conexao.php"); // incluindo a conexao com banco de dados
session_start();
if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true))
{
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: login.php');
}

$logado = $_SESSION['email'];
$sql = "SELECT * FROM solicitar ORDER BY id ASC";

$result = $conn->query($sql);

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>SISTEMA | GN</title>
    <style>
        body{
            background: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
            color: white;
            text-align: center;
        }
        .table-bg{
            background: rgba(0, 0, 0, 0.3);
            border-radius: 15px 15px 0 0;
        }

        .box-search{
            display: flex;
            justify-content: center;
            gap: .1%;
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
</body>
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
</div>
    <div class="m-5">
    <form action="edit.php?id=$id" method="POST">
        <table class="table text-white table-bg">
            <thead>
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Nascimento</th>
                    <th scope="col">Cpf</th>           
                    <th scope="col">...</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($user_data = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>".$user_data['id']."</td>";
                        echo "<td>".$user_data['nome']."</td>";
                        echo "<td>".$user_data['email']."</td>";
                        echo "<td>".$user_data['nascimento']."</td>";
                        echo "<td>".$user_data['cpf']."</td>";
                        echo "</tr>";
                    }
                    ?>
            </tbody>
        </table>
                </form>
    </div>
</html>
