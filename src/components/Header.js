import styles from "../styles/Header.module.css";
import Menu from "./Menu";
import SearchBar from "./SearchBar";

function Header() {
  return (
    <header className="container-fluid ">
      <div className="row align-items-center">
        <h1 className={`${styles.gescLogo} col-3`}>GESC</h1>
        <div className="col-6">
          <SearchBar />
        </div>
        <div className="col-3">
          <Menu />
        </div>
      </div>
    </header>
  );
}

export default Header;
