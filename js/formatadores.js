//Formata CPF pelo id e pelo form
function ValidaCPF() {
    var ao_cpf = document.forms.form_cpf.ao_cpf.value;
    var cpfValido = /^(([0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}))$/;
    if (cpfValido.test(ao_cpf) == false) {
        ao_cpf = ao_cpf.replace(/\D/g, "");
        if (ao_cpf.length == 11) {
            ao_cpf = ao_cpf.replace(/(\d{3})(\d)/, "$1.$2");
            ao_cpf = ao_cpf.replace(/(\d{3})(\d)/, "$1.$2");
            ao_cpf = ao_cpf.replace(/(\d{3})(\d{1,2})$/, "$1-$2");
            var valorValido = document.getElementById("ao_cpf").value = ao_cpf;
        }
    }
}

//Formata campo  de telefone pelo input
const ValidaTelefone = (event) => {
    let input = event.target
    input.value = phoneMask(input.value)
}
const phoneMask = (value) => {
    if (!value) return ""
    value = value.replace(/\D/g, '')
    value = value.replace(/(\d{2})(\d)/, "($1) $2")
    value = value.replace(/(\d)(\d{4})$/, "$1-$2")
    return value

}

//Regular o padding de navbar e footer
$(document).ready(function () {
    var newPaddingTop = document.getElementById('footer').clientHeight + 15;
    document.getElementById("footer_padding").style.paddingTop = newPaddingTop + "px";

    var newPaddingTop = document.getElementById('nav').clientHeight + 0;
    document.getElementById("nav_padding").style.paddingBottom = newPaddingTop + "px";
});

