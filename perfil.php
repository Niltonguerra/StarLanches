<?php


    include("conexao.php");
    if(!isset($_COOKIE['login'])){
        header("Location: ./Login.php");
    }

    $error = "";
    $hash = $_COOKIE['login'];
    $login = mysql_query("SELECT * FROM tb_starlanches WHERE hash = '$hash'");
    $row = mysql_fetch_object($login);
    $getperm = mysql_query("SELECT perm FROM tb_starlanches WHERE hash = '$hash'");
    $perm = mysql_result($getperm, 0, 'perm');

if(isset($_POST['upload'])){
    $usuario = $_POST [ "txt_usuario"];
    $email = $_POST["txt_email"];		
    $senha = $_POST [ "txt_senha"];
    $csenha = $_POST["txt_csenha"];	
    $nome = $_POST["txt_nome"];		
    $cep = $_POST["txt_cep"];		
    $endereco = $_POST [ "txt_endereco"];
    $telefone = $_POST["txt_telefone"];


    if ($senha != $csenha) {
        $error = "<h2 style='color:red'>Senha nao sao iguais.</h2";
    }else {
        if($usuario!=""){
            $sql =mysql_query ("UPDATE tb_starlanches SET usuario='$usuario' WHERE hash='$row->hash'") ;
        }
        if($email!=""){
            $sql =mysql_query ("UPDATE tb_starlanches SET email='$email' WHERE hash='$row->hash'") ;
        }
        if($senha!=""){
            $sql =mysql_query ("UPDATE tb_starlanches SET senha='$senha' WHERE hash='$row->hash'") ;
        }
        if($nome!=""){
            $sql =mysql_query ("UPDATE tb_starlanches SET nome='$nome' WHERE hash='$row->hash'") ;
        }
        if($cep!=""){
            $sql =mysql_query ("UPDATE tb_starlanches SET cep='$cep' WHERE hash='$row->hash'") ;
        }
        if($endereco!=""){
            $sql =mysql_query ("UPDATE tb_starlanches SET endereco='$endereco' WHERE hash='$row->hash'") ;
        }
        if($telefone!=""){
            $sql =mysql_query ("UPDATE tb_starlanches SET telefone='$telefone' WHERE hash='$row->hash'") ;
        }
        $error = "<h2 style='color:green'>atualizado com sucesso.</h2";
		       
    }
}

    $arquivo = $_FILES['arquivo'];      
    $nomedoarquivo = $arquivo['name'];
if($nomedoarquivo != ""){
    $pasta = "arquivos/";
    $extensao = pathinfo($nomedoarquivo, PATHINFO_EXTENSION); //descobre o tipo do arquivo
    $extensao = strtolower(pathinfo($nomedoarquivo,PATHINFO_EXTENSION)); //transforma tudo em letras minusculas
    $novonomedoarquivo = md5(time()) . $extensao; //gera um novo nome do arquivo, para evitar que aconteça conflitos no banco de dados 
    $path = $pasta . $novonomedoarquivo . "." . $extensao;

    if($extensao != "jpg" && $extensao != "png" ){
        $error = "<h3 style='color:red'>Insira apenas arquivos tipo '.png' ou '.jpg'.</h3>";
    }
    else{
        if($arquivo['size'] >= 1572864){
            $error = "<h3 style='color:red'>Arquivos muito grande!! max:1,5MB.</h3>";
        }
        else{
                unlink($row->img);
                $deu_certo = move_uploaded_file($arquivo["tmp_name"], $pasta . $novonomedoarquivo . "." . $extensao); //a função move_uploaded_file retorna uma variavel booleana
                if($deu_certo){
                    $sql =mysql_query ("UPDATE tb_starlanches SET img='$path',data_upload=NOW()  WHERE hash='$row->hash'");
                    $error = "<h3 style='color:green'>Arquivo enviado com sucesso!</h3>";
                    //echo "<p> Arquivo enviado com sucesso! Para acesá-lo, clique aqui: <a target='_blank' href='arquivos/$novonomedoarquivo.$extensao'>clique aqui.</a></p>";
                }
                else{
                    $error = "<h3 style='color:red'>Arquivos muito grande!! max:1,5MB.</h3>";
                }
            }
        }                                                             //o ponto concatena as variaveis
       
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
    <?php include("header.php");?>
    <?php include("css.php");?>
    <center>
    <div class="cadastro">
        <div id="cadastro-container">
        <form method="POST" name= "form_edit" enctype="multipart/form-data">
                    <h2>Editar Perfil</h2>
                    <?php echo $error;?>
                    <label for="user">foto de perfil(tamanho máximo:1.5MB):</label>
                    <input name="arquivo" type="file" id="campo"></p>

                    <label for="user">Usuário:</label>
                    <input type="text" name="txt_usuario" placeholder="Digite um usuario" autocomplete="off">
                
                    <label for="email">E-mail:</label>
                    <input type="email" name="txt_email" placeholder="Digite um e-mail valido" autocomplete="off">
                
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
                    
                    
                    <input type="submit" name="upload" value="Enviar" onClick="document.form_edit.action='perfil.php'">
                    
        </form>
    </div>
</div>
    </center>
</body>
</html>