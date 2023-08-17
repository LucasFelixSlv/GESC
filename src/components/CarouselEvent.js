function CarouselEvent({img, titulo}) {
    return (
        <>
            <img src={img} class="d-block w-100" alt={titulo} />
        </>
    )
}

export default CarouselEvent;