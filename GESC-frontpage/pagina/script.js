const wrapper = document.querySelector('.wrapper');
const loginLink = document.querySelector('.loginLink');
const signupLink = document.querySelector('.signupLink');
const acessarConta = document.querySelector('.acessarConta');
const criarConta = document.querySelector('.criarConta');
const wrapperBackground = document.querySelector('.wrapperBackground');
const iconClose = document.querySelector('.iconClose');
const confirmarMsg = document.querySelector('.confirmarMsg');

signupLink.addEventListener('click', () => {
    wrapper.classList.add('active');
});

loginLink.addEventListener('click', () => {
    wrapper.classList.remove('active');
});

if (criarConta != null) {
    criarConta.addEventListener('click', () => {
        wrapper.classList.add('active');
        wrapperBackground.classList.add('active');
    });
}

if (acessarConta != null) {
    acessarConta.addEventListener('click', () => {
        wrapper.classList.remove('active');
        wrapperBackground.classList.add('active');
    });
}


iconClose.addEventListener('click', () => {
    wrapper.classList.remove('active');
    wrapperBackground.classList.remove('active');
})

if (confirmarMsg != null) {
    confirmarMsg.addEventListener('click', () => {
        location.replace('index.php');
    })
}

var senhaStatus = false;
senhaLogin = document.querySelector('#senhaLogin');
senhaSignup = document.querySelector('#senhaSignup');
senhaConfirmar = document.querySelector('#senhaConfirmar');
olhoLogin = document.querySelector('#olhoLogin');
olhoSignup = document.querySelector('#olhoSignup');
olhoConfirmar = document.querySelector('#olhoConfirmar');

function toggle(){
    if(senhaStatus){
        senhaLogin.setAttribute("type", "password");
        senhaSignup.setAttribute("type", "password");
        senhaConfirmar.setAttribute("type", "password");
        olhoLogin.setAttribute("class", "fa fa-eye-slash");
        olhoSignup.setAttribute("class", "fa fa-eye-slash");
        olhoConfirmar.setAttribute("class", "fa fa-eye-slash");
        senhaStatus = false;
    }else{
        senhaLogin.setAttribute("type", "text");
        senhaSignup.setAttribute("type", "text");
        senhaConfirmar.setAttribute("type", "text");
        olhoLogin.setAttribute("class", "fa fa-eye");
        olhoSignup.setAttribute("class", "fa fa-eye");
        olhoConfirmar.setAttribute("class", "fa fa-eye");
        senhaStatus = true;
    }
}