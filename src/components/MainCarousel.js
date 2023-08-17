import styles from '../styles/MainCarousel.module.css'
import img004 from '../imgs/im004.jpg'
import CarouselEvent from './CarouselEvent';


function MainCarousel() {
  return (
    <div className={styles.carouselMargin}>
      <div id="carouselExampleIndicators" className={`${styles.carouselContent} carousel slide`}>
        <div className="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" className={`${styles.carouselIndicators} active`} aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" className={styles.carouselIndicators} aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" className={styles.carouselIndicators} aria-label="Slide 3"></button>
        </div>
        <div className={`${styles.carouselBorder} carousel-inner`}>
          <div class="carousel-item active">
            <CarouselEvent img={img004} titulo="Evento 1"/>
          </div>
          <div class="carousel-item">
            <CarouselEvent img={img004} titulo="Evento 2"/>
          </div>
          <div class="carousel-item">
            <CarouselEvent img={img004} titulo="Evento 3"/>
          </div>
        </div>
        <div className={styles.hideControls}>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span className={`${styles.carouselArrowPrev} carousel-control-prev-icon`} aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span className={`${styles.carouselArrowNext} carousel-control-next-icon`} aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
        </div>
      </div>
    </div>
  );
}

export default MainCarousel;