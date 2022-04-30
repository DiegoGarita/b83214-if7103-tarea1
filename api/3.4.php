<?php include("header.php");?><!-- Instancia toda la información de header.php -->
<?php include("connection.php");?> <!-- Instancia toda la información de connection.php -->

<?php
    $selectedLearning=""; //Variable "global" que será utilizada para mostrar el resultado final.

    if($_POST){ //Si se "envía" una acción (en este caso con el botón "suEstiloAprendizaje").

        $objConexion = new connection(); //Instancia la conexión.
        $sql = "SELECT * FROM estilosexopromediorecinto;"; //Crea la consulta para leer los datos de "estilosexopromediorecinto".
        $selectData = $objConexion->selectData($sql); //Guarda en una variable el resultado de la consulta realizada con el método creado en "connection.php".

        $diffSum=105; //Se crea una variable inicializada con un "valor máximo" para validar datos menores a esta.
        while($data = mysqli_fetch_assoc($selectData)){ //Ciclo para recorrer todos los datos de la consulta. Mientras la consulta siga conteniendo datos seguirá el ciclo.
            $campusSelected=0; //Se inicializa variable que debe ser identificada.
            $genderSelected=0; //Se inicializa variable que debe ser identificada.
            $averageSelected=$data['Promedio']; //Se asigna la información de promedio ya que será utilizada directamente.

            if($data['Recinto'] == "Paraiso"){ //Se identifica la variable "Recinto" y es asignada a un valor numérico.
                $campusSelected=1;
            }else{ //En este caso el recinto es "Turrialba".
                $campusSelected=2;
            }

            if($data['Sexo'] == "M"){ //Se identifica la variable "Sexo" y es asignada a un valor numérico.
                $genderSelected=1;
            }else{ //En este caso el sexo es "F".
                $genderSelected=2;
            }
            
            //Se realiza el método de Euclides. Valida los datos agregados con respecto a los datos existentes.
            $euclides = (10)*sqrt(pow($_POST['recinto']-$campusSelected,2)) + //se agrega peso al recinto, esto para equilibrar con los mínimos y máximos del promedio cuando es o no es igual.
                        (10)*sqrt(pow($_POST['sexo']-$genderSelected,2))+ //se agrega peso al sexo, esto para equilibrar con los mínimos y máximos del promedio.
                        sqrt(pow($_POST['ultimoPromedioMatricula']-$averageSelected,2)); 

            if($euclides<$diffSum){ //Si el valor que dió el método de Euclides es menor "valor máximo"
                $diffSum=$euclides; //Asigne al "Valor máximo" el valor mínimo hasta el momento.
                $selectedLearning=$data['Estilo']; //Agregue en la variable "global" el estilo de aprendizaje por si es el último valor mínimo en pasar.
            }
        }
    }

?>

<p class="western" align="justify" lang="es-ES"><font color="#FF0000"><font size="3"><b>ADIVINA EL ESTILO DE APRENDIZAJE DE UN ESTUDIANTE (divergente, convergente, asimilador o acomodador)</b></font></font></p>
<p class="western" align="justify" lang="es-ES"><font color="#000000"><font size="3"><b>Instrucciones:</b></font></font></p>
<p class="western" align="justify" lang="es-ES"><font color="#000000"><font size="3"> </font></font></p>
<p class="western" align="justify" lang="es-ES"><font color="#000000"><font size="3"> 
    Para utilizar el instrumento usted debe seleccionar su recinto, su último promedio para matrícula y su sexo</font></font></p>

<form name="estiloAprendizaje" action="3.4.php" method="post"> <!-- Se utiliza el método post enviado a este documento (3.4.php) -->

    <strong>Recinto: </strong> 
        <select name="recinto">
            <option value="1">Paraíso</option>
            <option value="2">Turrialba</option>
        </select>
    <br>
    <br>
    <strong>Último promedio para matrícula (del 0 al 10 y si tiene decimales separar por .): </strong>
    <div class="row">
        <div class="col-md-4">
            <input type="text" required class="form-control" name="ultimoPromedioMatricula" id="">
        </div>
        <div class="col-md-4"></div>
        <div class="col-md-4"></div>
    </div>
    <br>
    <br>
    <strong>Sexo: </strong> 
    Masculino: <input type="radio" name="sexo" value="1" id="" required>
    Femenino: <input type="radio" name="sexo" value="2" id="">
    <br>
    <br>
    <br>
    <input type="submit" class="btn btn-success" value="Calcular">
    <br>
    <br>
    <div class="row">
        <div class="col-md-4">
            Su estilo de aprendizaje es: <input type="text" readonly class="form-control" name="suEstiloAprendizaje" id="" value="<?php echo $selectedLearning; ?>"> <!-- Muestra el estilo de aprendizaje. Tiene asignado la variable "global" para cuando esta esté llena se muestre en pantalla. -->
        </div>
        <div class="col-md-4"></div>
        <div class="col-md-4"></div>
    </div>
    <br>
    <br>
</form>

<?php include("footer.php");?> <!-- Instancia toda la información de footer.php -->