<?php
include_once 'header.php';
?>
<div class="wrapperAll">
    <div class="wrapper acesso">
        <div class="formBox login">
            <h2>Login</h2>
            <form method="post" action="../includes/login.inc.php">
                <div class="inputBox">
                    <span class="icon"><i class="fa fa-user" aria-hidden="true"></i></span>
                    <input type="text" name="nomeUsuario" placeholder=" " required>
                    <label>Usuário</label>
                </div>
                <div class="inputBox">
                    <span class="icon"><i class="fa fa-eye-slash" aria-hidden="true" id="olhoLogin" onclick="toggle()"></i></span>
                    <input type="password" name="senhaUsuario" id="senhaLogin" placeholder=" " required>
                    <label>Senha</label>
                </div>
                <button type="submit" class="loginBtn" name="entrar">ENTRAR</button>
                <div class="loginSignup">
                    <p>Não possui uma conta? <a class="signupLink" href="cadastro.php">Cadastre-se!</a></p>
                </div>
            </form>
            <?php
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "campovazio") {
                    echo "<div class='wrapperMsgErro'><div class='msgErro'><p>Por favor, preencha todos os campos!</p><button type='button' class='confirmarMsg erroLogin' name='fecharMsg'>OK</button></div></div>";
                } else if ($_GET["error"] == "loginerrado") {
                    echo "<div class='wrapperMsgErro'><div class='msgErro'><p>Login errado, por favor verifique o nome de usuário e senha!</p><button type='button' class='confirmarMsg erroLogin' name='fecharMsg'>OK</button></div></div>";
                }
            }
            ?>
        </div>
    </div>
</div>
<?php
include_once 'footer.php';
?>