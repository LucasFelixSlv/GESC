import styles from '../styles/EventGroup.module.css'
import EventCard from "./EventCard"
// import im001 from '../imgs/im001.png'
import im002 from '../imgs/im002.jpg'
import im003 from '../imgs/im003.jpg'
import im004 from '../imgs/im004.jpg'
import im005 from '../imgs/im005.jpg'


function EventGroup(){
    return(
        <div className={`container mb-3`}>
            <div className={`row g-3 ${styles.mobileCenter}`}>
                <EventCard imagem={im005} titulo="Evento número 1" data="20/08"/>
                <EventCard imagem={im002} titulo="Evento número 2222222222222222222222222222222222222222222222222" data="21/08"/>
                <EventCard imagem={im003} titulo="Evento número 3" data="22/08"/>
                <EventCard imagem={im004} titulo="Evento número 4" data="23/08"/>
            </div>
        </div>
    );  
}

export default EventGroup;