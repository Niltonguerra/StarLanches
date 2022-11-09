<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>menu drop-down</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/pop-up.js" defer></script>
</head>
<body>
    <nav class="navbar">
        <h1 class="navbar__logo"><a href="#">Carros_GF</a></h1>

        <ul class="navbar__menu">
            <li class="navbar__item"><a href="#">Home</a></li>
            
            <li class="navbar__item">
                <a href="#" class="dropdown">Cursos</a>
                <div class="submenu">
                    <img class="imagemsub_menu" src="../imagens/food_porn.jpg ">

                    <div class="submenu__itens">

                        <div class="submenu__item">
                             <p><img src="../imagens/adm.png" class="icon"></p>
                             <h4 class="botao">curso de C#</h4>
                        </div>

                        <div class="submenu__item">
                            <p><img src="../imagens/adm.png" class="icon"></p>
                            <h4 class="botao">curso de Python</h4>
                       </div>

                       <div class="submenu__item">
                            <p><img src="../imagens/adm.png" class="icon"></p>
                            <h4 class="botao">curso de JavaScript</h4>
                        </div>

                        <div class="submenu__item">
                            <p><img src="../imagens/adm.png" class="icon"></p>
                            <h4 class="botao">curso de CSS</h4>
                        </div>

                        <div class="submenu__item">
                            <p><img src="../imagens/adm.png" class="icon"></p>
                            <h4 class="botao">curso de C++</h4>
                        </div>

                        <div class="submenu__item">
                            <p><img src="../imagens/adm.png" class="icon"></p>
                            <h4 class="botao">curso de Windows Server</h4>
                        </div>

                    </div>
                </div>
            </li>
            <li class="navbar__item">
                <a href="#" class="dropdown">Login</a>

                <div class="submenu">
                    <form class="form">
                        <input type="email" class="form_input" placeholder="email">
                        <input type="password" class="form_input" placeholder="Senha">
                        
                        <button class="form_btn">Entrar</button>
                    </form>
                </div>

            </li>
        </ul>
    </nav>

    <div class="conteudo"></div>
    
</body>
</html>