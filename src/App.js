import "./App.css";
import MainCarousel from "./components/MainCarousel";
import ModalJs from "./components/ModalJS";
import NavbarComp from "./components/NavbarComp";

function App() {
  return (
    <div className="App">
      <NavbarComp />
      <MainCarousel/>
      <ModalJs/>
    </div>
  );
}

export default App;
