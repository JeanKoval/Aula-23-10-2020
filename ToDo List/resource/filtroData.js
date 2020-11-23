
function validaOpcao(valorSelect){
    if (valorSelect === "personalizado"){
        document.querySelector('#filtroData').style.display = "inline-flex";
    }else{
        document.querySelector('#filtroData').style.display = "none";
    }
}