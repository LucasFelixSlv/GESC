import styles from '../styles/AccountCreation.module.css'
import { useState } from 'react';

function AccountCreation({closeLogin, option}) {

    const [showPassword, setShowPassword] = useState(false);

    const togglePassword = () => {
        setShowPassword(!showPassword);
    }

    const [loginStatus, setLoginStatus] = useState(option);

    function handleCloseLogin(){
        closeLogin(false);
    }

    return (
        <div className={styles.accountBackground}>
        <div className={`${styles.formContainer}`}>
            <i className={`uil uil-times ${styles.formClose}`} onClick={handleCloseLogin}></i>
            {/* Formulário de login */}
            <div className={`${styles.form} ${styles.loginForm} ${loginStatus==="login"?"":"d-none"}`}>
                <form action="#">
                    <h2>Login</h2>
                    <div className={styles.inputBox}>
                        <input type="email" placeholder="Digite o seu email" required/>
                        <i className={`${styles.iconEmail} uil uil-envelope-alt`} ></i>
                    </div>
                    <div className={styles.inputBox}>
                        <input type={showPassword ? "text" : "password" } placeholder="Digite sua senha" required/>
                        <i className={`${styles.iconPassword} uil uil-lock password`}></i>
                        <i className={`${styles.iconPasswordHide} uil ${showPassword ? "uil-eye" : "uil-eye-slash"}`} onClick={togglePassword}></i>
                    </div>

                    <div className={`${styles.optionField}`}>
                        <button href="#" class={styles.forgotPassword}>Esqueceu a senha?</button>
                    </div>

                    <button className={styles.buttonLogin} type="submit">Entrar</button>
                    
                    <div className={styles.loginSignup}>
                        Não possui uma conta?
                        <button className={styles.singupLoginSwitch} onClick={()=>{setLoginStatus("signup")}} >Cadastre-se</button>
                    </div>
                </form>
            </div>

            {/* Formulário de cadastro */}
            <div className={`${styles.form} ${styles.signupForm} ${loginStatus==="signup"?"":"d-none"}`}>
                <form action="#">
                    <h2>Cadastro</h2>
                    <div className={styles.inputBox}>
                        <input type="email" placeholder="Digite o seu email" required/>
                        <i className={`${styles.iconEmail} uil uil-envelope-alt`} ></i>
                    </div>
                    <div className={styles.inputBox}>
                        <input type={showPassword ? "text" : "password" } placeholder="Crie sua senha" required/>
                        <i className={`${styles.iconPassword} uil uil-lock password`}></i>
                        <i className={`${styles.iconPasswordHide} uil ${showPassword ? "uil-eye" : "uil-eye-slash"}`} onClick={togglePassword}></i>
                    </div>
                    <div className={styles.inputBox}>
                        <input type={showPassword ? "text" : "password" } placeholder="Confirme sua senha" required/>
                        <i className={`${styles.iconPassword} uil uil-lock password`}></i>
                        <i className={`${styles.iconPasswordHide} uil ${showPassword ? "uil-eye" : "uil-eye-slash"}`} onClick={togglePassword}></i>
                    </div>

                    <button className={styles.buttonLogin} type="submit">Cadastrar</button>
                    
                    <div className={styles.loginSignup}>
                        Já possui uma conta?
                        <button className={styles.singupLoginSwitch} onClick={()=>{setLoginStatus("login")}}>Faça login</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
    );
}

export default AccountCreation;