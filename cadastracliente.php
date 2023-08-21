<?php
include("conectadb.php");





if($_SERVER['REQUEST_METHOD'] == 'POST')

{

    $nome = $_POST['nome'];

    $senha = $_POST['senha'];

    $cpf = $_POST['cpf'];

    $datanasc = $_POST['datanasc'];

    $telefone = $_POST['telefone'];

    $logradouro = $_POST['logradouro'];

    $numero = $_POST['numero'];

    $cidade = $_POST['cidade'];

    




    #VALIDAÇÃO DE CLIENTE. VERIFICA SE CLIENTE JÁ EXISTE

    $sql = "SELECT COUNT(cli_cpf) FROM clientes WHERE cli_cpf = '$cpf'";

    $retorno = mysqli_query($link,$sql);




    while($tbl = mysqli_fetch_array($retorno))

    {

        $cont = $tbl[0];

    }

    #VALIDAÇÃO DE TRUE E FALSE

    if($cont == 1)

    {

        echo"<script>window.alert('CLIENTE JÁ EXISTE');</script>";

    }

    else

    {

        $sql = "INSERT INTO clientes (cli_nome, cli_senha, cli_cpf, cli_datanasc, cli_telefone, cli_logradouro, cli_numero, cli_cidade, cli_ativo) 
        VALUES ('$nome', '$senha', $cpf, '$datanasc', $telefone, '$logradouro', '$numero' ,'$cidade', 's')";

        mysqli_query($link, $sql);

        #CADASTRO CLIENTE E JOGA MENSAGEM NA TELA E DIRECIONA PARA LISTA CLIENTE

        echo"<script>window.alert('CLIENTE CADASTRADO');</script>";

        echo"<script>window.location.href='listacliente.php';</script>";

    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/estiloadm.css">
    <title>CADASTRO DE clientes</title>
</head>
<body>
   <div>
    <ul class='menu'>
        <li><a href="cadastracliente.php">CADASTRA CLIENTE</a></li>
        <li><a href="listacliente.php">LISTA CLIENTE</a></li>
        <li><a href="cadastrproduto.php">CADASTRA PRODUTO</a></li>
        <li><a href="listaproduto.php">LISTA PRODUTO</a></li>
        <li><a href="listacliente.php">LISTA CLIENTE</a></li>
        <li class="menuloja"><a href="./areacliente/loja.php">LOJA</a></li>
</ul> 
</div>

<div>
    <form action="cadastracliente.php" method="post">
        <input type="text" name="nome" id="nome" placeholder="NOME">
        <br>
        <input type="password" name="senha" id="nome" placeholder="SENHA">
        <br>
        <input type="number" name="cpf" id="cpf" placeholder="CPF">
        <br>
        <input type="number" name="datanasc" id="datanasc" placeholder="DATANASCIMENTO">
        <br>
        <input type="number" name="telefone" id="telefone" placeholder="TELEFONE">
        <br>
        <input type="text" name="logradouro" id="logradouro" placeholder="LOGRADOURO">
        <br>
        <input type="number" name="numero" id="numero" placeholder="NUMERO">
        <br>
        <input type="text" name="cidade" id="cidade" placeholder="CIDADE">
        <br>
        <input type="submit" name="cadastrar" id="cadastrar" placeholder="CADASTRAR">
        <br>
        




</form>
</div>

</body>
</html>
