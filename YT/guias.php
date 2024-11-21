
<?php
// Incluye la conexión a la base de datos y las funciones CRUD
require 'database.php';
require 'guias.php';

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



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guías Turísticas</title>
    <link rel="stylesheet" href="styles1.css">
    <style>
        /* Estilos para la organización de los cuadros de guías */
        .guia-container {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            margin: 20px;
            flex-wrap: wrap;
        }

        .guia-cuadro {
            border: 2px solid #f08080;
            border-radius: 10px;
            padding: 20px;
            width: 45%;
            background-color: #fff;
            margin-bottom: 20px;
            box-sizing: border-box;
        }

        .guia-cuadro img {
            width: 100%;
            height: auto;
            border-radius: 10px;
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

        .guia-cuadro h3 {
            margin-top: 10px;
        }

        .guia-cuadro p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <header>
        <h1>Guías Expertos</h1>
    </header>

    <!-- Sección de los primeros guías -->
    <section class="guia-container">
        <!-- Primer guía (izquierda) -->
        <div class="guia-cuadro">
            <img src="hombre.jpg" alt="Guía Carlos Pérez">
            <h3>Guía Carlos Pérez</h3>
            <p><strong>Especialidad:</strong> Zonas arqueológicas</p>
            <p><strong>Idiomas:</strong> Español, Inglés</p>
            <p><strong>Edad:</strong> 35 años</p>
            <p><strong>Horario:</strong> 9 am - 6 pm</p>
        </div>

        <!-- Segundo guía (derecha) -->
        <div class="guia-cuadro">
            <img src="mujer.jpg" alt="Guía Ana Rodríguez">
            <h3>Guía Ana Rodríguez</h3>
            <p><strong>Especialidad:</strong> Cultura y tradiciones</p>
            <p><strong>Idiomas:</strong> Español, Francés</p>
            <p><strong>Edad:</strong> 28 años</p>
            <p><strong>Horario:</strong> 10 am - 5 pm</p>
        </div>
    </section>

    <!-- Sección de los siguientes guías -->
    <section class="guia-container">
        <!-- Tercer guía (izquierda) -->
        <div class="guia-cuadro">
            <img src="hombre.jpg" alt="Guía Luis Gómez">
            <h3>Guía Luis Gómez</h3>
            <p><strong>Especialidad:</strong> Naturaleza y fauna</p>
            <p><strong>Idiomas:</strong> Español, Inglés, Italiano</p>
            <p><strong>Edad:</strong> 42 años</p>
            <p><strong>Horario:</strong> 8 am - 4 pm</p>
        </div>

        <!-- Cuarto guía (derecha) -->
        <div class="guia-cuadro">
            <img src="mujer.jpg" alt="Guía Marta López">
            <h3>Guía Marta López</h3>
            <p><strong>Especialidad:</strong> Historia colonial</p>
            <p><strong>Idiomas:</strong> Español, Alemán</p>
            <p><strong>Edad:</strong> 39 años</p>
            <p><strong>Horario:</strong> 9 am - 7 pm</p>
        </div>
    </section>

    <!-- Sección de los siguientes guías -->
    <section class="guia-container">
        <!-- Quinto guía (izquierda) -->
        <div class="guia-cuadro">
            <img src="mujer.jpg" alt="Guía Sofía Martínez">
            <h3>Guía Sofía Martínez</h3>
            <p><strong>Especialidad:</strong> Arquitectura maya</p>
            <p><strong>Idiomas:</strong> Español, Portugués</p>
            <p><strong>Edad:</strong> 30 años</p>
            <p><strong>Horario:</strong> 9 am - 6 pm</p>
        </div>

        <!-- Sexto guía (derecha) -->
        <div class="guia-cuadro">
            <img src="hombre.jpg" alt="Guía Juan Pérez">
            <h3>Guía Juan Pérez</h3>
            <p><strong>Especialidad:</strong> Turismo de aventura</p>
            <p><strong>Idiomas:</strong> Español, Inglés</p>
            <p><strong>Edad:</strong> 33 años</p>
            <p><strong>Horario:</strong> 8 am - 4 pm</p>
        </div>
    </section>

    <!-- Sección de los siguientes guías -->
    <section class="guia-container">
        <!-- Séptimo guía (izquierda) -->
        <div class="guia-cuadro">
            <img src="mujer.jpg" alt="Guía Elena Sánchez">
            <h3>Guía Elena Sánchez</h3>
            <p><strong>Especialidad:</strong> Senderismo y ecoturismo</p>
            <p><strong>Idiomas:</strong> Español, Inglés</p>
            <p><strong>Edad:</strong> 27 años</p>
            <p><strong>Horario:</strong> 7 am - 3 pm</p>
        </div>

        <!-- Octavo guía (derecha) -->
        <div class="guia-cuadro">
            <img src="hombre.jpg" alt="Guía Ricardo Vargas">
            <h3>Guía Ricardo Vargas</h3>
            <p><strong>Especialidad:</strong> Rutas gastronómicas</p>
            <p><strong>Idiomas:</strong> Español, Italiano</p>
            <p><strong>Edad:</strong> 40 años</p>
            <p><strong>Horario:</strong> 10 am - 5 pm</p>
        </div>
    </section>

    <!-- Sección final de guías -->
    <section class="guia-container">
        <!-- Noveno guía (izquierda) -->
        <div class="guia-cuadro">
            <img src="hombre.jpg" alt="Guía Javier Hernández">
            <h3>Guía Javier Hernández</h3>
            <p><strong>Especialidad:</strong> Zonas costeras</p>
            <p><strong>Idiomas:</strong> Español, Francés</p>
            <p><strong>Edad:</strong> 45 años</p>
            <p><strong>Horario:</strong> 9 am - 6 pm</p>
        </div>

        <!-- Décimo guía (derecha) -->
        <div class="guia-cuadro">
            <img src="mujer.jpg" alt="Guía Isabel Fernández">
            <h3>Guía Isabel Fernández</h3>
            <p><strong>Especialidad:</strong> Rutas culturales y arte</p>
            <p><strong>Idiomas:</strong> Español, Inglés, Alemán</p>
            <p><strong>Edad:</strong> 38 años</p>
            <p><strong>Horario:</strong> 8 am - 4 pm</p>
        </div>
    </section>

    <!-- Sección de guías adicionales -->
    <section class="guia-container">
        <!-- Undécimo guía (izquierda) -->
        <div class="guia-cuadro">
            <img src="hombre.jpg" alt="Guía Pedro García">
            <h3>Guía Pedro García</h3>
            <p><strong>Especialidad:</strong> Zoología y fauna local</p>
            <p><strong>Idiomas:</strong> Español, Inglés, Alemán</p>
            <p><strong>Edad:</strong> 50 años</p>
            <p><strong>Horario:</strong> 9 am - 5 pm</p>
        </div>

        <!-- Duodécimo guía (derecha) -->
        <div class="guia-cuadro">
            <img src="mujer.jpg" alt="Guía Lucía Ramírez">
            <h3>Guía Lucía Ramírez</h3>
            <p><strong>Especialidad:</strong> Arqueología y historia</p>
            <p><strong>Idiomas:</strong> Español, Italiano</p>
            <p><strong>Edad:</strong> 32 años</p>
            <p><strong>Horario:</strong> 8 am - 4 pm</p>
        </div>
    </section>

    <!-- Sección final con más guías -->
    <section class="guia-container">
        <!-- Decimotercer guía (izquierda) -->
        <div class="guia-cuadro">
            <img src="mujer.jpg" alt="Guía Rosa Salazar">
            <h3>Guía Rosa Salazar</h3>
            <p><strong>Especialidad:</strong> Ecoturismo y reservas naturales</p>
            <p><strong>Idiomas:</strong> Español, Inglés</p>
            <p><strong>Edad:</strong> 29 años</p>
            <p><strong>Horario:</strong> 7 am - 3 pm</p>
        </div>

        <!-- Decimocuarto guía (derecha) -->
        <div class="guia-cuadro">
            <img src="hombre.jpg" alt="Guía Andrés Díaz">
            <h3>Guía Andrés Díaz</h3>
            <p><strong>Especialidad:</strong> Actividades extremas</p>
            <p><strong>Idiomas:</strong> Español, Inglés, Francés</p>
            <p><strong>Edad:</strong> 34 años</p>
            <p><strong>Horario:</strong> 8 am - 5 pm</p>
        </div>
    </section>
 <!-- Opción para volver al inicio -->
 <div class="volver-inicio">
    <a href="index.html" class="button">Volver al Inicio</a>
</div>
</body>
</html>


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

