// Datos de usuarios simulados
const usuarios = [
    { username: 'admin', password: 'admin123', role: 'admin' },
    { username: 'usuario', password: 'usuario123', role: 'user' }
];

// Lista de destinos (simulada)
let destinos = [
    { nombre: 'Chichen Itzá', descripcion: 'Pirámide maya', ubicacion: 'Yucatán', precio_estimado: 500 },
    { nombre: 'Cenote Xkeken', descripcion: 'Cenote natural', ubicacion: 'Cuzamá', precio_estimado: 200 }
];

// Función para validar usuario y redirigir según su rol
function validarUsuario() {
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;
    const errorMessage = document.getElementById('error-message');

    const usuarioEncontrado = usuarios.find(user => user.username === username && user.password === password);

    if (usuarioEncontrado) {
        // Mostrar el contenido principal y ocultar el login
        document.getElementById('login-container').style.display = 'none';
        document.getElementById('main-container').style.display = 'block';

        // Si es administrador, mostrar las opciones de agregar/editar/eliminar
        if (usuarioEncontrado.role === 'admin') {
            document.getElementById('admin-options').style.display = 'block';
        } else {
            document.getElementById('admin-options').style.display = 'none';
        }

        // Mostrar la lista de destinos
        mostrarDestinos();
        return false; // Evita el envío del formulario
    } else {
        errorMessage.textContent = 'Usuario o contraseña incorrectos.';
        return false; // Evita el envío del formulario
    }
}

// Función para mostrar los destinos
function mostrarDestinos() {
    const destinosUl = document.getElementById('destinos-ul');
    destinosUl.innerHTML = ''; // Limpiar la lista de destinos

    destinos.forEach((destino, index) => {
        const li = document.createElement('li');
        li.innerHTML = `
            <strong>${destino.nombre}</strong> - ${destino.descripcion} - Ubicación: ${destino.ubicacion} - Precio: $${destino.precio_estimado}
        `;

        // Si es admin, agregar botón para eliminar destino
        if (document.getElementById('admin-options').style.display === 'block') {
            const deleteButton = document.createElement('button');
            deleteButton.textContent = 'Eliminar';
            deleteButton.onclick = () => eliminarDestino(index);
            li.appendChild(deleteButton);
        }

        destinosUl.appendChild(li);
    });
}

// Función para agregar un nuevo destino
function agregarDestino() {
    const nombre = document.getElementById('nombre').value;
    const descripcion = document.getElementById('descripcion').value;
    const ubicacion = document.getElementById('ubicacion').value;
    const precio_estimado = document.getElementById('precio_estimado').value;

    destinos.push({ nombre, descripcion, ubicacion, precio_estimado });
    mostrarDestinos(); // Actualizar la lista de destinos

    // Limpiar el formulario
    document.getElementById('add-destination-form').reset();
    return false;
}

// Función para eliminar un destino
function eliminarDestino(index) {
    destinos.splice(index, 1);
    mostrarDestinos(); // Actualizar la lista de destinos
}

// Función para cerrar sesión
function logout() {
    document.getElementById('login-container').style.display = 'block';
    document.getElementById('main-container').style.display = 'none';
    document.getElementById('username').value = '';
    document.getElementById('password').value = '';
    document.getElementById('error-message').textContent = '';
}
