import Carousel from 'react-bootstrap/Carousel';
// import ExampleCarouselImage from 'components/ExampleCarouselImage';
import im001 from '../imgs/im001.png';
import im002 from '../imgs/im002.jpg';
import im003 from '../imgs/im003.jpg';
// import styles from '../styles/MainCarousel.module.css'


function MainCarousel() {
  return (
    <Carousel>
      <Carousel.Item>
      <img src={im001} alt="" className={`d-block w-100 img-fluid`} text="First slide" />
        <Carousel.Caption>
          <h3>First slide label</h3>
          <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
        </Carousel.Caption>
      </Carousel.Item>
      <Carousel.Item>
      <img src={im002} className={`d-block w-100 img-fluid`} alt="" text="First slide" />
        <Carousel.Caption>
          <h3>Second slide label</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </Carousel.Caption>
      </Carousel.Item>
      <Carousel.Item>
      <img src={im003} className={`d-block w-100 img-fluid`} alt="" text="First slide" />
        <Carousel.Caption>
          <h3>Third slide label</h3>
          <p>
            Praesent commodo cursus magna, vel scelerisque nisl consectetur.
          </p>
        </Carousel.Caption>
      </Carousel.Item>
    </Carousel>
  );
}

export default MainCarousel;
//     <div className={``}>
//     <div id="carouselExampleIndicators" className={`${styles.carouselPosition} carousel slide`} data-bs-ride="carousel">
//   <div className={`${styles.carouselBar} carousel-indicators`}>
//     <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" className={`${styles.carouselBarButton} active`} aria-current="true" aria-label="Slide 1"></button>
//     <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" className={`${styles.carouselBarButton}`} aria-label="Slide 2"></button>
//     <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" className={`${styles.carouselBarButton}`} aria-label="Slide 3"></button>
//   </div>
  
//   <div className={`${styles.carouselContent} carousel-inner`}>
//     <div className="carousel-item active">
//       <img src="https://placehold.co/1900x500" className="" alt="..."/>
//     </div>
//     <div className="carousel-item">
//       <img src="https://placehold.co/700x400" className="" alt="..."/>
//     </div>
//     <div className="carousel-item">
//       <img src="https://placehold.co/700x400" className="" alt="..."/>
//     </div>
//   </div>
//   <button className="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
//     <span className="carousel-control-prev-icon" aria-hidden="true"></span>
//     <span className="visually-hidden">Previous</span>
//   </button>
//   <button className="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
//     <span className="carousel-control-next-icon" aria-hidden="true"></span>
//     <span className="visually-hidden">Next</span>
//   </button>
//   </div>
// </div>
//   );
// }

// export default MainCarousel;
