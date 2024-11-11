<?php include 'templates/header.php'; ?>
<?php include 'includes/db.php'; ?>

<h1 class="mb-4">Gestión de Productos</h1>

<form action="insertar.php" method="post">
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre del Producto</label>
        <input type="text" class="form-control" id="nombre" name="nombre" required>
    </div>
    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripción</label>
        <textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
    </div>
    <div class="mb-3">
        <label for="precio" class="form-label">Precio</label>
        <input type="number" class="form-control" id="precio" name="precio" step="0.01" required>
    </div>
    <div class="mb-3">
        <label for="cantidad" class="form-label">Cantidad</label>
        <input type="number" class="form-control" id="cantidad" name="cantidad" required>
    </div>
    <button type="submit" class="btn btn-primary">Agregar Producto</button>
</form>

<h2 class="mt-5">Lista de Productos</h2>
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Fecha de Creación</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $stmt = $pdo->query("SELECT * FROM productos");
        while ($producto = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>
                    <td>{$producto['id']}</td>
                    <td>{$producto['nombre']}</td>
                    <td>{$producto['descripcion']}</td>
                    <td>{$producto['precio']}</td>
                    <td>{$producto['cantidad']}</td>
                    <td>{$producto['fecha_creacion']}</td>
                    <td>
                        <a href='editar.php?id={$producto['id']}' class='btn btn-warning btn-sm'>Editar</a>
                        <a href='borrar.php?id={$producto['id']}' class='btn btn-danger btn-sm'>Borrar</a>
                    </td>
                  </tr>";
        }
        ?>
    </tbody>
</table>

<?php include 'templates/footer.php'; ?>
