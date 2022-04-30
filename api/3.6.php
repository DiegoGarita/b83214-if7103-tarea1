<?php include("header.php");?><!-- Instancia toda la información de header.php -->
<?php include("connection.php");?> <!-- Instancia toda la información de connection.php -->

<?php
    $selectedNetwork=""; //Variable "global" que será utilizada para mostrar el resultado final.

    if($_POST){ //Si se "envía" una acción (en este caso con el botón "suRedes").

        $objConexion = new connection(); //Instancia la conexión.
        $sql = "SELECT * FROM redes;"; //Crea la consulta para leer los datos de "redes".
        $selectData = $objConexion->selectData($sql); //Guarda en una variable el resultado de la consulta realizada con el método creado en "connection.php".

        $diffSum=105; //Se crea una variable inicializada con un "valor máximo" para validar datos menores a esta.
        while($data = mysqli_fetch_assoc($selectData)){ //Ciclo para recorrer todos los datos de la consulta. Mientras la consulta siga conteniendo datos seguirá el ciclo.
            $Re=$data['Reliability_R']; //Se asigna la información de Re ya que será utilizada directamente.
            $Li=$data['Numberoflinks_L']; //Se asigna la información de Li ya que será utilizada directamente.
            $Ca=0; //Se inicializa variable que debe ser identificada.
            $Co=0; //Se inicializa variable que debe ser identificada.

            if($data['Capacity_Ca'] == "Low"){ //Se identifica la variable "Capacity_Ca" y es asignada a un valor numérico.
                $Ca=1;
            }else if($data['Capacity_Ca'] == "Medium"){
                $Ca=2;
            }else{ //En este caso el valor es "High"
                $Ca=3;
            }

            if($data['Costo_Co'] == "Low"){ //Se identifica la variable "Costo_Co" y es asignada a un valor numérico.
                $Co=1;
            }else if($data['Costo_Co'] == "Medium"){
                $Co=2;
            }else{ //En este caso el valor es "High"
                $Co=3;
            }
            
            $euclides = sqrt(pow($_POST['Re']-$Re,2) + pow($_POST['Li']-$Li,2)+ pow($_POST['Ca']-$Ca,2)+ pow($_POST['Co']-$Co,2)); //Se realiza el método de Euclides. Valida los datos agregados con respecto a los datos existentes.

            if($euclides<$diffSum){ //Si el valor que dió el método de Euclides es menor al "valor máximo"
                $diffSum=$euclides; //Asigne al "Valor máximo" el valor mínimo hasta el momento.
                $selectedNetwork=$data['Class']; //Agregue en la variable "global" la class por si es el último valor mínimo en pasar.
            }
        }
    }

?>

<p class="western" align="justify" lang="es-ES"><font color="#FF0000"><font size="3"><b>DETERMINAR LA CLASIFICACIÓN DE REDES (clases A o B)</b></font></font></p>
<p class="western" align="justify" lang="es-ES"><font color="#000000"><font size="3"><b>Instrucciones:</b></font></font></p>
<p class="western" align="justify" lang="es-ES"><font color="#000000"><font size="3"> </font></font></p>
<p class="western" align="justify" lang="es-ES"><font color="#000000"><font size="3"> 
    Para utilizar el instrumento usted debe seleccionar entre las opciones indicadas</font></font></p>

<form name="redes" action="3.6.php" method="post"> <!-- Se utiliza el método post enviado a este documento (3.6.php) -->

    <strong>The network reliability: </strong> 
    <select name="Re">
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
    </select>
    <br>
    <br>
    <strong>The number of links: </strong> 
    <select name="Li">
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        <option value="13">13</option>
        <option value="14">14</option>
        <option value="15">15</option>
        <option value="16">16</option>
        <option value="17">17</option>
        <option value="18">18</option>
        <option value="19">19</option>
        <option value="20">20</option>
    </select>
    <br>
    <br>
    <strong>The total network capacity: </strong> 
    <select name="Ca">
        <option value="1">low</option>
        <option value="2">medium</option>
        <option value="3">high</option>
        </select>
    <br>
    <br>
    <strong>The network cost: </strong> 
    <select name="Co">
        <option value="1">low</option>
        <option value="2">medium</option>
        <option value="3">high</option>
        </select>
    <br>
    <br>
    <br>
    <input type="submit" class="btn btn-success"  value="Calcular">
    <br>
    <br>
    <div class="row">
        <div class="col-md-4">
            La clasificación de redes es: <input type="text" readonly class="form-control" name="suRedes" id="" value="<?php echo $selectedNetwork; ?>"> <!-- Muestra la clasificación de red. Tiene asignado la variable "global" para cuando esta esté llena se muestre en pantalla. -->
        </div>
        <div class="col-md-4"></div>
        <div class="col-md-4"></div>
    </div>
    <br>
    <br>
</form>

<?php include("footer.php");?> <!-- Instancia toda la información de footer.php -->