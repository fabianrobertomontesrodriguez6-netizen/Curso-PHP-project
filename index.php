<?php

#inicializando una nueva sesion

const API_URL = "https://whenisthenextmcufilm.com/api";
$ch = curl_init(API_URL);

#Indicando que se desea recibir el resultado de la peticion y no ostrarla en pantalla

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

#ejecutar la peticion y guardar el resultado

$result = file_get_contents(API_URL);

$data = json_decode($result, true);
curl_close($ch);

?>
<meta charset="UTF-8" />
<head>
    <title>La nueva pelicula de Marvel</title>
    <meta name="description" content= "La nueva pelicula de Marvel" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link 
    rel="stylesheet" 
    href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
    />
</head>
<main>
    <pre style="font-size: 8px overflow: scroll: height: 100px">
    <section>
        <img src="<?php echo $data["poster_url"]; ?>" width="200" alt="Poster de <?php echo $data["title"]; ?>" />
    </section>

    <hgroup>
        <h1><?php echo $data["title"]; ?></h1>
        <h2>Fecha de estreno: <?php echo $data["release_date"]; ?></h2>
        <h3>Proxima pelicula: <?php echo $data["following_production"]["title"]; ?></h3>
    </hgroup>
</main>

<style>
    :root {
        color-scheme: light dark;
    }

    body {
        display: grid;
        place-content: center;
    }
    img {
        margin: 0 auto;
    }
    section {
        display: flex;
        justify-content: center;
        text-align: center;
    }
    hgroup {
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
    }
</style>
