import styles from '../styles/EventGroup.module.css'
import EventCard from "./EventCard"
// import im001 from '../imgs/im001.png'
import im002 from '../imgs/im002.jpg'
import im003 from '../imgs/im003.jpg'
import im004 from '../imgs/im004.jpg'
import im005 from '../imgs/im005.jpg'
import DateSelect from './DateSelect'


function EventGroup() {
    return (
        <div className={`container mb-3`}>
            <div className='p-relative'>
                <h2 className={styles.nextEvents}>PRÓXIMOS EVENTOS</h2>
                <div className={styles.divDateSelect}>
                    <DateSelect />
                </div>
            </div>
            <div className={`row g-3 ${styles.mobileCenter}`}>
                <EventCard imagem={im005} titulo="Evento número 1" data="20/08" descricao="Laborum eu quis amet elit sit occaecat aute quis id enim nisi nulla ad." />
                <EventCard imagem={im002} titulo="Evento número 222222222222222222222222222222" data="21/08" descricao="Labore laborum non consequat reprehenderit."/>
                <EventCard imagem={im003} titulo="Evento número 3" data="22/08" descricao="Occaecat anim ipsum nisi sit aliquip anim sit officia."/>
                <EventCard imagem={im004} titulo="Evento número 4" data="23/08" descricao="Eu et velit ullamco incididunt elit ex sit et tempor do aute aliquip."/>
            </div>
        </div>
    );
}

export default EventGroup;