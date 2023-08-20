import "./App.css";
import EventGroup from "./components/EventGroup";
import MainCarousel from "./components/MainCarousel";
import ModalJs from "./components/ModalJS";
import NavbarComp from "./components/NavbarComp";

function App() {
  return (
    <div className="App">
      <NavbarComp />
      <MainCarousel/>
      <ModalJs/>
      <EventGroup/>
    </div>
  );
}

export default App;
