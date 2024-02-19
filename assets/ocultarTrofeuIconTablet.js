//Recupera tamanho da tela para aplicar configuração de disabled no texto das labels do tabMenu
//Do container de top dados


document.addEventListener("DOMContentLoaded", function() {
    const larguraDaTela = window.innerWidth;
    const classeElemento = 'icon-trophy-lista_enderecos';
    if (larguraDaTela < 975) {
        let elementos = document.getElementsByClassName(classeElemento);
        for(let i = 0; i < elementos.length; i++) {
            elementos[i].classList.add('disabled');
        }
    } 
})