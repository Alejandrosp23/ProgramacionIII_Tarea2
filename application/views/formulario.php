<?php 
if($_POST){
    $persona = $_POST;
    core_persona::guardar($persona);
    redirect('main/nuevo');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Formulario</title>
</head>
<body>
<div class="container">
    <h3>Formulario</h3>
    <form method= "post" action="" class="form-horizontal">
        <?= asgInput('cedula','Cedula', ['placeholder'=>'Ingrese cedula','required'=>'required']); ?>
        <?= asgInput('nombre','Nombre',['placeholder'=>'Ingrese nombre','required'=>'required'] ); ?>
        <?= asgInput('apellido','Apellido', ['placeholder'=>'Ingrese apellido','required'=>'required']); ?>

        <div>
        <label>Tipo de sangre:</label><br>
        <select name="tipificacion">
        <option value="0">Seleccione:</option>
        <option value="A+">A+</option>
        <option value="A-+">A-</option>
        <option value="B+">B+</option>
        <option value="B-">B-</option>
        <option value="AB+">AB+</option>
        <option value="AB-">AB-</option>
        <option value="O+">O+</option>
        <option value="O-">O-</option>
        </select>
        </div>
                <br>
        <div>
        <label>Genero:</label>
        <input type="radio" name="genero" value="Masculino" checked> Masculino
        <input type="radio" name="genero" value="Femenino"> Femenino
        </div>

        <?= asgTextArea('comentario','Comentario', ['placeholder'=>'Deja tu comentario']); ?>
        
        <input required type="checkbox"> Acepto enviar mi información.
        <br>
        <div class="text-center">
        <button type:"submit" class="btn btn-success bt-large">ENVIAR</button>
        <button type="reset" onclick="return confirm('Seguro de limpiar los campos?')" class="btn btn-warning bt-large">LIMPIAR</button>
        </div>

    </form>

    <hr>

    <h2>Datos guardados</h2>
    <table class="table table-condesed">
        <thead>
            <tr>
                <th>Cedula</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Sangre</th>
                <th>Genero</th>
                <th>Comentario</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $rs = core_persona::listado();
        foreach($rs as $persona){
            $urlBorrar = base_url("index.php/main/borrar/{$persona->id}");
            echo"
           <tr>
           <td>{$persona->cedula}</td>
           <td>{$persona->nombre}</td>
           <td>{$persona->apellido}</td>
           <td>{$persona->tipificacion}</td>
           <td>{$persona->genero}</td>
           <td>{$persona->comentario}</td>
           <td><a href='$urlBorrar' onclick=\"return confirm('Estas seguro de eliminarlo?')\" class='btn btn-danger'>X</a></td>
           </tr>";
        }
           ?>
        </tbody>
    </table>
</div>
</body>
</html>