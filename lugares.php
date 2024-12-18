
<?php
// Incluye la conexión a la base de datos y las funciones CRUD
require 'database.php';
require 'lugares.php';

// Procesa las solicitudes POST para las operaciones CRUD
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["create"])) {
        createLugares($_POST["nombre"], $_POST["descripcion"], $_POST["ubicacion"], $_POST["nivelhistorico"],$_POST["restaurantes"],$_POST["tiendadesubenirs"]);
    } elseif (isset($_POST["update"])) {
        updateLugares($_POST["id"], $_POST["nombre"], $_POST["descripcion"], $_POST["ubicacion"], $_POST["nivelhistorico"],$_POST["restaurantes"],$_POST["tiendadesubenirs"]);
    } elseif (isset($_POST["delete"])) {
        deleteLugares($_POST["id"]);
    }
}

// Obtiene los destinos para mostrarlos en la tabla
$lugares = getLugares();
?>












<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lugares Turísticos</title>
    <link rel="stylesheet" href="styles1.css">
</head>
<body>
    <header>
        <h1>Lugares Turísticos en Yucatán</h1>
    </header>

    <section>
        <!-- Cuadro de Información sobre Chichen Itzá -->
        <div class="cuadro-lugar">
            <img src="chichen-itza.jpg" alt="Chichen Itzá" class="imagen-lugar">
            <h2>Chichen Itzá</h2>
            <p>Uno de los lugares más emblemáticos de Yucatán, conocido por su pirámide de Kukulkán.</p>

            <h3>Comida Típica</h3>
            <ul>
                <li>Poc Chuc</li>
                <li>Panuchos</li>
                <li>Relleno Negro</li>
            </ul>

            <h3>Cenotes</h3>
            <p>Sí, Chichen Itzá cuenta con varios cenotes cercanos, como el cenote Ik Kil.</p>

            <h3>Artesanías</h3>
            <p>Las artesanías incluyen hamacas, cerámica y joyería hecha a mano.</p>

            <h3>Restaurantes</h3>
            <ul>
                <li>La Tradición</li>
                <li>Los Almendros</li>
            </ul>
        </div>

        <!-- Cuadro de Información sobre el Cenote Sagrado -->
        <div class="cuadro-lugar">
            <img src="cenote-sagrado.jpg" alt="Cenote Sagrado" class="imagen-lugar">
            <h2>Cenote Sagrado</h2>
            <p>Un lugar místico rodeado de historia y belleza natural, donde los antiguos mayas realizaban rituales.</p>

            <h3>Comida Típica</h3>
            <ul>
                <li>Panuchos</li>
                <li>Cochinita Pibil</li>
            </ul>

            <h3>Cenotes</h3>
            <p>Sí, el Cenote Sagrado es uno de los más famosos de Yucatán.</p>

            <h3>Artesanías</h3>
            <p>Encuentra collares, figuras talladas en piedra y productos elaborados con fibras naturales.</p>

            <h3>Restaurantes</h3>
            <ul>
                <li>Café Popul Vuh</li>
                <li>Restaurant Mayab</li>
            </ul>
        </div>

        <!-- Cuadro de Información sobre la Reserva de la Biosfera de Celestún -->
        <div class="cuadro-lugar">
            <img src="celestun.jpg" alt="Reserva de la Biosfera de Celestún" class="imagen-lugar">
            <h2>Reserva de la Biosfera de Celestún</h2>
            <p>Un santuario natural donde puedes observar flamencos rosados y una gran variedad de flora y fauna.</p>

            <h3>Comida Típica</h3>
            <ul>
                <li>Pescado Tikin Xic</li>
                <li>Sopa de Lima</li>
            </ul>

            <h3>Cenotes</h3>
            <p>La reserva no tiene cenotes, pero está cerca de muchos ecosistemas acuáticos.</p>

            <h3>Artesanías</h3>
            <p>Productos elaborados en palma y madera, ideales para souvenirs.</p>

            <h3>Restaurantes</h3>
            <ul>
                <li>Restaurante Los Pampanos</li>
                <li>La Palapa de Celestún</li>
            </ul>
        </div>

        <!-- Cuadro de Información sobre Izamal -->
        <div class="cuadro-lugar">
            <img src="izamal.jpg" alt="Izamal" class="imagen-lugar">
            <h2>Izamal</h2>
            <p>Conocida como la "Ciudad Amarilla", es una pequeña ciudad llena de historia y cultura, famosa por su convento sobre una pirámide maya.</p>

            <h3>Comida Típica</h3>
            <ul>
                <li>Pollo Pibil</li>
                <li>Queso Relleno</li>
            </ul>

            <h3>Cenotes</h3>
            <p>Izamal tiene varios cenotes cercanos, perfectos para una excursión.</p>

            <h3>Artesanías</h3>
            <p>Hamacas, cestas, y ropa artesanal de algodón y lino.</p>

            <h3>Restaurantes</h3>
            <ul>
                <li>Restaurante Kinich</li>
                <li>Restaurante El Atrio</li>
            </ul>
        </div>

        <!-- Cuadro de Información sobre la Playa de Progreso -->
        <div class="cuadro-lugar">
            <img src="progreso.jpg" alt="Playa de Progreso" class="imagen-lugar">
            <h2>Playa de Progreso</h2>
            <p>La playa más cercana a la ciudad de Mérida, famosa por sus aguas cálidas y su malecón.</p>

            <h3>Comida Típica</h3>
            <ul>
                <li>Mariscos Frescos</li>
                <li>Ceviche</li>
            </ul>

            <h3>Cenotes</h3>
            <p>Alrededor de la playa se encuentran varios cenotes de agua dulce.</p>

            <h3>Artesanías</h3>
            <p>Artículos elaborados con conchas marinas y madera reciclada.</p>

            <h3>Restaurantes</h3>
            <ul>
                <li>Restaurante Eladio</li>
                <li>La Chaya Maya</li>
            </ul>
        </div>

        <!-- Cuadro de Información sobre Ek Balam -->
        <div class="cuadro-lugar">
            <img src="ek-balam.jpg" alt="Ek Balam" class="imagen-lugar">
            <h2>Ek Balam</h2>
            <p>Un sitio arqueológico maya donde se encuentran estructuras impresionantes y un gran mural.</p>

            <h3>Comida Típica</h3>
            <ul>
                <li>Cochinita Pibil</li>
                <li>Panuchos</li>
            </ul>

            <h3>Cenotes</h3>
            <p>Ek Balam está cerca de varios cenotes, como el cenote X'Canche.</p>

            <h3>Artesanías</h3>
            <p>Artesanías de piedra y cerámica, especialmente figuras mayas.</p>

            <h3>Restaurantes</h3>
            <ul>
                <li>Restaurante Los Arcos</li>
                <li>Restaurante Ek Balam</li>
            </ul>
        </div>

        <!-- Cuadro de Información sobre Tulum -->
        <div class="cuadro-lugar">
            <img src="tulum.jpg" alt="Tulum" class="imagen-lugar">
            <h2>Tulum</h2>
            <p>Famoso por sus ruinas mayas frente al mar Caribe, Tulum es uno de los destinos más hermosos de Yucatán.</p>

            <h3>Comida Típica</h3>
            <ul>
                <li>Filete de Pescado Tulum</li>
                <li>Sopa de Lima</li>
            </ul>

            <h3>Cenotes</h3>
            <p>Hay varios cenotes en Tulum, siendo uno de los más conocidos el cenote Dos Ojos.</p>

            <h3>Artesanías</h3>
            <p>Artesanías elaboradas con materiales locales como el coco y la piedra caliza.</p>

            <h3>Restaurantes</h3>
            <ul>
                <li>Restaurante El Camello Jr.</li>
                <li>La Nave Pizzeria</li>
            </ul>
        </div>

        <!-- Cuadro de Información sobre la Ruta Puuc -->
        <div class="cuadro-lugar">
            <img src="ruta-puuc.jpg" alt="Ruta Puuc" class="imagen-lugar">
            <h2>Ruta Puuc</h2>
            <p>Un recorrido por varios sitios arqueológicos de la región Puuc, donde se encuentran algunas de las estructuras mayas más interesantes.</p>

            <h3>Comida Típica</h3>
            <ul>
                <li>Sopa de Lima</li>
                <li>Poc Chuc</li>
            </ul>

            <h3>Cenotes</h3>
            <p>Varios cenotes están dispersos a lo largo de la ruta, como el cenote X-Batun.</p>

            <h3>Artesanías</h3>
            <p>Artesanías de barro, madera y textiles tradicionales.</p>

            <h3>Restaurantes</h3>
            <ul>
                <li>Restaurant X'Tan</li>
                <li>La Casa del Mago</li>
            </ul>
        </div>

        <!-- Cuadro de Información sobre Valladolil -->
        <div class="cuadro-lugar">
            <img src="valladolid.jpg" alt="Valladolid" class="imagen-lugar">
            <h2>Valladolid</h2>
            <p>Una pintoresca ciudad colonial llena de color, arte y cercanía a cenotes y ruinas.</p>

            <h3>Comida Típica</h3>
            <ul>
                <li>Queso Relleno</li>
                <li>Enchiladas Valladolid</li>
            </ul>

            <h3>Cenotes</h3>
            <p>Valladolid es famosa por su cercanía al cenote Zací y otros cenotes cercanos.</p>

            <h3>Artesanías</h3>
            <p>Textiles, hamacas y artesanías de piedra.</p>

            <h3>Restaurantes</h3>
            <ul>
                <li>Restaurante El Mesón del Marqués</li>
                <li>Restaurante La Casona de Valladolid</li>
            </ul>
        </div>

        <!-- Cuadro de Información sobre Cuzamá -->
        <div class="cuadro-lugar">
            <img src="cuzama.jpg" alt="Cuzamá" class="imagen-lugar">
            <h2>Cuzamá</h2>
            <p>Un pequeño pueblo famoso por su impresionante ruta de los tres cenotes en carreta.</p>

            <h3>Comida Típica</h3>
            <ul>
                <li>Cochinita Pibil</li>
                <li>Panuchos</li>
            </ul>

            <h3>Cenotes</h3>
            <p>Los tres cenotes de Cuzamá son: Chelentún, Choj Ha y Bolonchoojol.</p>

            <h3>Artesanías</h3>
            <p>Artesanías locales de madera y fibras naturales.</p>

            <h3>Restaurantes</h3>
            <ul>
                <li>La Casa de los Cenotes</li>
                <li>Restaurante Los Tres Cenotes</li>
            </ul>
        </div>

        <!-- Cuadro de Información sobre Uxmal -->
        <div class="cuadro-lugar">
            <img src="uxmal.jpg" alt="Uxmal" class="imagen-lugar">
            <h2>Uxmal</h2>
            <p>Una antigua ciudad maya famosa por sus templos y su arquitectura Puuc.</p>

            <h3>Comida Típica</h3>
            <ul>
                <li>Cochinita Pibil</li>
                <li>Panuchos</li>
            </ul>

            <h3>Cenotes</h3>
            <p>Cerca de Uxmal se encuentra el cenote X'batún y el cenote de la Caverna.</p>

            <h3>Artesanías</h3>
            <p>Artesanías mayas y productos elaborados en piedra.</p>

            <h3>Restaurantes</h3>
            <ul>
                <li>Restaurante Uxmal</li>
                <li>Restaurant El Mago</li>
            </ul>
        </div>

    </section>

    <a href="index.html">Volver al Inicio</a>
</body>
</html>


<div id="crud" class="section">
    <h2>Administración de Lugares Turisticos</h2>

    <h3>Agregar Lugares</h3>
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
        <label>NivelHistorico: <input type="text" name="nivelhistorico" required></label>
        <label>Restaurantes: <input type="text" name="restaurantes" required></label>
        <label>Tiendadesubenirs: <input type="text" name="tiendadesubenirs" required></label>
        <button type="submit" name="create">Agregar</button>
    </form>

    <h3>Actualizar Lugares</h3>
    <form method="post">
        <label>ID: <input type="number" name="id" required></label>
        <label>Nombre: <input type="text" name="nombre" required></label>
        <label>Descripción: <textarea name="descripcion" required></textarea></label>
        <label>Ubicación: <input type="text" name="ubicacion" required></label>
        <label>NivelHistorico: <input type="text" name="nivelhistorico" required></label>
        <label>Restaurantes: <input type="text" name="restaurantes" required></label>
        <label>Tiendadesubenirs: <input type="text" name="tiendadesubenirs" required></label>
        <button type="submit" name="update">Actualizar</button>
    </form>

    <h3>Eliminar Lugares</h3>
    <form method="post">
        <label>ID: <input type="number" name="id" required></label>
        <button type="submit" name="delete">Eliminar</button>
    </form>

    <h3>Lista de Lugares Turisticos</h3>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Ubicación</th>
                <th>NivelHistorico</th>
                <th>Restaurantes</th>
                <th>Tiendadesubenirs</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($lugares as $lugares): ?>
            <tr>
                <td><?php echo $lugares["id"]; ?></td>
                <td><?php echo $lugares["nombre"]; ?></td>
                <td><?php echo $lugares["descripcion"]; ?></td>
                <td><?php echo $lugares["ubicacion"]; ?></td>
                <td><?php echo $lugares["nivelhistorico"]; ?></td>
                <td><?php echo $lugares["restaurantes"]; ?></td>
                <td><?php echo $lugares["tiendadesubenirs"]; ?></td>