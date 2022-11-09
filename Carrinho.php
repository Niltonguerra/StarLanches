<?php

include('conexao.php');
session_start();

if (!isset($_COOKIE['login'])) {
    header("Location: ./");
}



if (!isset($_SESSION['complementos'][$id]['total'])) {
    $_SESSION['complementos'] = array();
    $_SESSION['complementos'][$id] = array();
    $_SESSION['complementos'][$id][$idd] = array();
    $_SESSION['complementos'][$id][$idd]['preco'] = array();
    $_SESSION['complementos'][$id][$idd]['nome'] = array();
    $_SESSION['complementos'][$id][$idd]['qtd'] = array();
    $_SESSION['complementos'][$id]['total'] = array();
}
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = array();
}




// Adicionar produto
if (isset($_GET['acao'])) {
    $nome_comp = "";

    //Adicionar carrinhoo que $_session fazer?
    if ($_GET['acao'] == 'add') {
        $id = intval($_GET['id']);

        if (!isset($_SESSION['carrinho'][$id])) {

            $_SESSION['carrinho'][$id] = 1;
            $comp = 0;
        } else {
            $_SESSION['carrinho'][$id] += 1;
        }





        if (isset($_POST['batata'])) {


            $qtd_com = $_POST['batata'];
            $batata = $qtd_com * 7.5;
            $comp = $comp + $batata;

            $_SESSION['complementos'][$id][1]['preco'] = $batata;
            $_SESSION['complementos'][$id][1]['nome'] = "Batata(700g)";
            $_SESSION['complementos'][$id][1]['qtd'] = $qtd_com;

            $qtd_com = 0;
        }


        if (isset($_POST['calabreza'])) {


            $qtd_com = $_POST['calabreza'];
            $calabreza = $qtd_com * 12.5;
            $comp = $comp + $calabreza;


            $_SESSION['complementos'][$id][2]['preco'] = $calabreza;
            $_SESSION['complementos'][$id][2]['nome'] = "Calabreza(500g)";
            $_SESSION['complementos'][$id][2]['qtd'] = $qtd_com;

            $qtd_com = 0;
        }


        if (isset($_POST['catupiri'])) {


            $qtd_com = $_POST['catupiri'];
            $catupiri = $qtd_com * 4.5;
            $comp = $comp + $catupiri;

            $_SESSION['complementos'][$id][3]['preco'] = $catupiri;
            $_SESSION['complementos'][$id][3]['nome'] = "Catupiri(300g)";
            $_SESSION['complementos'][$id][3]['qtd'] = $qtd_com;

            $qtd_com = 0;
        }


        if (isset($_POST['cheddar'])) {


            $qtd_com = $_POST['cheddar'];
            $cheddar = $qtd_com * 10.5;
            $comp = $comp + $cheddar;

            $_SESSION['complementos'][$id][4]['preco'] = $cheddar;
            $_SESSION['complementos'][$id][4]['nome'] = "cheddar(850g)";
            $_SESSION['complementos'][$id][4]['qtd'] = $qtd_com;

            $qtd_com = 0;
        }
        $_SESSION['complementos'][$id]['total'] = $comp;
    }

    //Remover carrinho
    if ($_GET['acao'] == 'del') {
        $id = intval($_GET['id']);
        if (isset($_SESSION['carrinho'][$id])) {
            unset($_SESSION['carrinho'][$id]);
            unset($_SESSION['complementos'][$id]);
        }
    }

    //Alterar quantidade
    if ($_GET['acao'] == 'up') {
        if (is_array($_POST['prod'])) {
            foreach ($_POST['prod'] as $id => $qtd) {
                $id = intval($id);
                $qtd = intval($qtd);
                if (!empty($qtd) || $qtd <> 0) {
                    $_SESSION['carrinho'][$id] = $qtd;
                } else {
                    unset($_SESSION['carrinho'][$id]);
                }
            }
        }
    }
}




/*
if(isset($_GET['terminar'])){
    $comprar =  "INSERT INTO fatura (nome, qtd, hash,forma,data,valor,) VALUES ('Test', 'Testing', 'Testing@tesing.com')";
}
 */





















?>



















<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StarLanches</title>
    <link rel="stylesheet" style="text/css" href="style.css">
    <!-- o web server não identifica a importação dos arquivos javascript por isso foi escrito diretamente aqui no arquivo php -->
</head>

<body>
    <?php include("css.php"); ?>
    <?php include('header.php'); ?>
    <div class="carrinho">













        <div class="cart">
            <table align="center">
                <caption>Carrinho de compras</caption>
                <thead>
                    <tr>
                        <th bgcolor="DarkGray">Produto</th>
                        <th bgcolor="DarkGray">Quantidade</th>
                        <th bgcolor="DarkGray">Preco</th>
                        <th bgcolor="DarkGray">complementos</th>
                        <th bgcolor="DarkGray">SubTotal</th>
                        <th bgcolor="DarkGray">deletar</th>
                    </tr>
                </thead>

                <form action="?acao=up" method='POST'>
                    <tfoot>

                        <input type='submit' value="Atualizar Carrinho" />


                    </tfoot>


                    <tbody>
                        <?php
                        $num = 0;
                        $total = 0;
                        if (count($_SESSION['carrinho']) == 0) {
                            echo '<tr><td colspan="6">Não há produto no carrinho</td></tr>';
                        } else {



                            foreach ($_SESSION['carrinho'] as $id => $qtd) {
                                $sql = "SELECT * FROM produtos WHERE id= '$id'";
                                $qr = mysql_query($sql) or die(mysql_error());
                                $ln = mysql_fetch_assoc($qr);




                                $nome = $ln['nome'];
                                $preco = number_format($ln['preco'], 2, ',', '.');
                                $sub = ($ln['preco'] * $qtd) + $_SESSION['complementos'][$id]['total'];
                                
                                $total += $sub;
                                $total = number_format($total, 2, ',', '.');

                                echo '<tr>
                                        <td>' . $nome . '</td>
                                        <td><input type="texte" size="3" name="prod[' . $id . ']" value="' . $qtd . '" /></td>
                                        <td>R$ ' . $preco . '</td>
                                        <td>R$ ' . $_SESSION['complementos'][$id]['total'] . '</td>
                                        <td>R$ ' . $sub . '</td>
                                        <td><a href="?acao=del&id=' . $id . '"><img src="img/remove.png"></a></td>
                                        </tr>';
                            }


                            echo '<tr>
                                        <td colspan="5">Total</td>
                                        <td>R$ ' . $total . '</td>
                                    </tr>';
                        }







                        ?>


                        <div class="popup-wrapper">
                            <div class="popup">
                                <div class="popup-close">x</div>
                                <div class="popup-content">

                                    <form action="" name="form_carrinho" method="post">
                                        <h2 class="text">Gostaria de algo especial no seu pedido!😃</h2>
                                        <p>
                                            <!-- Caixa de texto --> <textarea class="campo" rows="6" name="comentario"
                                                maxlength="300"></textarea>
                                        </p>
                                        <input type="hidden" name="total" value="<?php echo $total; ?>"> </input>
                                        <input type="hidden" name="cook" value="<?php echo $_COOKIE['login']; ?>">
                                        </input>

                                        <div class="botoes">
                                            <input type="button" class="botaoo" id="bota" value="VOLTAR"></input>
                                            <input type="submit" class="botaoo" name="entrar" id="bota" value="Confirmar"></input>
                                            

                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>

                    </tbody>

                </form>
            </table>
            <div class="continuar"><a href="Cardapio.php">Continuar comprando</a></div>
            <div class="continuar"><a href="#" class="termina">terminar compra</a></div>

            <!--
            <tr>
                <td>&nbsp</td>
                <td>&nbsp</td>
                <td>&nbsp</td>
                <td>&nbsp</td>
                <td>&nbsp</td>
            </tr>
        -->

            <?php

            if (isset($_POST['entrar'])) {

                $cook = $_POST['cook'];
                $hash = $cook;
                $login = mysql_query("SELECT * FROM tb_starlanches WHERE hash = '$hash'");
                $row = mysql_fetch_object($login);

                $comentario = $_POST['comentario'];


                function formata($y){
                    $a = str_replace('.','',$y);
                    $b = str_replace(',','.',$y);
                    return $b;
                }

                $total = $_POST['total'];

                $total = formata($total);





                $cont_batata = 0;
                $cont_calabreza = 0;
                $cont_catupiri = 0;
                $cont_cheddar = 0;
                $nome_prod = "";

    
                foreach ($_SESSION['carrinho'] as $id => &$qtd) {
                    $sql = "SELECT * FROM produtos WHERE id= '$id'";
                    $qr = mysql_query($sql);
                    $ln = mysql_fetch_assoc($qr);
                    $qtd_prod = $_SESSION['carrinho'][$id];
                    $nome = $ln['nome'];
                    $nome_prod = $nome_prod . $nome ." (" . $qtd_prod.") + ";
                }
                
                foreach ($_SESSION['complementos'] as $i => &$qttd) {
                    for($j = 1;$j <= 4;$j++){
                        switch ($j) {
                            case 1:$cont_batata = $cont_batata + $_SESSION['complementos'][$i][$j]['qtd']; break;
                            case 2:$cont_catupiri = $cont_catupiri + $_SESSION['complementos'][$i][$j]['qtd']; break;
                            case 3:$cont_calabreza = $cont_calabreza + $_SESSION['complementos'][$i][$j]['qtd']; break;
                            case 4:$cont_cheddar = $cont_cheddar + $_SESSION['complementos'][$i][$j]['qtd']; break;
                        }
                    }
                }

                if($cont_batata!=0){ $nome_prod = $nome_prod . 'Batata(700g)' . " (" . $cont_batata.") + ";}
                if($cont_catupiri!=0){ $nome_prod = $nome_prod . 'Catupiri(300g)' . " (" . $cont_calabreza.") + ";}
                if($cont_calabreza!=0){ $nome_prod = $nome_prod . 'Calabreza(500g)' . " (" . $cont_calabreza.") + ";}
                if($cont_cheddar!=0){ $nome_prod = $nome_prod . 'Cheddar(850g)' . " (" . $cont_cheddar.") + ";}
                
                mysql_query("INSERT INTO `pedidos` (`nome_prod`,`preco`,`nome_cliente`,`endereco_cliente`,`comentario`) VALUES ('$nome_prod','$total','$row->nome','$row->endereco','$comentario')");               
                
                
                
                
                
                
                
                
                
                
                
                $ref = rand(1,9999).$row->hash;
                
                
                $status = "Pendente";

                $forma = "Mercado Pago";

                $sql = mysql_query("INSERT INTO `fatura` (`hash`,`ref`,`forma`,`data`,`valor`,`status`) VALUES ('$row->hash','$ref','$forma',NOW(),'$total','$status')");
                
                $url = "http://localhost:8080/StarLanches";
                

                

                require_once 'MercadoPago/lib/mercadopago.php';
                require_once 'PagamentoMP.php';
                
                $pagar = new PagamentoMP;

                
                $query =mysql_query("SELECT * FROM fatura WHERE ref='$id' LIMIT 1");
                $fat = mysql_fetch_assoc($query);


                    $btn = $pagar->PagarMP($ref, $nome_prod,(float)$total, $url);








            ?>

            <div class="confirmar">
                <div class="popup">
                    <div class="popup-close">x</div>
                    <div class="popup-content">
                        <h1 class="certo">✔️</h1><br>

                        <h2>Seu pedido já joi realizado e está sendo preparado, logo logo ele vai estar juntinho de
                            você! 😋 <?php echo $total; ?></h2>
                            <?php echo $btn; ?>
                    </div>
                </div>
            </div>
            <?php }

            ?>
            <!--       
     print_r($_SESSION['complementos']['1']['1']);
     echo '<br>';
     print_r($_SESSION['complementos']['1']['2']);
     echo '<br>';
     print_r($_SESSION['complementos']['1']['3']);
     echo '<br>';
     print_r($_SESSION['complementos']['1']['4']);
     echo '<br>';

    
     print_r($_SESSION['complementos'][1]['total']); 
     echo '<br>';
    

     print_r($_SESSION['complementos']['2']['1']);
     echo '<br>';
     print_r($_SESSION['complementos']['2']['2']);
     echo '<br>';
     print_r($_SESSION['complementos']['2']['3']);
     echo '<br>';
     print_r($_SESSION['complementos']['2']['4']);
     echo '<br>';

    

    -->

<?php 
    print_r($_SESSION['carrinho']);






































?>



        </div>
    </div>
</body>

</html>


<script>
const button = document.querySelector('.termina')
const popup = document.querySelector('.popup-wrapper')





button.addEventListener('click', () => {
    popup.style.display = 'block';


})



popup.addEventListener('click', () => {
    const classNameOfClickedElement = event.target.classList[0]
    const ClassNames = ['popup-close', 'popup-wrapper', 'botaoo']
    const shouldClosePopup = ClassNames.some(className => className === classNameOfClickedElement)

    if (shouldClosePopup) {
        popup.style.display = 'none';


    }

})

const popup2 = document.querySelector('.confirmar')

popup2.addEventListener('click', () => {
    const classNameOfClickedElement = event.target.classList[0]
    const ClassNames = ['popup-close', 'confirmar']
    const shouldClosePopup2 = ClassNames.some(className => className === classNameOfClickedElement)

    if (shouldClosePopup2) {
        popup2.style.display = 'none';


    }

})
</script>