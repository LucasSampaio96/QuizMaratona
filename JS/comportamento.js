/*
    Autor: Lucas Sampaio;
    RA: 21200671;
    Tema: Maratona (Quiz Mania: Maratona)
*/
function validar_senha() {
    var senha = document.getElementById('senha').value;
    var confSsenha = document.getElementById('confSenha').value;

    if (senha.localeCompare(confSsenha) === 0) {
        document.getElementById('btn').style.visibility = 'visible';
    } else {
        document.getElementById('btn').style.visibility = 'hidden';
        alert('As senhas devem ser iguais');
    }
}

 function validar_sala() {
   var valor_campo = document.getElementById("sala").valueOf();
   var formulario = document.getElementById("form-group")

    if (valor_campo.length >1){
       formulario.submit();
    } else {
       alert("Campo não informado ou Sala não existe!");
    }
 }
