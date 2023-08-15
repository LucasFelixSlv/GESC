import styles from "../styles/NavbarComp.module.css";

function NavbarComp() {
  return (
    <nav className={`${styles.navbarBg} navbar navbar-expand-lg navbar-dark sticky-top`}>
      <a
        className={`${styles.navbarGesc} navbar-brand col-3 col-md col-lg`}
        href="#test"
      >
        GESC
      </a>
      <div className="form-outline col-4 col-md-8 col-lg-5">
        <input
          type="search"
          id="form1"
          class="form-control"
          placeholder="Pesquisar evento"
          aria-label="Search"
        />
      </div>
      <button
        className={`${styles.navbarBotaoMob} navbar-toggler`}
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
          
          <div className={`${styles.fundoNavbarBotao} col-lg-4`}>
          <a className={`${styles.navbarBotao} teste`} href="#test">
            CRIAR EVENTO
          </a>
          </div>
          <div className={`${styles.fundoNavbarBotao} col-lg-4`}>
          <a className={`${styles.navbarBotao}`} href="#test">
            ACESSE SUA CONTA
          </a>
          </div>
          <div className={`${styles.fundoNavbarBotao} col-lg-4`}>
          <a className={`${styles.navbarBotao}`} href="#test">
            CADASTRE-SE
          </a>
          </div>
        </div>
      </div>
    </nav>
  );
}

export default NavbarComp;
