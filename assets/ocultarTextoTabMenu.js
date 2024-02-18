//Recupera tamanho da tela para aplicar configuração de disabled no texto das labels do tabMenu
//Do container de top dados


document.addEventListener("DOMContentLoaded", function() {
    window.addEventListener('resize', function(){
        const larguraDaTela = window.innerWidth;
        const listaElementos = ['text_container-hot_phone', 'text_container-hot_mobile_phone', 'text_container-hot_address', 'text_container-hot_email'];
        if (larguraDaTela <= 937) {
            for (let classe of listaElementos) {
                let elementoDom = document.querySelector("." + classe);
                elementoDom.classList.add('disabled');
            }
        } else if (larguraDaTela > 937) {
            for (let classe of listaElementos) {
                let elementoDom = document.querySelector("." + classe);
                elementoDom.classList.remove('disabled')
            }
        }
    })
})