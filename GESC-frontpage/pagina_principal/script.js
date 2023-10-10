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

const notaAvaliacao = document.querySelector('#notaAvaliacao');

if(notaAvaliacao){
    notaAvaliacao.oninput = () => {
        const nota = document.querySelector('#notaAvaliacao');
        const botaoAvaliacao = document.querySelector('button[type="submit"]');
    
        if (nota.value >= 1 && nota.value <= 5 && nota.value % 1 === 0) {
            botaoAvaliacao.removeAttribute("disabled");
        } else {
            botaoAvaliacao.setAttribute("disabled", "");
        }
    };
}

