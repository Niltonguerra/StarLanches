<style>
@import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500&display=swap');


*{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}  

body{
    font-family: "Open Sans", sans-serif;
}

.navbar{
    display: flex;
    justify-content: space-between;
    padding: 20px 50px;
    align-items: center;
    border-bottom: 1px solid #eee;
}

.navbar__logo a{
    text-decoration: none;
    color: black;
    font-size: 26px;
}

.navbar__menu{
    list-style: none;
    display: flex;
}

.navbar__item{
    position: relative;
}

.navbar__item:not(:first-child){
    margin-left: 30px;
}

.navbar__item a{
    text-decoration: none;
    color: black;
    font-size: 16px;
}


.submenu{
    border-radius: 5px;
    position: absolute;
    right: 0;
    top: calc(100% + 26px);
    max-width: max-content;
    display: flex;
    overflow: hidden;
    box-shadow: 0 5px 10px 0 rgba(0,0,0,.1);
    transform:translateY(15%);
    opacity: 0;
    pointer-events: none;
    transition: transform .2s, opacity 0.3s;
}


.submenu.show{
transform: translateY(0);
opacity: 1;
pointer-events: auto;
}



.submenu img{
    width: 200px;
    height: 300px;
    object-fit: cover;
    margin-right: 5px;
}

 .submenu__item .icon{
    width: 24px;
    height: 24px;
    margin-right: 10px;
}

.submenu__itens {
    padding: 20px;
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    grid-gap:50px;
}

.submenu__item h4{
    font-weight: 400;
}

.submenu__item{
    display: flex;
    align-items: center;
    width: max-content;  /* faz o texto ficar em apenas uma linha*/
    transition:  background-color 0.2s; 
    padding: 5px;
    cursor: pointer;
}


.submenu__item:hover{
    background-color: #eee;
    border-radius: 5px;
}






.form{
    padding: 30px 30px 20px;
    box-shadow: 0 5px 10px 0 rgba(0,0,0,.1);
    border-radius: 5px;    
}

.form_input:not(:first-child){
    margin-top: 30px;
}

.form_input{
    padding: 5px;
    border-radius: 5px;
    font-size: 16px;
    outline: none;
    border: 1px solid #ccc;
}

.form_btn{
    display: flex;
    font-size: 16px;
    color:white;
    border-radius: 5px;
    width: 100%;
    padding: 20px 30px;
    border:none;
    outline: none;
    margin-top: 30px;
    background-color: black;
    cursor: pointer;
}

</style>