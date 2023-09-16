<?php  include "includes/header.php"  ?>

<?php
//Establezco zona horaria
date_default_timezone_set('Europe/Andorra');


$query="SELECT * FROM cursos";
$stmt=$conn->query($query);

$cursos= $stmt->fetchAll(PDO::FETCH_OBJ); // en vez de sacarlo com array asociativo lo saco como objeto



?>
<!-- Ver registros en html con dataTables -->

<!-- Zona de mensajes -->
<?php if(isset($_GET['sc'])): ?>
<div class="row">
    <div class="col-sm-12">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?=$_GET['sc']?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>    
    </div>
</div>
<?php elseif(isset($_GET['er'])): ?>
<div class="row">
    <div class="col-sm-12"> 
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?=$_GET['er']?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>    
    </div>
</div>
<?php endif;?>

<!-- listado de las categorias -->
<div class="row pt-2">
        <div class="col-sm-6">
            <h3>Listado de Cursos</h3>
        </div>
    <div class="col-sm-4 offset-sm-2">
        <a href="PHP/crear_curso.php" class="btn btn-success w-100"><i class="bi bi-plus-circle-fill"></i> Nuevo curso</a>
    </div>
    <div class="col-sm-12">
        <table id="tblCursos" class="display" style="width:100%;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                
                    <?php $i=1;
                    foreach ($cursos as $fila):?>
                    <tr>
                        <td><?=$i?></td>
                        <td><?=$fila->nombreCurso?></td>
                        <td>
                            <a href="PHP/editar_cursos.php?id=<?=$fila->id?>" class="btn btn-warning"><i class="bi bi-pencil-square"></i> Editar</a>
                            <a href="PHP/borrar_curso.php?id=<?=$fila->id?>" class="btn btn-danger"><i class="bi bi-trash"></i> Borrar</a>
                        </td>
                    </tr>
                    <?php 
                    $i++;
                    endforeach;
                    ?>
            </tbody>
        </table>
    </div>
</div>



<?php  include "includes/footer.php"  ?>
<script>
    var table = new DataTable('#tblCursos', {
    language: {
        url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/ca.json',
    },
});
</script>