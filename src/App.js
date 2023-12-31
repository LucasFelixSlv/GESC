import "./App.css";
import EventGroup from "./components/EventGroup";
import Footer from "./components/Footer";
import MainCarousel from "./components/MainCarousel";
import NavbarComp from "./components/NavbarComp";
import NavbarCompLogged from "./components/NavbarCompLogged";

function App() {
  return (
    <div className="App">
      {/* <NavbarComp /> */}
      <NavbarCompLogged/>
      <MainCarousel/>
      <div className="barDiv"></div>
      <EventGroup/>
      <Footer/>
    </div>
  );
}

export default App;
