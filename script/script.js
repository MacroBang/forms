var BtnCadastrar = document.getElementById("BtnCadastrar");
var BtnEntrar = document.getElementById("BtnEntrar");

var cadastro = document.getElementById("cadastro");
var login = document.getElementById("login");

BtnCadastrar.onclick = function() {
    login.style.display = "block";
    cadastro.style.display = "none";
};

BtnEntrar.onclick = function() {
    cadastro.style.display = "block";
    login.style.display = "none";
};