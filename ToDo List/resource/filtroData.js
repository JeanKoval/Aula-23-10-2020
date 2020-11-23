
function validaOpcao(valorSelect){
    if (valorSelect == 3){
        document.querySelector('#filtroData').style.display = "inline-flex";
    }else{
        document.querySelector('#filtroData').style.display = "none";
    }
}