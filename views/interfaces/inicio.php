<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/inicio.css">
    <title>Inicio</title>
</head>

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        line-height: 1.6;
        background-color:rgb(255, 255, 255);
        color: #333;
    }
    header {
        background-color:rgb(63, 0, 0);
        color: #fff;
        padding: 10px 20px;
        text-align: center;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }

    header h2 {
        margin: 0;
        font-size: 1.8rem;
        text-transform: uppercase;
    }

    section {
        max-width: 800px;
        width: 90%;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .section-image {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .section-title {
        font-size: 1.5rem;
        font-weight: bold;
        color: white;
        margin-bottom: 10px;
        border-bottom: 2px solid #2c3e50;
        padding-bottom: 5px;
    }

    img {
        max-width: 100%;
        height: auto;
        border-radius: 10px;
    }
    p {
        text-align: justify;
        margin: 10px 0;
        line-height: 1.8;
    }

    ul {
        list-style-type: square;
        padding-left: 20px;
        margin: 10px 0;
    }

    ul li {
        margin: 5px 0;
    }

    strong {
        color: #e74c3c;
    }

    @media (max-width: 768px) {
        body {
            font-size: 0.9rem;
        }

        header h2 {
            font-size: 1.5rem;
        }

        .section-title {
            font-size: 1.3rem;
        }
    }
</style>

<body>
    <header>
        <h2>UNIVERSIDAD TÉCNICA DE AMBATO</h2>
    </header>
    <section>
        <section>
            <header class="section-title">MISIÓN</header>
            <p>
                Formar profesionales líderes competentes,
                con visión humanista y pensamiento crítico a
                través de la Docencia, la Investigación y la
                Vinculación, que apliquen, promuevan y
                difundan el conocimiento respondiendo a las
                necesidades del país.
            </p>
        </section>

        <section>
            <header class="section-title">VISIÓN</header>
            <p>
                La Universidad Técnica de Ambato por sus
                niveles de excelencia se constituirá como un
                centro de formación superior con liderazgo y
                proyección nacional e internacional.
            </p>
        </section>
        <picture class="section-image">
            <img src="https://csei.uta.edu.ec/csei2021/images/galeria-uta/facultad1.jpg"
                alt="Universidad Técnica de Ambato">
        </picture>
    </section>

    <header>
        <h2>CARRERA DE INGENIERIA EN SOFTWARE</h2>
    </header>
    <section>
        <section>
            <header class="section-title">MISIÓN</header>
            <p>
                Formar profesionales líderes competentes, con visión humanista y
                pensamiento crítico, a través de la Docencia, la Investigación y la
                Vinculación, que apliquen, promuevan y difundan el conocimiento
                respondiendo a las necesidades del país.
            </p>
        </section>

        <section>
            <header class="section-title">VISIÓN</header>
            <p>
                La carrera de Software de la Facultad de Ingeniería en Sistemas,
                Electrónica e Industrial de la Universidad Técnica de Ambato por
                sus niveles de excelencia, se constituirá como un centro de
                formación superior con liderazgo y proyección nacional e
                internacional.
            </p>
        </section>
        <picture>
            <img src="https://www.um.es/documents/1083928/40713896/ingenieria-software.jpg/ed5b47c2-e299-94d9-a01f-f5c5ff6d3144?t=1687936125102"
                alt="Facultad de Ingeniería en Sistemas, Electrónica e Industrial">
        </picture>
    </section>
    <header>
        <h2>COMPUTACIÓN VISUAL</h2>
    </header>
    <section>
        <section>
            <header class="section-title">OBJETIVOS</header>
            <ul>
                <li>Interpretar imágenes y comprender escenas visuales.</li>
                <li>Procesar datos visuales: mejorar y transformar imágenes.</li>
                <li>Reconocer patrones y clasificar objetos.</li>
                <li>Automatizar tareas como inspecciones visuales.</li>
                <li>Facilitar la interacción hombre-máquina mediante sistemas visuales.</li>
            </ul>
        </section>

        <section>
            <header class="section-title">APLICACIONES</header>
            <ul>
                <li><strong>Seguridad:</strong> reconocimiento facial y vigilancia.</li>
                <li><strong>Medicina:</strong> análisis de imágenes médicas y diagnósticos.</li>
                <li><strong>Automotriz:</strong> conducción autónoma y reconocimiento de señales.</li>
                <li><strong>Comercio:</strong> identificación de productos y análisis de clientes.</li>
                <li><strong>Agricultura:</strong> monitoreo de cultivos con drones.</li>
                <li><strong>Industria:</strong> control de calidad automatizado.</li>
                <li><strong>Entretenimiento:</strong> realidad virtual y juegos interactivos.</li>
                <li><strong>Robótica:</strong> visión para robots autónomos.</li>
                <li><strong>Ciencias:</strong> análisis de imágenes satelitales y telescópicas.</li>
            </ul>
        </section>
        <picture class="section-image">
            <img src="https://www.automaticaeinstrumentacion.com/images/showid2/6964624?w=900&mh=700"
                alt="Computación Visual">
        </picture>
    </section>
</body>

</html>
