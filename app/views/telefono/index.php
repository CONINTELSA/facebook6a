<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Telefonos</title>
    <link rel="stylesheet" href="/apple6b/public/css/style.css">
</head>
<body>

<div class="container">
    <h1>Listar  Telefonos</h1>
    <a href="/facebook6a/public/telefono/create"><button>Agregar</button></a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Persona</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($telefonos) && is_array($telefonos)): ?>
                <?php foreach ($telefonos as $telefono): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($telefono['idtelefono']); ?></td>
                        <td><?php echo htmlspecialchars($telefono['persona_nombres']); ?></td>
                        <td><?php echo htmlspecialchars($telefono['numero']); ?></td>
                        <td>
    <a href="/facebook6a/public/telefono/edit?idtelefono=<?php echo htmlspecialchars($telefono['idtelefono']); ?>">
        <button>Editar</button>
    </a>
    <a href="/facebook6a/public/telefono/eliminar?idtelefono=<?php echo htmlspecialchars($telefono['idtelefono']); ?>" 
       onclick="return confirm('¿Estás seguro de eliminar este registro?');">
        <button>Eliminar</button>
    </a>
</td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3">No hay registros disponibles.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<script src="/facebook6a/public/js/script.js"></script>
</body>
</html>
