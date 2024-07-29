function validarCamposCadastrarMateria(event) {
    const id_materia = document.getElementById('id_materia').value;
    const descricao = document.getElementById('descricao').value;

    if (id_materia == 0 || descricao == '') {
        alert('Preencha os campos corretamente!');

        event.preventDefault();

        return false;
    }

    return true;
}
function validarCamposLogin(event) {
    const id_tipo_usuario = document.getElementById('id_tipo_usuario').value;
    const email = document.getElementById('email').value;
    const senha = document.getElementById('senha').value;

    if (email === '' || senha === '') {
        alert('Preencha os campos corretamente!');

        event.preventDefault();

        return false;
    }

    return true;
}

function validarCamposCadastra(event) {
    const nome = document.getElementById('nome').value;
    const email = document.getElementById('email').value;
    const senha = document.getElementById('senha').value;

    if (nome === '' || email === '' || senha === '') {
        alert('Preencha os campos corretamente!');

        event.preventDefault();

        return false;
    }

    return true;
}
