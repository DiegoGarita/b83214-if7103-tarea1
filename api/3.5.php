<?php include("header.php");?><!-- Instancia toda la información de header.php -->
<?php include("connection.php");?> <!-- Instancia toda la información de connection.php -->

<?php
    $selectedProfessor=""; //Variable "global" que será utilizada para mostrar el resultado final.

    if($_POST){ //Si se "envía" una acción (en este caso con el botón "suTipoProfesor").

        $objConexion = new connection(); //Instancia la conexión.
        $sql = "SELECT * FROM profesores;"; //Crea la consulta para leer los datos de "profesores".
        $selectData = $objConexion->selectData($sql); //Guarda en una variable el resultado de la consulta realizada con el método creado en "connection.php".

        $diffSum=25; //Se crea una variable inicializada con un "valor máximo" para validar datos menores a esta.
        while($data = mysqli_fetch_assoc($selectData)){ //Ciclo para recorrer todos los datos de la consulta. Mientras la consulta siga conteniendo datos seguirá el ciclo.
            $A = $data['A']; //Se asigna la información de A ya que será utilizada directamente.
            $B=0; //Se inicializa variable que debe ser identificada.
            $C=0; //Se inicializa variable que debe ser identificada.
            $D= $data['D']; //Se asigna la información de D ya que será utilizada directamente.
            $E=0; //Se inicializa variable que debe ser identificada.
            $F=0; //Se inicializa variable que debe ser identificada.
            $G=0; //Se inicializa variable que debe ser identificada.
            $H=0; //Se inicializa variable que debe ser identificada.

            if($data['B'] == "F"){ //Se identifica la variable "B" y es asignada a un valor numérico.
                $B=1;
            }else if ($data['B'] == "M"){
                $B=2;
            }else{ //En este caso el valor es "NA"
                $B=3;
            }

            if($data['C'] == "B"){ //Se identifica la variable "C" y es asignada a un valor numérico.
                $C=1;
            }else if ($data['C'] == "I"){
                $C=2;
            }else{ //En este caso el valor es "A"
                $C=3;
            }

            if($data['E'] == "DM"){ //Se identifica la variable "E" y es asignada a un valor numérico.
                $E=1;
            }else if ($data['E'] == "ND"){
                $E=2;
            }else{ //En este caso el valor es "O"
                $E=3;
            }

            if($data['F'] == "L"){ //Se identifica la variable "F" y es asignada a un valor numérico.
                $F=1;
            }else if ($data['F'] == "A"){
                $F=2;
            }else{ //En este caso el valor es "H"
                $F=3;
            }

            if($data['G'] == "N"){ //Se identifica la variable "G" y es asignada a un valor numérico.
                $G=1;
            }else if ($data['G'] == "S"){
                $G=2;
            }else{ //En este caso el valor es "O"
                $G=3;
            }

            if($data['H'] == "N"){ //Se identifica la variable "H" y es asignada a un valor numérico.
                $H=1;
            }else if ($data['H'] == "S"){
                $H=2;
            }else{ //En este caso el valor es "O"
                $H=3;
            }

            $euclides = sqrt(pow($_POST['age']-$A,2) + pow($_POST['gender']-$B,2)+ pow($_POST['skill']-$C,2)+ pow($_POST['taught']-$D,2)+ 
            pow($_POST['discipline']-$E,2)+ pow($_POST['computers']-$F,2)+ pow($_POST['technology']-$G,2)+ pow($_POST['web']-$H,2)); //Se realiza el método de Euclides. Valida los datos agregados con respecto a los datos existentes.

            if($euclides<$diffSum){ //Si el valor que dió el método de Euclides es menor "valor máximo"
                $diffSum=$euclides; //Asigne al "Valor máximo" el valor mínimo hasta el momento.
                $selectedProfessor=$data['Class']; //Agregue en la variable "global" la class por si es el último valor mínimo en pasar.
            }

        }
    }
?>

<p class="western" align="justify" lang="es-ES"><font color="#FF0000"><font size="3"><b>DETERMINAR EL TIPO DE PROFESOR (beginner, intermediate, advanced)</b></font></font></p>
<p class="western" align="justify" lang="es-ES"><font color="#000000"><font size="3"><b>Instrucciones:</b></font></font></p>
<p class="western" align="justify" lang="es-ES"><font color="#000000"><font size="3"> </font></font></p>
<p class="western" align="justify" lang="es-ES"><font color="#000000"><font size="3"> 
    Para utilizar el instrumento usted debe completar sus criterios demográficos y sus antecedentes</font></font></p>

<form name="tipoProfesor" action="3.5.php" method="post"> <!-- Se utiliza el método post enviado a este documento (3.5.php) -->

    <big><big>Demographic<br></big></big>
    <br>
    <strong>Age: </strong> <br>
        <input type="radio" name="age" value="1" id="" required><= 30 <br>
        <input type="radio" name="age" value="2" id="">> 30 AND <= 55 <br>
        <input type="radio" name="age" value="3" id="">55 <br>
    <br>
    <br>
    <strong>Gender: </strong> <br>
        <input type="radio" name="gender" value="1" id="" required>Female <br>
        <input type="radio" name="gender" value="2" id="">Male <br>
        <input type="radio" name="gender" value="3" id="">not avaible <br>
    <br>
    <br>
    <big><big>Background<br></big></big>
    <br>
    <strong>Self-evaluation of your skill or experience teaching the selected
    subject: </strong> <br>
        <input type="radio" name="skill" value="1" id="" required>Beginner <br>
        <input type="radio" name="skill" value="2" id="">Intermediate <br>
        <input type="radio" name="skill" value="3" id="">Advanced <br>
    <br>
    <br>
    <strong>Number of times you have taught this type of course: </strong> <br>
        <input type="radio" name="taught" value="1" id="" required>Never <br>
        <input type="radio" name="taught" value="2" id="">1 to 5 times <br>
        <input type="radio" name="taught" value="3" id="">More than 5 times <br>
    <br>
    <br>
    <strong> Your background discipline or area of expertise: </strong> <br>
        <input type="radio" name="discipline" value="1" id="" required>Decision-making <br>
        <input type="radio" name="discipline" value="2" id="">Network design <br>
        <input type="radio" name="discipline" value="3" id="">Other <br>
    <br>
    <br>
    <strong> Your skills using computers: </strong> <br>
        <input type="radio" name="computers" value="1" id="" required>Low<br>
        <input type="radio" name="computers" value="2" id="">Average <br>
        <input type="radio" name="computers" value="3" id="">High <br>
    <br>
    <br>
    <strong> Your experience using Web-based technology for teaching: </strong> <br>
        <input type="radio" name="technology" value="1" id="" required>Never<br>
        <input type="radio" name="technology" value="2" id="">Sometimes <br>
        <input type="radio" name="technology" value="3" id="">Often <br>
    <br>
    <br>
    <strong> Your experience using a Web site: </strong> <br>
        <input type="radio" name="web" value="1" id="" required>Never<br>
        <input type="radio" name="web" value="2" id="">Sometimes <br>
        <input type="radio" name="web" value="3" id="">Often <br>
    <br>
    <br>
    <br>
    <input type="submit" class="btn btn-success"  value="Calcular">
    <br>
    <br>
    <div class="row">
        <div class="col-md-4">
            Su tipo de profesor es: <input type="text" readonly class="form-control" name="suTipoProfesor" id="" value="<?php echo $selectedProfessor; ?>"> <!-- Muestra la clase/tipo de profesor. Tiene asignado la variable "global" para cuando esta esté llena se muestre en pantalla. -->
        </div>
        <div class="col-md-4"></div>
        <div class="col-md-4"></div>
    </div>
    <br>
    <br>
</form>

<?php include("footer.php");?> <!-- Instancia toda la información de footer.php -->
