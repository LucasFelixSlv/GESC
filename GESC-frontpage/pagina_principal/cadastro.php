<?php
include_once 'header.php';
?>
<div class="wrapperAll">
    <div class="wrapper cadastro">
        <div class="formBox signup">
            <h2>Cadastro</h2>
            <form method="post" action="../includes/signup.inc.php">
                <div class="inputBox">
                    <span class="icon"><i class="fa fa-user" aria-hidden="true"></i></span>
                    <input type="text" name="nomeUsuario" placeholder=" " required>
                    <label>Usuário</label>
                </div>
                <div class="inputBox">
                    <span class="icon"><i class="fa fa-eye-slash" aria-hidden="true" id="olhoSignup" onclick="toggleSenhaCadastro()"></i></span>
                    <input type="password" name="senhaUsuario" id="senhaSignup" placeholder=" " required>
                    <label>Senha</label>
                </div>
                <div class="inputBox">
                    <span class="icon"><i class="fa fa-eye-slash" aria-hidden="true" id="olhoConfirmar" onclick="toggleSenhaCadastro()"></i></span>
                    <input type="password" name="repetirSenhaUsuario" id="senhaConfirmar" placeholder=" " required>
                    <label>Confirmar senha</label>
                </div>
                <button type="submit" class="loginBtn" name="cadastrar">CADASTRAR</button>
                <div class="loginSignup">
                    <p>Já possui uma conta? <a class="loginLink" href="login.php">Faça login!</a></p>
                </div>
            </form>
            <?php
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "campovazio") {
                    echo "<div class='wrapperMsgErro'><div class='msgErro'><p>Por favor, preencha todos os campos!</p><button type='button' class='confirmarMsg erroCadastro' name='fecharMsg'>OK</button></div></div>";
                } else if ($_GET["error"] == "usuarioinvalido") {
                    echo "<div class='wrapperMsgErro'><div class='msgErro'><p>Por favor, escolha um nome de usuário válido! <br/>&bull; Pelo menos 2 letras <br/>&bull; Pode conter números e '_'.)</p><button type='button' class='confirmarMsg erroCadastro' name='fecharMsg'>OK</button></div></div>";
                } else if ($_GET["error"] == "senhadiferente") {
                    echo "<div class='wrapperMsgErro'><div class='msgErro'><p>Suas senhas não são idênticas, por favor confira novamente!</p><button type='button' class='confirmarMsg erroCadastro' name='fecharMsg'>OK</button></div></div>";
                } else if ($_GET["error"] == "senhafraca") {
                    echo "<div class='wrapperMsgErro'><div class='msgErro'><p>Sua senha deve possuir:<br/>&bull; Mínimo 8 caracteres <br/>&bull; Mínimo uma letra maiúscula<br/>&bull; Mínimo um número<br/>&bull; Mínimo um caractere especial!</p><button type='button' class='confirmarMsg erroCadastro' name='fecharMsg'>OK</button></div></div>";
                } else if ($_GET["error"] == "stmtfalhou") {
                    echo "<div class='wrapperMsgErro'><div class='msgErro'><p>Algo deu errado, por favor tente novamente!</p><button type='button' class='confirmarMsg erroCadastro' name='fecharMsg'>OK</button></div></div>";
                } else if ($_GET["error"] == "usuarioexistente") {
                    echo "<div class='wrapperMsgErro'><div class='msgErro'><p>Usuário já existente, por favor insira outro nome!</p><button type='button' class='confirmarMsg erroCadastro' name='fecharMsg'>OK</button></div></div>";
                }
            }
            ?>
        </div>
    </div>
</div>
<?php
include_once 'footer.php';
?>