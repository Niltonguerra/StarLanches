<?php
    include ("conexao.php");
    $error = "";
    if(isset($_POST['btn_cadastrar'])){
        $usuario = $_POST ['txt_usuario'];
        $email = $_POST ['txt_email'];
        $senha = $_POST ['txt_senha'];
        $csenha = $_POST ['txt_csenha'];
        $nome = $_POST ['txt_nome'];
        $cpf = $_POST ['txt_cpf'];
        $data_nasc = $_POST ['txt_data_nasc'];
        $cep = $_POST ['txt_cep'];
        $endereco = $_POST ['txt_endereco'];
        $telefone = $_POST ['txt_telefone'];
        $verify = mysql_query("SELECT * FROM tb_starlanches WHERE email = '$email' OR usuario = '$usuario'");

    
        if ($senha != $csenha) {
            $error = "<h2 style='color:red'>Senha nao sao iguais</h2";
        }else if(mysql_num_rows($verify) > 0){
            $error = "<h2 style='color:red'>Email ou usuario ja cadastrado</h2";
        }else {
            $hash = bin2hex(mcrypt_create_iv(12, MCRYPT_DEV_URANDOM));
            
            $query = mysql_query("SELECT hash FROM tb_starlanches WHERE hash = '$hash'");

            if(mysql_num_rows($query) < 1){
            mysql_query("INSERT INTO `tb_starlanches`(`usuario`, `email`, `senha`, `nome`, `cpf`, `data_nasc`, `cep`, `endereco`, `telefone`, `active`, `hash`) 
                        VALUES ('$usuario','$email','$senha','$nome','$cpf','$data_nasc','$cep','$endereco','$telefone','1','$hash')");
            $error = "<h2 style='color:green'>Cadastrado com sucesso. Entre no E-mail para verifica-lo!</h2";
            }else{
                return $hash;
            }
        }
        
        $arquivo = $_FILES['arquivo'];      
        $nomedoarquivo = $arquivo['name'];

        if(empty($_FILES['arquivo'])){
        $pasta = "arquivos/";
        $extensao = pathinfo($nomedoarquivo, PATHINFO_EXTENSION); //descobre o tipo do arquivo
        $extensao = strtolower(pathinfo($nomedoarquivo,PATHINFO_EXTENSION)); //transforma tudo em letras minusculas
        $novonomedoarquivo = md5(time()) . $extensao; //gera um novo nome do arquivo, para evitar que aconteça conflitos no banco de dados 
        $path = $pasta . $novonomedoarquivo . "." . $extensao;

            if($extensao != "jpg" && $extensao != "png"){
                $error = "<h3 style='color:red'>Insira apenas arquivos tipo '.png' ou '.jpg'.</h3>";
            }
            else
            {
                if($arquivo['size'] >= 1572864){
                    $error = "<h3 style='color:red'>Arquivos muito grande!! max:1,5MB.</h3>";
                }
                else{
                        
                        $deu_certo = move_uploaded_file($arquivo["tmp_name"], $pasta . $novonomedoarquivo . "." . $extensao); //a função move_uploaded_file retorna uma variavel booleana
                        if($deu_certo){
                            $sql =mysql_query ("UPDATE tb_starlanches SET img='$path',data_upload=NOW()  WHERE hash='$hash'");
                            $error = "<h2 style='color:green'>Cadastrado com sucesso. Entre no E-mail para verifica-lo!</h2";
                            //echo "<p> Arquivo enviado com sucesso! Para acesá-lo, clique aqui: <a target='_blank' href='arquivos/$novonomedoarquivo.$extensao'>clique aqui.</a></p>";
                        }
                        else{
                            $error = "<h3 style='color:red'>Arquivos muito grande!! max:1,5MB.</h3>";
                        }
                }
            }                                                             //o ponto concatena as variaveis
        
        }
        else{
            $img_padrão ="arquivos/perfil.png";
            $sql =mysql_query ("UPDATE tb_starlanches SET img='$img_padrão',data_upload=NOW()  WHERE hash='$hash'");
            $error = "<h2 style='color:green'>Cadastrado com sucesso. Entre no E-mail para verifica-lo!</h2";
        }
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
    <?php include("css.php");?>
    <?php include("header.php");?>
    <center>
    <div class="cadastro">
        <div id="cadastro-container">
        <h2>Cadastro</h2>
        <?php echo $error; ?>
        <form method="POST" name= "form_cadastro" enctype="multipart/form-data">

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
               
                    <label for="cpf">CPF:</label>
                    <input type="text" name="txt_cpf" placeholder="Somente numeros" autocomplete="off">
                
                    <label for="data">Data de Nascimento:</label>
                    <input type="text" name="txt_data_nasc" placeholder="Ex: DD/MM/AAAA" autocomplete="off">
                
                    <label for="cep">CEP:</label>
                    <input type="text" name="txt_cep" placeholder="Somente numeros" autocomplete="off">
               
                    <label for="endereco">Endereço:</label>
                    <input type="text" name="txt_endereco" placeholder="Ex: Rua Manoel Simoes, 735, Roncon, Ribeirao Pires, SP" autocomplete="off">
                
                    <label for="tel">Telefone:</label>
                    <input type="text" name="txt_telefone" placeholder="Somente numeros" autocomplete="off">
    
                    <input type="submit" name="btn_cadastrar" value="Cadastrar" onClick="document.form_cadastro.action='Cadastro.php'">
        </form>
        <div id="register-container">
            <p>Voce já tem conta? Então <a href="Login.php">Clique aqui</a></p>
            </div>
        </div>
    </div>
    </center>
</body>
</html>











