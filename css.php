<style>
@import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500&display=swap');


    
    .perfil{
    height: 70px;
    }

    body{
    overflow: hidden;
    font-family: "Open Sans", sans-serif;
    margin: 0;
}

*{
    box-sizing: border-box;
    font-family: Helvetica;
    border: none;
    overflow: hidden;
}

textarea:focus, input:focus{
    outline: none;
}

h1{
    font-size: 55px;  
}
h2{
    font-size: 25px;  
}

table{
    float: center;
}

th, td{
    border-collapse: collapse;
}

.star{
    left: 36%;
    position: absolute;
    top: 0vh;
    width: 28%;
    height: 16vh;
    text-align: center;
    font-family: Arial, Helvetica, sans-serif;
}
div.panel{
    position: absolute;
    background-color: rgb(204, 211, 219);
    width: 100%;
    min-width: 250px;
    top: 20%;
    font-family: Arial, Helvetica, sans-serif;
}
.titulo{
    color: yellow;
    position: absolute;
    left: 5%;
    top: 15%;
    background: transparent;
    width: auto;
    height: auto;
    font-family: Oswald;
    font-size: 75px;
    text-transform: uppercase;
    font-weight:bold;
}
.titulo2{
    color: white;
    position: absolute;
    left: 5%;
    top: 23%;
    background: transparent;
    width: auto;
    height: auto;
    font-family: Oswald;
    font-size: 25px;
    text-transform: uppercase;
    font-weight:bold;
}
.bemvindo{
    color: white;
    position: absolute;
    left: 35%;
    top: 3%;
    background: transparent;
    width: 30%;
    height: auto;
    font-family: Oswald;
    font-size: 30px;
    text-transform: uppercase;
    font-weight:bold;
}

div.navbar{
    overflow: hidden;
    background-color: rgb(204, 211, 219);
    position: fixed;
    top: 0;
    width: 100%;
    height: 20vh;
}

div.navbar a{
    float:left;
    display: black;
    color: black;
    text-align: center;
    padding: 20px 16px;
    text-decoration: none;
    font-size: 18px;
    text-transform: uppercase;
    font-family: Arial, Helvetica, sans-serif;
}

div.navbar a.right{
    float: right;
    display: block;
    color: black;
    text-align: center;
    padding: 10px 16px;
    text-decoration: none;
    text-transform: capitalize;
    font-family: Arial, Helvetica, sans-serif;
}

div.navbar a.right img{
    height: 100px;
    border-radius: 20px;
    float: right;
    display: block;
    color: black;
    text-align: center;
    padding: 10px 16px;
    text-decoration: none;
    text-transform: capitalize;
    font-family: Arial, Helvetica, sans-serif;
}








div.navbar img{
    float: left;
    display: block;
    color: black;
    text-align: center;
    padding: 0px 16px;
    text-decoration: none;
}

.listagem{
    position: absolute;
    background:linear-gradient(#92979b, #ccd3db);
    width: 100%;
    height: 80vh;
    top: 20%;
}
.lista{
    border-radius: 1px solid black;
    border: none;
    border-collapse: collapse;
    overflow: auto;
    position: absolute;
    background: transparent;
    width: 100%;
    height: 70vh;
    min-width: 250px;
    top: 10%;
    font-family: Arial, Helvetica, sans-serif;
}
.lista th, td{
    border: 1px solid black;
}
.lista input[type="submit"]{
    text-align: center;
    text-transform: uppercase;
    font-weight: bold;
    border: none;
    height: 40px;
    width: 80px;
    border-radius: 5px;
    color: black;
    background-color: #ccd3db;
    cursor: pointer;
}
.lista input[type="submit"]:hover{
    background-color: #92979b;
    transition: .5s;
}
.lista label, input{
    display: block;
    width: auto;
    text-align: center;
}
.lista label{
    font-weight: bold;
    font-size: 1rem;
}
.lista input{
    background-color: transparent;
    border-bottom: 2px solid #323232;
    padding: 10px;
    font-size: 1rem;
    margin-bottom: 20px;
    width: 200px;
}
.lista input:focus{
    border-bottom: 2px solid #085588;
}

.editar{
    position: absolute;
    background:linear-gradient(#92979b, #ccd3db);
    width: 100%;
    height: 80vh;
    top: 20%;
}
.edit{
    border: none;
    position: absolute;
    background: transparent;
    width: 100%;
    height: auto;
    min-width: 250px;
    top: 10%;
    font-family: Arial, Helvetica, sans-serif;
}
.edit h2{
    font-family: Arial, Helvetica, sans-serif;
    font-weight: bold;
    box-shadow: 0 0 10px;
    width: 300px;
}
.edit label{
    font-size: 1rem;
    font-weight: bold;
}
.edit form{
    margin-top: 20px;
    margin-bottom: 30px;
}
.edit label, input{
    display: block;
    width: auto;
    text-align: center;
}
.edit input{
    background-color: transparent;
    border-bottom: 2px solid #323232;
    padding: 10px;
    width: 200px;
    font-size: 1rem;
    text-align: center;
    margin-bottom: 10px;
}
.edit input:focus{
    border-bottom: 2px solid #085588;
}
.edit input[type="submit"]{
    text-align: center;
    text-transform: uppercase;
    font-weight: bold;
    border: none;
    height: 40px;
    width: auto;
    border-radius: 5px;
    margin-top: 1px;
    color: black;
    background-color: #ccd3db;
    cursor: pointer;
}
.edit input[type="submit"]:hover{
    background-color: #92979b;
    transition: .5s;
}

.cadastro{
    overflow: auto;
    border: none;
    padding: 0;
    margin: 0;
    box-shadow: none !important;
    position: fixed;
    background:linear-gradient(#d6dee6, #2b2d2e);
    width: 100%;
    height: 80vh;
    min-width: 250px;
    top: 20%;
}
.cadastro label{
    font-size: .8rem;
    font-weight: bold;
}
.cadastro form{
    margin-top: 20px;
    margin-bottom: 30px;
}
.cadastro label, input{
    display: block;
    width: 100%;
    text-align: left;
}
.cadastro input{
    background-color: transparent;
    border-bottom: 2px solid #323232;
    padding: 10px;
    font-size: 1rem;
    margin-bottom: 10px;
}
.cadastro input:focus{
    border-bottom: 2px solid #085588;
}
#cadastro-container{ 
background:linear-gradient(#ccd3db, #f2f5f8);
 border-radius: 2px;
 width: 500px;
 margin-left: auto;
 margin-right: auto;
 padding: 10px 20px;
 margin-top: 1vh;
 margin-bottom: 1vh;
 text-align: center;   
}
.cadastro input[type="submit"]{
    text-align: center;
    text-transform: uppercase;
    font-weight: bold;
    border: none;
    height: 40px;
    border-radius: 5px;
    margin-top: 25px;
    color: black;
    background-color: #ccd3db;
    cursor: pointer;
}
.cadastro input[type="submit"]:hover{
    background-color: #92979b;
    transition: .5s;
}

.login{
    border: none;
    padding: 0;
    margin: 0;
    box-shadow: none !important;
    position: fixed;
    background:linear-gradient(#d6dee6, #2b2d2e);
    width: 100%;
    height: 100%;
    min-width: 250px;
    top: 20%;
}
.login a, label{
    font-size: .8rem;
}
.login a:focus{
    color: #085588;
}
.login form{
    margin-top: 30px;
    margin-bottom: 40px;
}
.login label, input{
    display: block;
    width: 100%;
    text-align: left;
}
.login label{
    font-weight: bold;
}
.login input{
    background-color: transparent;
    border-bottom: 2px solid #323232;
    padding: 10px;
    font-size: 1rem;
    margin-bottom: 20px;
}
.login input:focus{
    border-bottom: 2px solid #085588;
}
#login-container{
    background:linear-gradient(#ccd3db, #f2f5f8);
 border-radius: 2px;
 width: 400px;
 height: auto;
 margin-left: auto;
 margin-right: auto;
 padding: 20px 30px;
 margin-top: 5vh;
 text-align: center;   
}
#forgot-pass{
    text-align: right;
    display: block;
}
.login input[type="submit"]{
    text-align: center;
    text-transform: uppercase;
    font-weight: bold;
    border: none;
    height: 40px;
    border-radius: 5px;
    margin-top: 30px;
    color: black;
    background-color: #ccd3db;
    cursor: pointer;
}
.login input[type="submit"]:hover{
    background-color: #92979b;
    transition: .5s;
}
#register-container{
    margin-bottom: 1px;
}

.sobre{
    position: fixed;
    background:linear-gradient(#92979b, #ccd3db);
    width: 100%;
    height: 100%;
    min-width: 250px;
    top: 20%;
    font-family: Arial, Helvetica, sans-serif;
}
.texto{
    position: absolute;
    left: 5%;
    top: 5%;
    background: transparent;
    width: 45%;
    height: 30%;
    font-size: 18px;
    text-align: justify;
    line-height: 30px;
}
.texto2{
    position: absolute;
    left: 20%;
    top: 31%;
    background: transparent;
    width: 30%;
    height: auto;
    font-size: 120px;
    font-family: Playfair Display;
    font-weight: bold;
}
.texto3{
    position: absolute;
    left: 35%;
    top: 60%;
    background: transparent;
    width: 30%;
    height: auto;
    font-size: 30px;
    text-align: center;
}
.texto4{
    position: absolute;
    left: 39%;
    top: 67%;
    background: transparent;
    width: 10%;
    height: auto;
    font-size: 20px;
    text-align: center;
}
.texto5{
    position: absolute;
    left: 51%;
    top: 67%;
    background: transparent;
    width: 10%;
    height: auto;
    font-size: 20px;
    text-align: center;
}
.texto6{
    position: absolute;
    left: 60%;
    top: 25%;
    background: transparent;
    width: 30%;
    height: auto;
    font-size: 30px;
    text-align: center;
}
.texto7{
    position: absolute;
    left: 65%;
    top: 32%;
    background: transparent;
    width: 20%;
    height: auto;
    font-size: 18px;
    text-align: center;
}

.cardapio{
    position: fixed;
    overflow: auto;
    background:linear-gradient(#ccd3db, #ffffff);
    width: 100%;
    height: 80vh;
    min-width: 250px;
    top: 20%;
    font-family: Arial, Helvetica, sans-serif;
}
.produto{
    background-color: transparent;
    position: relative;
    width: auto;
    height: auto;
    margin-top: 30px;
    margin-left: 200px;
    margin-right: 100px;
    float: left;
    text-align: left;
}
.produto img{
    margin-left: 10px;
    width: auto;
    height: 200px;
    margin-top: 5px;
}
.nome-produto h2{
    font-size: 22px;
    margin-bottom: 0;
    padding: 0;
    margin: 0;
    margin-top: 10px;
}
.descricao{
    width: 250px;
    height: auto;
}
.descricao h3{
    margin-top: 5px;
    font-size: 18px;
    text-align: left;
    font-weight: normal;
}
.preco{
    color: red;
    font-size: 1.5rem;
    text-align: center;
    margin-bottom: 0;
    margin: 0;
    padding: 0;
}
.adc-produto{
    border-bottom: 2px solid #323232;
    width: 250px;
    height: auto;
    padding: 0;
    margin: 0 auto;
    margin-top: 0;
    text-align: center;
}
.adc-produto a{
    margin-top: 0;
    font-size: 1.5rem;
    color: #295075 !important; 
    text-decoration: none;
}
.adc-produto a:hover{
    color: red !important;
    
}

.carrinho{
    position: fixed;
    overflow: auto;
    background:linear-gradient(#ccd3db, #ffffff);
    width: 100%;
    height: 80vh;
    min-width: 250px;
    top: 20%;
    font-family: Arial, Helvetica, sans-serif;
}
.cart{
    border-radius: 1px solid black;
    border: none;
    border-collapse: collapse;
    position: absolute;
    background: transparent;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    width: auto;
    height: auto;
    min-width: 250px;
    top: 10%;
    font-family: Arial, Helvetica, sans-serif;
}
.cart table{
    text-align: center;
    text-decoration: none;
}
.cart caption{
    font-size: 30px;
    margin-bottom: 5px;
    text-transform: capitalize;
    font-weight: bold;
}
.cart th, td{
    border: 1px solid black;
}
.cart input[type="submit"]{
    text-align: center;
    text-transform: uppercase;
    font-weight: bold;
    border: none !important;
    height: 40px;
    width: auto;
    border-radius: 5px;
    color: black;
    background-color: #ffffff, !important;
    cursor: pointer;
    margin-bottom: 50px;
}
.cart input[type="submit"]:hover{
    background-color: #92979b;
    transition: .5s;
}
.cart input{
    margin-left: auto;
    margin-right: auto;
    display: block;
    width: auto;
    text-align: center;
    background-color: transparent;
    border-bottom: 2px solid #323232;
    font-size: 1rem;
}
.cart input:focus{
    border-bottom: 2px solid #085588;
}
.continuar{
    margin-top: 15px;
    text-align: center;
    width: auto;
}
.continuar a{
    text-decoration: none;
    color: black;
    font-size: 1.1rem;
}
.continuar a:hover{
    color: red;
    transition: .5s;
}





























































/** css do pop up */

.botao{
    width: 120px;
    border-radius:20px;
    text-decoration: none;
    display: block;
    margin:20px auto;
    background: crimson;
    color: rgb(255, 255, 255);
    border:0;
    cursor:pointer;
    padding: 6px 10px;
}

.bt{
    width: 120px;
    text-decoration: none;
    display: block;

    background: rgb(0, 0, 0);
    color: rgb(255, 255, 255);
    border:0;
    cursor:pointer;
    padding: 6px 10px;
}



.popup-wrapper{
    display: none;
    background: rgba(0, 0, 0, .5);
    position: fixed;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
}

.confirmar{
    display: block;
    background: rgba(0, 0, 0, .5);
    position: fixed;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
}

.popup{
    border: solid 5px orange;
    border-radius: 15px;
    font-family: arial;
    text-align: center;
    width: 100%;
    height: 100%;
    max-width: 500px;
    max-height: 300px;
    margin:10% auto;
    padding: 20px;
    background: white;
    position:relative;
}



.popup-close{
    cursor: pointer;
    font-size: 25px;
    margin-right: 5px;
    position:absolute;
    top: 5px;
    right: 10px;
    cursor: pointer;
}

.botoes{
    display:flex;
    height:35px;

}

.botoes #bota {
    border-radius: 10px;
    height:30px;
    width:auto;
    color:white;
    background-color: orange;
    cursor:pointer;
    border:solid 0px black;
    font-weight: bold;

}
.botoes #bota:hover{
    color:white;
    background-color: red;
}





.campo{

    border-radius: 10px;
    border: solid 2px black;
    width: 369px;
    height: 120px;
}

































































h1,h2,h3{
 padding: 0;  
 margin: 0px; 
 margin-top: 10px;
 border: 0;
}



.content{
	color:white;
    min-height: calc(100vh - 20vh);
    height: 100%;
	width: 100vw;
	background: rgb(255, 135, 135);
	padding:0 5%;
	display: flex;
    justify-content: center;
	align-items: center;
}
.right-side{
    background: rgb(255, 115, 22);
	border-radius: 25px;
	display: flex;
	justify-content: center;
	align-items: center;
	width:400px;
    height: 400px;
}
.right-side img{
	border-radius:5%;
	max-width: 300px;
	-moz-transition: all 0.3s;
	-webkit-transition: all 0.3s;
	transition: all 0.3s;

}
.right-side img:hover{
	-moz-transform: scale(1.1);
	-webkit-transform: scale(1.1);
	transform: scale(1.1);
}

.left-side{
	width: 65%;
    width: 65%;
	display: flex;
	flex-direction: column;
	justify-content:center;
	height: 100%;
	background-color:light gray;
	border-radius: 20px;
}

.left-side h1{
    margin-bottom: 10%;
	font-size: 40px;
	color: #fff;	
}

.left-side h4{
    margin-right: 50px;
	font-size: 18px;
	font-weight: 300;
	color: #fff;	
}

.left-side p{
	color:#fff;
	margin-bottom:30px;
}

.left-side a{
	align-self: center;
	text-decoration:none;

	width:fit-content;
	padding:15px 200px;
	border-radius: 15px; 
	justify-content: center;	
	color:rgb(255, 255, 255);
	background-color: rgb(89, 0, 255);
	transition: all 0.3s;
	
	
}

.left-side a:hover{
	transition: all 0.3s;
	color:rgb(0, 0, 0);
	background-color: rgb(255, 238, 0);
}

.flex img{
    max-width: 100%;
    display: block;
}

.flex{
    display: flex;   
    flex-wrap: wrap;
}

.flex > div{
    flex: 1 1 350px;
    margin: 25px 5px;
}

.campo1{
    width: 50px;
}





























    </style>
