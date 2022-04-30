<?php include("header.php");?><!-- Instancia toda la información de header.php -->
<?php include("connection.php");?> <!-- Instancia toda la información de connection.php -->

<?php
    $selectedGender=""; //Variable "global" que será utilizada para mostrar el resultado final.

    if($_POST){ //Si se "envía" una acción (en este caso con el botón "suSexo").
        
        $objConexion = new connection(); //Instancia la conexión.
        $sql = "SELECT * FROM estilosexopromediorecinto;"; //Crea la consulta para leer los datos de "estilosexopromediorecinto".
        $selectData = $objConexion->selectData($sql); //Guarda en una variable el resultado de la consulta realizada con el método creado en "connection.php".

        $diffSum=105; //Se crea una variable inicializada con un "valor máximo" para validar datos menores a esta.
        while($data = mysqli_fetch_assoc($selectData)){ //Ciclo para recorrer todos los datos de la consulta. Mientras la consulta siga conteniendo datos seguirá el ciclo.
            $styleSelected=0; //Se inicializa variable que debe ser identificada.
            $campusSelected=0; //Se inicializa variable que debe ser identificada.
            $averageSelected=$data['Promedio']; //Se asigna la información de promedio ya que será utilizada directamente.

            if($data['Estilo'] == "DIVERGENTE"){ //Se identifica la variable "Estilo" y es asignada a un valor numérico.
                $styleSelected=1;
            }else if($data['Estilo'] == "CONVERGENTE"){
                $styleSelected=2;
            }else if($data['Estilo'] == "ASIMILADOR"){
                $styleSelected=3;
            }else{ //En este caso el estilo es "ACOMODADOR".
                $styleSelected=4;
            }

            if($data['Recinto'] == "Paraiso"){ //Se identifica la variable "Recinto" y es asignada a un valor numérico.
                $campusSelected=1;
            }else{ //En este caso el recinto es "Turrialba".
                $campusSelected=2;
            }

            //Se realiza el método de Euclides. Valida los datos agregados con respecto a los datos existentes.
            $euclides = (10/3)*sqrt(pow($_POST['estiloAprendizaje']-$styleSelected,2)) +//se agrega peso al aprendizaje, 10/3, esto porque puede haber una diferencia de 3 como máximo y la máxima diferencia del promedio puede ser 10.
                        (10)*sqrt(pow($_POST['recinto']-$campusSelected,2)) +//se agrega peso al recinto, esto para equilibrar con los mínimos y máximos del promedio cuando es o no es igual.
                        sqrt(pow($_POST['ultimoPromedioMatricula']-$averageSelected,2)); 

            if($euclides<$diffSum){ //Si el valor que dió el método de Euclides es menor "valor máximo"
                $diffSum=$euclides; //Asigne al "Valor máximo" el valor mínimo hasta el momento.
                if($data['Sexo']=="M"){ //Valida y reemplaza la inicial por la palabra para mostrar datos claros.
                    $selectedGender="Masculino";
                }else{
                    $selectedGender="Femenino";
                }
            }
        }
    }

?>

<p class="western" align="justify" lang="es-ES"><font color="#FF0000"><font size="3"><b>ADIVINA EL SEXO DE UN ESTUDIANTE (masculino o femenino)</b></font></font></p>
<p class="western" align="justify" lang="es-ES"><font color="#000000"><font size="3"><b>Instrucciones:</b></font></font></p>
<p class="western" align="justify" lang="es-ES"><font color="#000000"><font size="3"> </font></font></p>
<p class="western" align="justify" lang="es-ES"><font color="#000000"><font size="3"> 
    Para utilizar el instrumento usted debe seleccionar su estilo de aprendizaje, su último promedio para matrícula y su recinto.</font></font></p>

<form name="sexo" action="3.3.php" method="post"> <!-- Se utiliza el método post enviado a este documento (3.3.php) -->

    <strong>Estilo de aprendizaje:  </strong>
        <select name="estiloAprendizaje">
            <option value="1">divergente</option>
            <option value="2">convergente</option>
            <option value="3">asimilador</option>
            <option value="4">acomodador</option>
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
    <strong>Recinto: </strong> 
    <select name="recinto">
        <option value="1">Paraíso</option>
        <option value="2">Turrialba</option>
    </select>
    <br>
    <br>
    <br>
    <input type="submit" class="btn btn-success" value="Calcular">
    <br>
    <br>
    <div class="row">
        <div class="col-md-4">
            Su sexo es: <input type="text" readonly class="form-control" name="suSexo" id="" value="<?php echo $selectedGender; ?>"> <!-- Muestra el sexo. Tiene asignado la variable "global" para cuando esta esté llena se muestre en pantalla. -->
        </div>
        <div class="col-md-4"></div>
        <div class="col-md-4"></div>
    </div>
    <br>
    <br>
</form>

<?php include("footer.php");?> <!-- Instancia toda la información de footer.php -->