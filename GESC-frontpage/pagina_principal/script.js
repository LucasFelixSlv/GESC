const confirmarMsgCadastro = document.querySelector('.erroCadastro');
const confirmarMsgLogin = document.querySelector('.erroLogin');

if (confirmarMsgCadastro != null) {
    confirmarMsgCadastro.addEventListener('click', () => {
        location.replace('cadastro.php');
    })
}

if (confirmarMsgLogin != null) {
    confirmarMsgLogin.addEventListener('click', () => {
        location.replace('login.php');
    })
}

var senhaStatus = false;
senhaLogin = document.querySelector('#senhaLogin');
senhaSignup = document.querySelector('#senhaSignup');
senhaConfirmar = document.querySelector('#senhaConfirmar');
olhoLogin = document.querySelector('#olhoLogin');
olhoSignup = document.querySelector('#olhoSignup');
olhoConfirmar = document.querySelector('#olhoConfirmar');

function toggleSenhaLogin() {
    if (senhaStatus) {
        senhaLogin.setAttribute("type", "password");
        olhoLogin.setAttribute("class", "fa fa-eye-slash");
        senhaStatus = false;
    } else {
        senhaLogin.setAttribute("type", "text");
        olhoLogin.setAttribute("class", "fa fa-eye");
        senhaStatus = true;
    }
}

function toggleSenhaCadastro() {
    if (senhaStatus) {
        senhaSignup.setAttribute("type", "password");
        senhaConfirmar.setAttribute("type", "password");
        olhoSignup.setAttribute("class", "fa fa-eye-slash");
        olhoConfirmar.setAttribute("class", "fa fa-eye-slash");
        senhaStatus = false;
    } else {
        senhaSignup.setAttribute("type", "text");
        senhaConfirmar.setAttribute("type", "text");
        olhoSignup.setAttribute("class", "fa fa-eye");
        olhoConfirmar.setAttribute("class", "fa fa-eye");
        senhaStatus = true;
    }
}