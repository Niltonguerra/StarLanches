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
    $sql = mysql_query ("SELECT * from tb_starlanches where usuario like '{$_POST['busca_nome']}%' order by usuario asc");
}
else {
    $sql = mysql_query("SELECT * FROM tb_starlanches order by usuario asc"); 
}






if(isset($_GET['editar'])){  
	
    $usuario = $_POST [ "txt_usuario"];
    $email = $_POST["txt_email"];		
    $senha = $_POST [ "txt_senha"];
    $csenha = $_POST["txt_csenha"];	
    $nome = $_POST["txt_nome"];		
    $cep = $_POST["txt_cep"];		
    $endereco = $_POST [ "txt_endereco"];
    $telefone = $_POST["txt_telefone"];
    $hash = $_GET['editar'];

             if($usuario!=""){
                $sqle =mysql_query ("UPDATE tb_starlanches SET usuario='$usuario' WHERE hash='$hash'") ;
            }
            if($email!=""){
                $sqle =mysql_query ("UPDATE tb_starlanches SET email='$email' WHERE hash='$hash'") ;
            }
            if($senha!=""){
                $sqle =mysql_query ("UPDATE tb_starlanches SET senha='$senha' WHERE hash='$hash'") ;
            }
            if($nome!=""){
                $sqle =mysql_query ("UPDATE tb_starlanches SET nome='$nome' WHERE hash='$hash'") ;
            }
            if($cep!=""){
                $sqle =mysql_query ("UPDATE tb_starlanches SET cep='$cep' WHERE hash='$hash'") ;
            }
            if($endereco!=""){
                $sqle =mysql_query ("UPDATE tb_starlanches SET endereco='$endereco' WHERE hash='$hash'") ;
            }
            if($telefone!=""){
                $sqle =mysql_query ("UPDATE tb_starlanches SET telefone='$telefone' WHERE hash='$hash'") ;
            }
            $error = "<h3 style='color:green'>Atualizado com sucesso!</h3>";
            header("refresh: 1");
    }






    if(isset($_GET['apagar'])){
        $img = $_GET['imagem'];
        if($img=="arquivos/perfil.png"){
    
        }
        else{
            unlink($img);
        }
        $sr = mysql_query("delete from tb_starlanches where hash =". $_GET['apagar']);
        $error = "<h3 style='color:green'>Excluido com sucesso</h3>";
        header("refresh: 1");
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
<?php include("css.php");
 include("header.php");
 
 if(empty($_GET["edit"])){


 ?>

<center>
<div class="listagem">
    <div class="lista">
    <form name="form1" method="POST" action="Listagem.php">
        <label for="busca">Digite um usuário:</label>
            <input type="text" name="busca_nome">
            <input type="submit" value="FILTRAR">
    

    <table align="center" width='75%'>
        <tr>
        <?php echo $error ?>
            <th colspan="8" bgcolor="gray"> LISTAGEM DE CONTAS CADASTRADAS</th>
        </tr>
        <tr>
            <th bgcolor="DarkGray">NOME</th>
            <th bgcolor="DarkGray">CPF</th>
            <th bgcolor="DarkGray">ENDERECO</th>
            <th bgcolor="DarkGray">USUARIO</th>
            <th bgcolor="DarkGray">E-MAIL</th>
            <th bgcolor="DarkGray">SENHA</th>
            <th bgcolor="DarkGray">EXCLUIR</th>
            <th bgcolor="DarkGray">EDITAR</th>
        </tr>
        <tr>

<?php
    while ($linha = mysql_fetch_assoc($sql)) {
?>
    <td align="center"><?php echo $linha['nome']; ?></td>
    <td align="center"><?php echo $linha['cpf']; ?></td>
    <td align="center"><?php echo $linha['endereco']; ?></td>
    <td align="center"><?php echo $linha['usuario']; ?></td>
    <td align="center"><?php echo $linha['email']; ?></td>
    <td align="center"><?php echo $linha['senha']; ?></td>
    <td align="center"><a href="Listagem.php?apagar='<?php echo $linha['hash']; ?>'&imagem=<?php echo $linha['img']; ?>"><img src='img/del.png'></a></td>
    <td align="center"><a href="?edit=<?php echo $linha['usuario']; ?>&hash=<?php echo $linha['hash']; ?>&senha=<?php echo $linha['senha']; ?>"><img src='img/edit.png'></a></td>
    <tr>

<?php }  
    echo "<br/>";
    echo "<br/>";
}
else{ 
    $hash = $_GET["hash"];?>
    <center>
        <div class="cadastro">
            <div id="cadastro-container">
            <form method="POST" name= "form_edit_adm" enctype="multipart/form-data">
                        <h2>Editar Perfil</h2><br>

                        <label for="user">Foto de perfil(tamanho máximo:1.5MB):</label>
                        <input name="arquivo" type="file" id="campo"></p>

                        <label for="email">Antigo nome do usuario:</label>
                        <input type="text" value="<?php if(isset($_GET['edit'])) echo $_GET['edit'] ?>" readonly><br>                    

                        
                        <label for="user"> Novo usuário:</label>
                        <input type="text" name="txt_usuario" placeholder="Digite um usuario" autocomplete="off">
                    
                        <label for="email">E-mail:</label>
                        <input type="email" name="txt_email" placeholder="Digite um e-mail valido" autocomplete="off">
                        
                        <label for="pass">Senha antiga:</label>
                        <input type="text" value="<?php if(isset($_GET['edit'])) echo $_GET['senha'] ?>"disabled>


                        <label for="pass">Senha:</label>
                        <input type="password" name="txt_senha" placeholder="Digite uma senha" autocomplete="off">
                    
                        <label for="cpass">Confirmar senha:</label>
                        <input type="password" name="txt_csenha" placeholder="Confirme a senha" autocomplete="off">
                    
                        <label for="name">Nome:</label>
                        <input type="text" name="txt_nome" placeholder="Nome completo" autocomplete="off">
                    
                        <label for="cep">CEP:</label>
                        <input type="text" name="txt_cep" placeholder="Somente numeros" autocomplete="off">
                
                        <label for="endereco">Endereço:</label>
                        <input type="text" name="txt_endereco" placeholder="Ex: Rua Manoel Simoes, 735, Roncon, Ribeirao Pires, SP" autocomplete="off">
                    
                        <label for="tel">Telefone:</label>
                        <input type="text" name="txt_telefone" placeholder="Somente numeros" autocomplete="off">
                        
                        
                        <INPUT TYPE="submit" name="bt_editar" VALUE="ALTERAR" onClick="document.form_edit_adm.action='?editar=<?php echo $hash ?>'">
                        
                </form>
            </div>
        </div>
    </center>


   
<?php  
} 






?>

    </table>
    </form>
    </div>
</div>
</body>
</html>