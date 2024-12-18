
<?php
// Incluye la conexión a la base de datos y las funciones CRUD
require 'database.php';
require 'hoteles.php';

// Procesa las solicitudes POST para las operaciones CRUD
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["create"])) {
        createHoteles($_POST["nombre"], $_POST["descripcion"], $_POST["ubicacion"], $_POST["preciopornoche"],$_POST["restaurantes"],$_POST["horario"]);
    } elseif (isset($_POST["update"])) {
        updateHoteles($_POST["id"], $_POST["nombre"], $_POST["descripcion"], $_POST["ubicacion"], $_POST["preciopornoche"],$_POST["restaurantes"],$_POST["horario"]);
    } elseif (isset($_POST["delete"])) {
        deleteHoteles($_POST["id"]);
    }
}

// Obtiene los destinos para mostrarlos en la tabla
$hoteles = getHoteles();
?>




<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hoteles en Yucatán</title>
    <link rel="stylesheet" href="styles1.css">
    <style>
        /* Estilos para las columnas de los hoteles */
        .hoteles-container {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            margin: 20px;
            flex-wrap: wrap;
        }

        .hotel-cuadro {
            border: 2px solid #f08080;
            border-radius: 10px;
            padding: 20px;
            width: 45%;
            background-color: #fff;
            margin-bottom: 20px;
        }

        .hotel-cuadro img {
            width: 100%;
            border-radius: 10px;
        }

        .rating {
            color: gold;
            font-size: 18px;
        }

        .button {
            background-color: #f08080;
            padding: 10px;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 10px;
        }

        .button:hover {
            background-color: #ff7f7f;
        }

        .formulario {
            margin-top: 20px;
        }

        .formulario input, .formulario textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
        }

        .formulario button {
            background-color: #f08080;
            padding: 10px 20px;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .formulario button:hover {
            background-color: #ff7f7f;
        }

        .volver-inicio {
            text-align: center;
            margin-top: 40px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Hoteles Recomendados en Yucatán</h1>
    </header>

    <!-- Sección de los primeros 3 hoteles -->
    <section class="hoteles-container">
        <!-- Cuadro del primer hotel (izquierda) -->
        <div class="hotel-cuadro">
            <h3>Hotel Gran Yucatán</h3>
            <img src="hotelgranyucatan.jpg" alt="Hotel Gran Yucatán">
            <p>Un hotel de lujo en Mérida.</p>
            <p>Precio por noche: $100 USD | Restaurante y Piscina: Sí</p>
            <p>Horario: 24 horas</p>
            <div class="rating">★★★★☆</div>

            <!-- Formulario para calificación y comentario -->
            <div class="formulario">
                <h4>Califica este hotel</h4>
                <label for="rating1">Estrellas:</label>
                <input type="number" id="rating1" name="rating1" min="1" max="5" placeholder="1-5 estrellas">
                <label for="comment1">Comentario:</label>
                <textarea id="comment1" name="comment1" rows="4" placeholder="Escribe tu comentario aquí..."></textarea>
                <button type="submit">Enviar Comentario</button>
            </div>
        </div>

        <!-- Cuadro del segundo hotel (derecha) -->
        <div class="hotel-cuadro">
            <h3>Hotel Hacienda Xcanatun</h3>
            <img src="hotel-hacienda-xcanatun.jpg" alt="Hotel Hacienda Xcanatun">
            <p>Un hotel colonial con un hermoso paisaje natural.</p>
            <p>Precio por noche: $120 USD | Restaurante y Piscina: Sí</p>
            <p>Horario: 24 horas</p>
            <div class="rating">★★★★★</div>

            <!-- Formulario para calificación y comentario -->
            <div class="formulario">
                <h4>Califica este hotel</h4>
                <label for="rating2">Estrellas:</label>
                <input type="number" id="rating2" name="rating2" min="1" max="5" placeholder="1-5 estrellas">
                <label for="comment2">Comentario:</label>
                <textarea id="comment2" name="comment2" rows="4" placeholder="Escribe tu comentario aquí..."></textarea>
                <button type="submit">Enviar Comentario</button>
            </div>
        </div>
    </section>

    <!-- Sección de los siguientes 3 hoteles -->
    <section class="hoteles-container">
        <!-- Cuadro del tercer hotel (izquierda) -->
        <div class="hotel-cuadro">
            <h3>Hotel Casa Blanca Boutique</h3>
            <img src="hotelcasablancaboutique.jpg" alt="Hotel Casa Blanca Boutique">
            <p>Un pequeño pero encantador hotel en el centro de Mérida.</p>
            <p>Precio por noche: $80 USD | Restaurante y Piscina: No</p>
            <p>Horario: 24 horas</p>
            <div class="rating">★★★☆☆</div>

            <!-- Formulario para calificación y comentario -->
            <div class="formulario">
                <h4>Califica este hotel</h4>
                <label for="rating3">Estrellas:</label>
                <input type="number" id="rating3" name="rating3" min="1" max="5" placeholder="1-5 estrellas">
                <label for="comment3">Comentario:</label>
                <textarea id="comment3" name="comment3" rows="4" placeholder="Escribe tu comentario aquí..."></textarea>
                <button type="submit">Enviar Comentario</button>
            </div>
        </div>

        <!-- Cuadro del cuarto hotel (derecha) -->
        <div class="hotel-cuadro">
            <h3>Hotel The Royal Palms</h3>
            <img src="hotelroyalpalms.jpg" alt="Hotel The Royal Palms">
            <p>Un resort de lujo ideal para una experiencia relajante.</p>
            <p>Precio por noche: $150 USD | Restaurante y Piscina: Sí</p>
            <p>Horario: 24 horas</p>
            <div class="rating">★★★★★</div>

            <!-- Formulario para calificación y comentario -->
            <div class="formulario">
                <h4>Califica este hotel</h4>
                <label for="rating4">Estrellas:</label>
                <input type="number" id="rating4" name="rating4" min="1" max="5" placeholder="1-5 estrellas">
                <label for="comment4">Comentario:</label>
                <textarea id="comment4" name="comment4" rows="4" placeholder="Escribe tu comentario aquí..."></textarea>
                <button type="submit">Enviar Comentario</button>
            </div>
        </div>
    </section>

    <!-- Sección de los 3 últimos hoteles -->
    <section class="hoteles-container">
        <!-- Cuadro del quinto hotel (izquierda) -->
        <div class="hotel-cuadro">
            <h3>Hotel Boutique Casa Azul</h3>
            <img src="hotelboutiquecasaazul.jpg" alt="Hotel Boutique Casa Azul">
            <p>Un hotel boutique con un diseño único en el corazón de Mérida.</p>
            <p>Precio por noche: $110 USD | Restaurante y Piscina: Sí</p>
            <p>Horario: 24 horas</p>
            <div class="rating">★★★★☆</div>

            <!-- Formulario para calificación y comentario -->
            <div class="formulario">
                <h4>Califica este hotel</h4>
                <label for="rating5">Estrellas:</label>
                <input type="number" id="rating5" name="rating5" min="1" max="5" placeholder="1-5 estrellas">
                <label for="comment5">Comentario:</label>
                <textarea id="comment5" name="comment5" rows="4" placeholder="Escribe tu comentario aquí..."></textarea>
                <button type="submit">Enviar Comentario</button>
            </div>
        </div>

        <!-- Cuadro del sexto hotel (derecha) -->
        <div class="hotel-cuadro">
            <h3>Hotel El Moloch</h3>
            <img src="hotelelmoloch.jpg" alt="Hotel El Moloch">
            <p>Un hotel acogedor cerca de los cenotes de Yucatán.</p>
            <p>Precio por noche: $90 USD | Restaurante y Piscina: Sí</p>
            <p>Horario: 24 horas</p>
            <div class="rating">★★★☆☆</div>

            <!-- Formulario para calificación y comentario -->
            <div class="formulario">
                <h4>Califica este hotel</h4>
                <label for="rating6">Estrellas:</label>
                <input type="number" id="rating6" name="rating6" min="1" max="5" placeholder="1-5 estrellas">
                <label for="comment6">Comentario:</label>
                <textarea id="comment6" name="comment6" rows="4" placeholder="Escribe tu comentario aquí..."></textarea>
                <button type="submit">Enviar Comentario</button>
            </div>
        </div>
    </section>

    <!-- Opción para volver al inicio -->
    <div class="volver-inicio">
        <a href="index.html" class="button">Volver al Inicio</a>
    </div>

</body>
</html>

<div id="crud" class="section">
    <h2>Administración de Hoteles</h2>

    <h3>Agregar Hoteles</h3>
    <form method="post">
        <label>Nombre: <input type="text" name="nombre" required></label>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>
    function showSection(sectionId) {
        const sections = document.querySelectorAll('.section');
        sections.forEach(section => section.style.display = 'none');
        document.getElementById(sectionId).style.display = 'block';
    }
</script>

</body>
</html>        <label>Descripción: <textarea name="descripcion" required></textarea></label>
        <label>Ubicación: <input type="text" name="ubicacion" required></label>
        <label>PrecioPorNoche: <input type="number" step="0.01" name="preciopornoche" required></label>
        <label>Restaurantes: <input type="text" name="restaurantes" required></label>
        <label>Horario: <input type="varchar" name="horario" required></label>
        <button type="submit" name="create">Agregar</button>
    </form>

    <h3>Actualizar Hoteles</h3>
    <form method="post">
        <label>ID: <input type="number" name="id" required></label>
        <label>Nombre: <input type="text" name="nombre" required></label>
        <label>Descripción: <textarea name="descripcion" required></textarea></label>
        <label>Ubicación: <input type="text" name="ubicacion" required></label>
        <label>PrecioPorNoche: <input type="number" step="0.01" name="preciopornoche" required></label>
        <label>Restaurantes: <input type="text" name="restaurantes" required></label>
        <label>Horario: <input type="varchar" name="horario" required></label>
        <button type="submit" name="update">Actualizar</button>
    </form>

    <h3>Eliminar Hoteles</h3>
    <form method="post">
        <label>ID: <input type="number" name="id" required></label>
        <button type="submit" name="delete">Eliminar</button>
    </form>

    <h3>Lista de Hoteles</h3>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Ubicación</th>
                <th>PrecioPorNoche</th>
                <th>Restaurantes</th>
                <th>Horario</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($hoteles as $hoteles): ?>
            <tr>
                <td><?php echo $hoteles["id"]; ?></td>
                <td><?php echo $hoteles["nombre"]; ?></td>
                <td><?php echo $hoteles["descripcion"]; ?></td>
                <td><?php echo $hoteles["ubicacion"]; ?></td>
                <td><?php echo $hoteles["preciopornoche"]; ?></td>
                <td><?php echo $hoteles["restaurantes"]; ?></td>
                <td><?php echo $hoteles["horario"]; ?></td>