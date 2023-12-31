import { useState } from 'react';
import Button from 'react-bootstrap/Button';
import Modal from 'react-bootstrap/Modal';
import styles from '../styles/ModalCard.module.css'

function ModalCard({ imagem, titulo, data, descricao }) {
    const [show, setShow] = useState(false);

    const handleClose = () => setShow(false);
    const handleShow = () => setShow(true);
    return (
        <>
            <button className={`${styles.buttonCard}`} onClick={handleShow}>Mais detalhes</button>
            <Modal
                show={show}
                onHide={handleClose}
                backdrop="static"
                keyboard={false}
                dialogClassName={styles.teste}
            >
                <Modal.Header closeButton >
                    <Modal.Title className={styles.titleModal}>{titulo}</Modal.Title>
                </Modal.Header>
                <Modal.Body>
                    <img src={imagem} className={`${styles.imageResize}`} alt={titulo} />
                    <p>{data}</p>
                    <p>{descricao}</p>
                </Modal.Body>
                <Modal.Footer>
                    <Button variant="secondary" onClick={handleClose}>
                        Close
                    </Button>
                    <Button variant="primary">Understood</Button>
                </Modal.Footer>
            </Modal>
        </>
    );
}

export default ModalCard;