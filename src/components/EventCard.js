import styles from '../styles/EventCard.module.css'

function EventCard({ imagem, titulo, data }) {
    return (
        <div className="col-10 col-md-6 col-lg-4">
            <div className={`${styles.roundCard} card h-100`}>
                <img className={`${styles.imageFit} card-img-top`} src={imagem} alt={titulo} />
                <div className={`${styles.infoCard} card-body`}>
                    <p className='m-0'>{data}</p>
                    <div className={`${styles.textCard}`}>
                    <h3 className={` card-title`}>{titulo}</h3>
                    </div>
                    <button className={`${styles.buttonCard}`}>Mais detalhes</button>
                </div>
            </div>
        </div>
    );
}

export default EventCard;