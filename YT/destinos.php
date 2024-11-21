
<?php
// Incluye la conexión a la base de datos y las funciones CRUD
require 'database.php';
require 'destinos.php';

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



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destinos</title>
    <link rel="stylesheet" href="styles1.css">
    <style>
        /* Estilo general */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        header {
            text-align: center;
            padding: 20px;
            background-color: #ffc0cb; /* Rosado */
        }

        h1 {
            color: #000;
        }

        .container {
            margin: 20px;
        }

        .destino {
            display: flex;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 10px;
            background-color: #fff;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .destino img {
            width: 250px;
            height: 150px;
            border-radius: 8px;
            margin-right: 20px;
        }

        .destino h3 {
            margin: 0;
            color: #333;
        }

        .destino p {
            margin: 5px 0;
            color: #555;
        }

        .button {
            background-color: #f08080;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            margin-top: 10px;
        }

        .button:hover {
            background-color: #ff7f7f;
        }
    </style>
</head>
<body>
    <header>
        <h1>Destinos en Yucatán</h1>
    </header>
    <section class="container">
        <!-- Destino 1 -->
        <div class="destino">
            <img src="playa-progreso.jpg" alt="Playa Progreso">
            <div>
                <h3>Playa Progreso</h3>
                <p>Ubicación: Costa norte de Yucatán | Actividades: Natación, snorkel</p>
            </div>
        </div>

        <!-- Destino 2 -->
        <div class="destino">
            <img src="chichen-itza.jpg" alt="Chichen Itzá">
            <div>
                <h3>Chichen Itzá</h3>
                <p>Ubicación: Centro de Yucatán | Actividades: Turismo arqueológico</p>
            </div>
        </div>

        <!-- Destino 3 -->
        <div class="destino">
            <img src="cenotes.jpg" alt="Cenotes de Yucatán">
            <div>
                <h3>Cenotes de Yucatán</h3>
                <p>Ubicación: Diversas localidades | Actividades: Nadar, explorar</p>
            </div>
        </div>

        <!-- Destino 4 -->
        <div class="destino">
            <img src="merida.jpg" alt="Mérida">
            <div>
                <h3>Mérida</h3>
                <p>Ubicación: Capital del estado | Actividades: Turismo cultural, arquitectura colonial</p>
            </div>
        </div>

        <!-- Destino 5 -->
        <div class="destino">
            <img src="izamal.jpg" alt="Izamal">
            <div>
                <h3>Izamal</h3>
                <p>Ubicación: Centro de Yucatán | Actividades: Turismo cultural, arquitectura colonial</p>
            </div>
        </div>

        <!-- Destino 6 -->
        <div class="destino">
            <img src="holbox.jpg" alt="Holbox">
            <div>
                <h3>Holbox</h3>
                <p>Ubicación: Norte de Yucatán | Actividades: Observación de flamencos, kayak</p>
            </div>
        </div>

        <!-- Destino 7 -->
        <div class="destino">
            <img src="celestun.jpg" alt="Celestún">
            <div>
                <h3>Celestún</h3>
                <p>Ubicación: Costa de Yucatán | Actividades: Observación de flamencos, ecoturismo</p>
            </div>
        </div>

        <!-- Destino 8 -->
        <div class="destino">
            <img src="uxmal.jpg" alt="Uxmal">
            <div>
                <h3>Uxmal</h3>
                <p>Ubicación: Sur de Yucatán | Actividades: Turismo arqueológico, exploración</p>
            </div>
        </div>

        <!-- Destino 9 -->
        <div class="destino">
            <img src="sisal.jpg" alt="Sisal">
            <div>
                <h3>Sisal</h3>
                <p>Ubicación: Costa de Yucatán | Actividades: Playa, pesca, ecoturismo</p>
            </div>
        </div>

        <!-- Destino 10 -->
        <div class="destino">
            <img src="xcaret.jpg" alt="Xcaret">
            <div>
                <h3>Xcaret</h3>
                <p>Ubicación: Riviera Maya | Actividades: Parque ecológico, snorkeling, cultura</p>
            </div>
        </div>

        <a href="index.html" class="button">Volver a Inicio</a>
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

