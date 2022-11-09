<?php
    include("conexao.php");
    if(!isset($_COOKIE['login'])){
        header("Location: ./Login.php");
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
    <link rel="stylesheet" style="text/css" href="popup.css">



</head>
<body>
<?php include("css.php");?>
<?php include("header.php");?>
    



    <div class="cardapio">
    <?php
     if(!isset($_GET['ids'])){
        $sql = "SELECT * FROM produtos";
        $qr = mysql_query($sql) or die(mysql_error());
        while($ln = mysql_fetch_assoc($qr)){
            echo '<div class="produto">';
            echo '<img src="img/'.$ln['imagem'].'"/><br />';
            echo '<div class="nome-produto"><h2>'.$ln['nome'].'</h2></div>';
            echo '<div class="descricao"><h3>'.$ln['descricao'].'</h3></div> <br />';
            echo '<div class="preco">R$ '.number_format($ln['preco'], 2, ',', '.').'</div><br />';
            echo '<a href="compra.php?ids='.$ln['id'] .'" class="botao"><h2>comprar</h2></a>';
            echo '<br /><hr />';
            echo '</div>';
        }
    }
?>
</div>

</body>
</html>