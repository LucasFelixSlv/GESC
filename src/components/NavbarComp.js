import styles from "../styles/NavbarComp.module.css";
import { useState } from "react";
import AccountCreation from "./AccountCreation";

function NavbarComp() {

  const [openLogin, setOpenLogin] = useState(false);
  const [optionLogin, setOptionLogin] = useState();

  return (
    <>
    {openLogin && <AccountCreation closeLogin={setOpenLogin} option={optionLogin}/>} 
    <nav className={`${styles.navbarBg} navbar navbar-expand-lg navbar-dark sticky-top`}>
      <button
        className={`${styles.navbarGesc} navbar-brand col-3 col-md col-lg`}
      >
        GESC
      </button>
      <div className="form-outline col-4 col-md-8 col-lg-5">
        <input
          type="search"
          id="form1"
          className="form-control"
          placeholder="Pesquisar evento"
          aria-label="Search"
        />
      </div>
      <button
        className={`${styles.navbarButtonMob} navbar-toggler`}
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span className="navbar-toggler-icon format-button"></span>
      </button>
      <div className="collapse navbar-collapse" id="navbarNav">
        <div className="navbar-nav col-lg-12">
          
          <div className={`${styles.fundoNavbarButton} col-lg-4`}>
          <button className={`${styles.navbarButton} teste`}>
            CRIAR EVENTO
          </button>
          </div>
          <div className={`${styles.fundoNavbarButton} col-lg-4`}>
          <button className={`${styles.navbarButton}`} onClick={()=> {setOpenLogin(true); setOptionLogin("login");}}>
            ACESSE SUA CONTA
          </button>
          </div>
          <div className={`${styles.fundoNavbarButton} col-lg-4`}>
          <button className={`${styles.navbarButton}`} onClick={()=> {setOpenLogin(true); setOptionLogin("signup");}}>
            CADASTRE-SE
          </button>
          </div>
        </div>
      </div>
    </nav>     
    </>
  );
}

export default NavbarComp;
