<?php
include 'conexao.php';
$error = "";
if(isset($_COOKIE['login'])){
    $hash = $_COOKIE['login'];
    $perm = mysql_result(mysql_query("SELECT perm FROM tb_starlanches WHERE hash = '$hash'"), 0);
    if($perm < 1){
        header("Location: ./");
    }
}else{
    header("Location: ./");
}

if (isset($_POST['busca_nome']) !="") {
    $sql = mysql_query ("SELECT * from pedidos where id like '{$_POST['busca_nome']}%' order by id asc");
}
else {
    $sql = mysql_query("SELECT * FROM pedidos order by id asc"); 
}



if(isset($_GET['id'])){
    $sr = mysql_query("delete from pedidos where id =". $_GET['id']);
    $error = "<h3 style='color:green'>Excluido com sucesso</h3>";
    header("refresh: 1");
}


if(isset($_GET['123'])){
    $deletar = $_GET['123'];
    $sr = mysql_query("delete from pedidos where id =". $deletar);
    header("refresh: 10");
}


?>




<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StarLanches</title>
    <link rel="stylesheet" style="text/css" href="style.css">
</head>
<body>
<?php 
include("css.php");
 include("header.php");
 header("refresh: 10");
 if(empty($_GET["edit"])){


 ?>

<center>
<div class="listagem">
    <div class="lista">
    <form name="form1" method="POST" action="pedidos.php">
        <label for="busca">Digite um usuário:</label>
            <input type="text" name="busca_nome">
            <input type="submit" value="FILTRAR">
    

    <table align="center" width='75%'>
        <tr>
        <?php echo $error ?>
            <th colspan="7" bgcolor="gray"> LISTAGEM DE CONTAS CADASTRADAS</th>
        </tr>
        <tr>
            <th bgcolor="DarkGray">ID</th>
            <th bgcolor="DarkGray">NOME DO PRODUTO</th>
            <th bgcolor="DarkGray">PRECO</th>
            <th bgcolor="DarkGray">NOME CLIENTE</th>
            <th bgcolor="DarkGray">ENDEREÇO DO CLIENTE</th>
            <th bgcolor="DarkGray">COMENTÁRIO</th>
            <th bgcolor="DarkGray">Feito</th>

        </tr>
        <tr>

<?php
    while ($linha = mysql_fetch_assoc($sql)) {
?>
    <td align="center"><?php echo $linha['id']; ?></td>
    <td align="center"><?php echo $linha['nome_prod']; ?></td>
    <td align="center"><?php echo $linha['preco']; ?></td>
    <td align="center"><?php echo $linha['nome_cliente']; ?></td>
    <td align="center"><?php echo $linha['endereco_cliente']; ?></td>
    <td align="center"><?php echo $linha['comentario']; ?></td>
    <td align="center"><a href="?123=<?php echo $linha['id']; ?>">✔</a></td>

    <tr>

<?php }  
    echo "<br/>";
    echo "<br/>";
    }
    
    ?>

    
    </center>

    </table>
    </form>

    </div>
</div>
</body>
</html>