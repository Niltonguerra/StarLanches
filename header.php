<?php
    include('conexao.php');
    $hash = $_COOKIE['login'];
    $login = mysql_query("SELECT * FROM tb_starlanches WHERE hash = '$hash'");
    $row = mysql_fetch_object($login);
    $getperm = mysql_query("SELECT perm FROM tb_starlanches WHERE hash = '$hash'");
    $perm = mysql_result($getperm, 0, 'perm');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StarLanches</title>
</head>


<body>
<?php include("css.php");?>
    <div class="navbar">
    <img src="img/logo.png" width="12%">
    <a href="index.php">Home</a>
    <a href="Sobre.php">Sobre</a>
    <a href="Cardapio.php">Cardapio</a>

    <div class="star"><h1>StarLanches</h1></div>
    
    <?php
                if(isset($_COOKIE['login'])){
                    echo '';
    ?>


            
            <a href="perfil.php" class="right"><img class="perfil" src="<?php echo  $row->img;?>"></a>
            <a href="Carrinho.php" class="right"><img src="img/Cart.png" height= "40px"></a>
            <a href="Logout.php" class="right">Logout</a>

            
                

 
    
    
    
    <?php
        if($perm > 1){
            echo '<a href="Listagem.php" class="right">Lista</a>';
        }else if ($perm = 1){
            echo '<a href="pedidos.php" class="right">pedidos</a>';
        }
    else{

    }
    }else{
        echo '<a href="Login.php" class="right">Login</a>';
    }
    ?>
    




</div>

</body>
</html>

