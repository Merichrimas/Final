<?php
// Incluye la conexión a la base de datos y las funciones CRUD
require 'database.php';
require 'destinos.php';
require 'hoteles.php';
require 'lugares.php';
require 'guias.php';

// Procesa las solicitudes POST para las operaciones CRUD
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["create"])) {
        createDestino($_POST["nombre"], $_POST["descripcion"], $_POST["ubicacion"], $_POST["precio_estimado"]);
    } elseif (isset($_POST["update"])) {
        updateDestino($_POST["id"], $_POST["nombre"], $_POST["descripcion"], $_POST["ubicacion"], $_POST["precio_estimado"]);
    } elseif (isset($_POST["delete"])) {
        deleteDestino($_POST["id"]);
    }
}

// Obtiene los destinos para mostrarlos en la tabla
$destinos = getDestinos();
?>


// Procesa las solicitudes POST para las operaciones CRUD
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["create"])) {
        createGuias($_POST["nombre"], $_POST["descripcion"], $_POST["edad], $_POST["idiomas"],$_POST["especialidad"],$_POST["horario"]);
    } elseif (isset($_POST["update"])) {
        updateGuias($_POST["id"], $_POST["nombre"], $_POST["descripcion"], $_POST["edad], $_POST["idiomas"],$_POST["especialidad"],$_POST["horario"]);
        deleteGuias($_POST["id"]);
    }
}

// Obtiene los destinos para mostrarlos en la tabla
$guias = getGuias();
?>

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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turismo en Yucatán</title>
    <link rel="stylesheet" href="styles1.css">
</head>
<body onload="verificarAcceso()">
    <audio autoplay loop>
        <source src="Aires Del Mayab-Estela Núñez.mp3" type="audio/mp3">
    </audio>

    <header>
        <h1>Explora Yucatán</h1>
        <p>¡Descubre los encantos, la cultura y la historia de Yucatán!</p>
    </header>

    <nav>
        <a href="lugares.html">Lugares Turísticos</a>
        <a href="hoteles.html">Hoteles</a>
        <a href="guias.html">Guías</a>
        <a href="destinos.html">Destinos</a>
        <a href="juego.html">Juego De Preguntas</a>
        <a href="comentarios.html">Comentarios</a>
    </nav>

    <section>
        <h2>Lugares Lindos De Yucatán</h2>
        <table>
            <thead>
                <tr>
                    <th>Lugar</th>
                    <th>Descripción</th>
                    <th>Imagen</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Chichén Itzá</td>
                    <td>Una de las siete maravillas del mundo moderno y una joya arqueológica de la cultura maya.</td>
                    <td><img src="chichen-itza.jpg" alt="Chichén Itzá" width="150"></td>
                </tr>
                <tr>
                    <td>Cenote Ik Kil</td>
                    <td>Un cenote majestuoso rodeado de exuberante vegetación y cascadas naturales.</td>
                    <td><img src="cenote-ik-kil.jpg" alt="Cenote Ik Kil" width="150"></td>
                </tr>
                <tr>
                    <td>Mérida</td>
                    <td>La capital cultural de Yucatán, conocida por su arquitectura colonial y tradiciones.</td>
                    <td><img src="merida.jpg" alt="Mérida" width="150"></td>
                </tr>
                <tr>
                    <td>Uxmal</td>
                    <td>Un impresionante sitio arqueológico maya, famoso por su arquitectura Puuc.</td>
                    <td><img src="uxmal.jpg" alt="Uxmal" width="150"></td>
                </tr>
                <tr>
                    <td>Cenote Suytun</td>
                    <td>Un cenote único con una plataforma que parece flotar sobre el agua cristalina.</td>
                    <td><img src="cenote-suytun.jpg" alt="Cenote Suytun" width="150"></td>
                </tr>
                <tr>
                    <td>Celestún</td>
                    <td>Una reserva natural famosa por sus flamencos rosados y paisajes costeros.</td>
                    <td><img src="celestun.jpg" alt="Celestún" width="150"></td>
                </tr>
                <tr>
                    <td>Valladolid</td>
                    <td>Un pintoresco pueblo mágico con calles coloniales y cenotes cercanos.</td>
                    <td><img src="valladolid.jpg" alt="Valladolid" width="150"></td>
                </tr>
                <tr>
                    <td>Izamal</td>
                    <td>Conocido como la "Ciudad de las Tres Culturas" y famoso por sus edificios amarillos.</td>
                    <td><img src="izamal.jpg" alt="Izamal" width="150"></td>
                </tr>
                <tr>
                    <td>Playa Progreso</td>
                    <td>Una hermosa playa cercana a Mérida, ideal para relajarse y disfrutar del mar.</td>
                    <td><img src="progreso.jpg" alt="Playa Progreso" width="150"></td>
                </tr>
                <tr>
                    <td>Ek Balam</td>
                    <td>Un sitio arqueológico con una de las estructuras mayas mejor conservadas.</td>
                    <td><img src="ek-balam.jpg" alt="Ek Balam" width="150"></td>
                </tr>
                <tr>
                    <td>Grutas de Loltún</td>
                    <td>Fascinantes cuevas con arte rupestre y formaciones naturales espectaculares.</td>
                    <td><img src="loltun.jpg" alt="Grutas de Loltún" width="150"></td>
                </tr>
                <tr>
                    <td>Ría Lagartos</td>
                    <td>Una reserva natural que alberga una increíble diversidad de fauna, incluyendo flamencos.</td>
                    <td><img src="ria-lagartos.jpg" alt="Ría Lagartos" width="150"></td>
                </tr>
                <tr>
                    <td>Hacienda Yaxcopoil</td>
                    <td>Una hacienda histórica que ofrece una visión del pasado henequenero de Yucatán.</td>
                    <td><img src="yaxcopoil.jpg" alt="Hacienda Yaxcopoil" width="150"></td>
                </tr>
            </tbody>
        </table>
    </section>

    <section class="imagenes-laterales">
        <div class="imagen-lateral">
            <img src="flamencos.png" alt="Flamencos" />
        </div>
        <div class="imagen-central">
            <img src="las-coloradas.jpg" alt="Las Coloradas" />
        </div>
        <div class="imagen-lateral">
            <img src="flamencos.png" alt="Flamencos" />
        </div>

    </section>
    
    <!-- Título y descripción de Las Coloradas -->
    <section class="descripcion-coloradas">
        <h3>Las Coloradas</h3>
        <p>
            Las Coloradas es un lugar único en Yucatán, famoso por sus lagunas rosas
            que son resultado de la alta concentración de sal y microorganismos.
            Es un destino ideal para los amantes de la naturaleza y la fotografía,
            rodeado de paisajes impresionantes y flamencos.
        </p>
    </section>

    <section class="cuadro-lugares">
        <h2>Lugares Más Lindos y Con Riqueza Cultural de Yucatán</h2>
        <div class="contenido-cuadro">
            <video controls>
                <source src="15 mejores lugares turísticos de Yucatán.mp4" type="video/mp4">
            </video>
            <p>
                Yucatán es un estado lleno de historia y belleza natural. Desde las antiguas ruinas mayas de Chichen Itzá,
                hasta sus hermosas playas y selvas, cada rincón de Yucatán ofrece una mezcla perfecta de cultura, historia
                y belleza. No te puedes perder los cenotes, las haciendas y los coloridos pueblos que hacen de este lugar
                un destino único en México.
            </p>
        </div>
    </section>
    
    <!-- Cuadro 2: Los Lindos Cantos de Yucatán -->
    <section class="cuadro-cantos">
        <h2>Estos Son Los Lindos Cantos de Yucatán</h2>
        <div class="contenido-cuadro">
            <video controls>
                <source src="Aires Del Mayab-Estela Núñez.mp3" type="audio/mp3">
            </video>
            <p>
                La música tradicional de Yucatán es un tesoro que combina influencias mayas con la música española. Los
                cantos, danzas y sonidos de marimba acompañan a las festividades locales y son un reflejo del alma
                yucateca. Escuchar estos cantos es como sumergirse en una atmósfera mágica llena de historia y emoción.
            </p>
        </div>
    </section>
</body>
</html>


<div id="crud" class="section">
    <h2>Administración de Destinos Turísticos</h2>

    <h3>Agregar Destino</h3>
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
        <label>Precio Estimado: <input type="number" step="0.01" name="precio_estimado" required></label>
        <button type="submit" name="create">Agregar</button>
    </form>

    <h3>Actualizar Destino</h3>
    <form method="post">
        <label>ID: <input type="number" name="id" required></label>
        <label>Nombre: <input type="text" name="nombre" required></label>
        <label>Descripción: <textarea name="descripcion" required></textarea></label>
        <label>Ubicación: <input type="text" name="ubicacion" required></label>
        <label>Precio Estimado: <input type="number" step="0.01" name="precio_estimado" required></label>
        <button type="submit" name="update">Actualizar</button>
    </form>

    <h3>Eliminar Destino</h3>
    <form method="post">
        <label>ID: <input type="number" name="id" required></label>
        <button type="submit" name="delete">Eliminar</button>
    </form>

    <h3>Lista de Destinos Turísticos</h3>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Ubicación</th>
                <th>Precio Estimado</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($destinos as $destino): ?>
            <tr>
                <td><?php echo $destino["id"]; ?></td>
                <td><?php echo $destino["nombre"]; ?></td>
                <td><?php echo $destino["descripcion"]; ?></td>
                <td><?php echo $destino["ubicacion"]; ?></td>
                <td><?php echo $destino["precio_estimado"]; ?></td>


                <div id="crud" class="section">
                    <h2>Administración de Guias Turisticos</h2>
                
                    <h3>Agregar Guias</h3>
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
                        <label>Edad: <input type="text" name="edad" required></label>
                        <label>Idiomas: <input type="text"  name="idiomas" required></label>
                        <label>Especialidad: <input type="text" name="especialidad" required></label>
                        <label>Horario: <input type="varchar" name="horario" required></label>
                        <button type="submit" name="create">Agregar</button>
                    </form>
                
                    <h3>Actualizar Guias</h3>
                    <form method="post">
                        <label>ID: <input type="number" name="id" required></label>
                        <label>Nombre: <input type="text" name="nombre" required></label>
                        <label>Descripción: <textarea name="descripcion" required></textarea></label>
                        <label>Edad: <input type="text" name="edad" required></label>
                        <label>Idiomas: <input type="text"  name="idiomas" required></label>
                        <label>Especialidad: <input type="text" name="especialidad" required></label>
                        <label>Horario: <input type="varchar" name="horario" required></label>
                        <button type="submit" name="update">Actualizar</button>
                    </form>
                
                    <h3>Eliminar Guias</h3>
                    <form method="post">
                        <label>ID: <input type="number" name="id" required></label>
                        <button type="submit" name="delete">Eliminar</button>
                    </form>
                
                    <h3>Lista de Guias de Turismo</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Edad</th>
                                <th>Idiomas</th>
                                <th>Especialidad</th>
                                <th>Horario</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($guias as $guias): ?>
                            <tr>
                                <td><?php echo $guias["id"]; ?></td>
                                <td><?php echo $guias["nombre"]; ?></td>
                                <td><?php echo $guias["descripcion"]; ?></td>
                                <td><?php echo $guias["edad"]; ?></td>
                                <td><?php echo $guias["idiomas"]; ?></td>
                                <td><?php echo $guias["especialidad"]; ?></td>
                                <td><?php echo $guias["horario"]; ?></td>
                

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
                                                
                                                
                                                