<?php include "includes/header.php" ?>

<?php
/* Alumnos */
$query = "SELECT *  FROM usuarios WHERE rol='alumno'";
$stmt = $conn->query($query);

$usuarios = $stmt->fetchAll(PDO::FETCH_OBJ); // en vez de sacarlo com array asociativo lo saco como objeto

/* Cursos */
$query = "SELECT * FROM cursos";
$stmt = $conn->query($query);

$cursos = $stmt->fetchAll(PDO::FETCH_OBJ); // en vez de sacarlo com array asociativo lo saco como objeto


/* Alumnos-Curso */

$query = "SELECT a.nombre, a.apellidos, c.nombreCurso, a.fecha_alta FROM alum_cursos a INNER JOIN cursos c ON  a.idCategoria=c.id";
$stmt = $conn->query($query);

$cursosAlumno = $stmt->fetchAll(PDO::FETCH_OBJ); // en vez de sacarlo com array asociativo lo saco como objeto

?>

<!-- Ver registros en html con dataTables -->

<!-- Zona de mensajes -->
<?php if (isset($_GET['sc'])): ?>
<div class="row">
    <div class="col-sm-12">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= $_GET['sc'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
</div>
<?php elseif (isset($_GET['er'])): ?>
<div class="row">
    <div class="col-sm-12">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= $_GET['er'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
</div>
<?php endif; ?>



<!-- listado de usuarios-cursos -->

<div class="row">
    <div class="col-sm-6">
        <h3>Cursos asignados</h3>
    </div>
    <br><br>
</div>

<div class="row pb-5">
    <div class="col-sm-12">
        <table id="tblCursos" class="display" style="width:100%;">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Curso</th>
                    <th>Fecha Alta</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cursosAlumno as $fila): ?>
                <tr>
                    <td><?= $fila->nombre ?></td>
                    <td><?= $fila->apellidos ?></td>
                    <td><?= $fila->nombreCurso ?></td>
                    <td><?= $fila->fecha_alta ?></td>
                </tr>
                <?php
                endforeach;
                ?>
            </tbody>
        </table>
    </div>
</div>

<!--  -->

<div class="row col-lg-12  ">
    <table class="display col-lg-12 offset-lg-1" style="width:100%;">
        <form action="php/asociar_alumnos.php" method="post">
            <tr>
                <th>
                    <div class="col-sm-4 w-100 p-2">
                        <label for="idAlumno" class="form-label">Id Alumno</label>
                        <input type="text" class="form-control" name="idAlumno" id="idAlumno">
                    </div>
                </th>
                <th>
                    <div class="col-sm-4 w-100 p-2">
                        <label for="cursos" class="form-label">Cursos</label>
                        <select name="cursos" id="cursos" class=" form-select">
                            <option value="" selected>-- Seleciona el curso --</option>
                            <?php foreach ($cursos as $fila): ?>
                            <option value="<?= $fila->id ?>"><?= $fila->nombreCurso ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </th>
                <th>
                    <div class="col-sm-4 p-2">
                        <label for="btn" class="form-label">Inscribir cursos</label>
                        <button id="btn" type="submit" class="btn btn-primary  w-100">Inscribir </button><br>
                    </div>
                </th>
            <tr>

        </form>
    </table>
</div>


<br>
<br>
<br>




<div class="row">
    <div class="col-sm-6">
        <h3>Lista de Usuarios</h3>
    </div>
    <br><br>
</div>

<div class="row pb-5">
    <div class="col-sm-12">
        <table id="tblUsuarios" class="display" style="width:100%;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Usuario</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $fila): ?>
                <tr>
                    <td><?= $fila->id ?></td>
                    <td><?= $fila->username ?></td>
                    <td><?= $fila->nombre ?></td>
                    <td><?= $fila->apellidos ?></td>
                    <td><?= $fila->email ?></td>
                </tr>
                <?php
                endforeach;
                ?>
            </tbody>
        </table>
    </div>
</div>





<?php include "includes/footer.php" ?>
<script>
var table = new DataTable('#tblCursos', {
    language: {
        url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/ca.json',
    },
});
var table = new DataTable('#tblUsuarios', {
    language: {
        url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/ca.json',
    },
});
</script>