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
</head>
<body>
<?php
include("header.php");
 include("css.php");

if(isset($_GET['ids'])){
    $geti = $_GET['ids'];
    $produto = mysql_query("SELECT * FROM produtos WHERE id = '$geti'");
    $rowm = mysql_fetch_object($produto);
        
    
    ?>
<div class="cardapio">
<div class="modal">

    <div class="content">
        <div class="left-side">
            <br>
            <label><h2><center> <?php echo $rowm->nome?> </center></h2></label>
            
            <label> <h3>O QUE VEM:<br> <?php echo $rowm->descricao?></h3></label>
            <br><br>
            <form action="" name="form_carrinho" method="POST">
            <?php if($rowm->tipo==='fisico') {?>
                    <div id="check">
                            <h3><strong>complementos:</strong></h3><br>
                            <br>Batata(700g) - R$7,50 <input class="campo1"  type="text"  name="batata"  value="0"><img src="img/batata.jpg" height="70px">
                            <br>Calabreza(500g) - R$12,50<input class="campo1"  type="text" name="calabreza" value="0"><img src="img/calabreza.jpg"height="70px">
                            <br>Catupiri(300g) - R$4,50<input class="campo1" type="text" name="catupiri" value="0"><img src="img/catupiri.jpg" height="70px">
                            <br>Cheddar(850g) - R$10,50<input class="campo1" type="text"  name="cheddar" value="0"  width="50px"><img src="img/cheddar.jpg" height="70px">                                       
                    </div>     
            <?php }?>
            <p></p>
                <?php $caminho = 'carrinho.php?acao=add&id=' . $rowm->id; ?>
            <input type="submit" name="enviar" class="botao" onClick="document.form_carrinho.action='<?php echo $caminho ?>'">    
            
            </form>
    
        </div>
        <div class="right-side">
            <img src="img/<?php echo $rowm->imagem?>">
        </div>
        
    </div>
</div>
    
<?php
}

?>
</div>
</body>
</html>