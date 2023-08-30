import styles from "../styles/NavbarComp.module.css";

function NavbarCompLogged() {

  return (
    <>
      <nav className={`${styles.navbarBg} navbar navbar-expand-lg navbar-dark sticky-top`}>
        <button
          className={`${styles.navbarGesc} navbar-brand col-3 col-md col-lg`}
        >
          GESC
        </button>
        <div className="form-outline col-4 col-md-8 col-lg-7">
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

            <div className={`${styles.fundoNavbarButton} col-lg-6`}>
              <button className={`${styles.navbarButton} teste`}>
                CRIAR EVENTO
              </button>
            </div>
            <div className={`${styles.fundoNavbarButton} col-lg-6 dropdown`}>
              <button className={`${styles.navbarButton}`} data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                MINHA CONTA
              </button>
              <div className={`dropdown-menu ${styles.dropdownOptions}`}>
                <button className="dropdown-item" type="button">Ver notificações</button>
                <button className="dropdown-item" type="button">Opções</button>
                <button className="dropdown-item" type="button">Sair</button>
              </div>
            </div>
          </div>
        </div>
      </nav>
    </>
  );
}

export default NavbarCompLogged;

// className={`dropdown-menu d-flex justify-content-end flex-column`}