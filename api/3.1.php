<?php include("header.php");?><!-- Instancia toda la información de header.php -->
<?php include("connection.php");?> <!-- Instancia toda la información de connection.php -->

<?php
        $selectedStyle=""; //Variable "global" que será utilizada para mostrar el resultado final.

        if($_POST){ //Si se "envía" una acción (en este caso con el botón "suEstilo").

                //Valores tomados de la URL "http://multi.ucr.ac.cr/estilo.htm" como fue indicado.
                $ec = $_POST['c5']+$_POST['c9']+$_POST['c13']+$_POST['c17']+$_POST['c25']+$_POST['c29'];
                $or = $_POST['c2']+$_POST['c10']+$_POST['c22']+$_POST['c26']+$_POST['c30']+$_POST['c34'];
                $ca = $_POST['c7']+$_POST['c11']+$_POST['c15']+$_POST['c19']+$_POST['c31']+$_POST['c35'];
                $ea = $_POST['c4']+$_POST['c12']+$_POST['c24']+$_POST['c28']+$_POST['c32']+$_POST['c36'];

                $objConexion = new connection(); //Instancia la conexión.
                $sql = "SELECT * FROM recintoestilo;"; //Crea la consulta para leer los datos de "recintoestilo".
                $selectData = $objConexion->selectData($sql); //Guarda en una variable el resultado de la consulta realizada con el método creado en "connection.php".

                $diffSum=36; //Se crea una variable inicializada con un "valor máximo" para validar datos menores a esta.
                while($data = mysqli_fetch_assoc($selectData)){ //Ciclo para recorrer todos los datos de la consulta. Mientras la consulta siga conteniendo datos seguirá el ciclo.
                        $euclides = sqrt(pow($ec-$data['EC'],2) + pow($or-$data['OR_'],2)+ pow($ca-$data['CA'],2)+ pow($ea-$data['EA'],2)); //Método de Euclides. Valida los datos agregados con respecto a los datos existentes.
                        if($euclides<$diffSum){ //Si el valor que dió el método de Euclides es menor al "valor máximo"
                                $diffSum=$euclides; //Asigne al "Valor máximo" el valor mínimo hasta el momento.
                                $selectedStyle=$data['Estilo']; //Agregue en la variable "global" el estilo por si es el último valor mínimo en pasar.
                        }
                }
        }

?>

<!-- Formulario tomado de la URL "http://multi.ucr.ac.cr/estilo.htm" como fue indicado. -->
<p class="western" align="justify" lang="es-ES"><font color="#FF0000"><font size="3"><b>CUAL ES SU ESTILO DE APRENDIZAJE?</b></font></font></p>
<p class="western" align="justify" lang="es-ES"><font color="#000000"><font size="3"><b>Instrucciones:</b></font></font></p>
<p class="western" align="justify" lang="es-ES"><font color="#000000"><font size="3"> </font></font></p>
<p class="western" align="justify" lang="es-ES"><font color="#000000"><font size="3"> 
        Para utilizar el instrumento usted debe conceder una calificación alta a
        aquellas palabras que mejor caracterizan la forma en que usted
        aprende, y una calificación baja a las palabras que menos
        caracterizan su estilo de aprendizaje.</font></font></p>

<p class="western" lang="es-ES"> Le puede ser difícil seleccionar
las palabras que mejor describen su estilo de aprendizaje, ya que no
hay respuestas correctas o incorrectas.</p>

<p class="western" align="justify" lang="es-ES"><font color="#000000"><font size="3"> Todas
las respuestas son buenas, ya que el fin del instrumento es describir
cómo y no juzgar su habilidad para aprender.</font></font></p>

<p class="western" align="justify" lang="es-ES"><font color="#000000"><font size="3"> De
inmediato encontrará nueve series o líneas de cuatro palabras cada una.
Ordene de mayor a menor cada serie o juego de cuatro palabras que hay en cada línea,
ubicando 4 en la palabra que mejor caracteriza su estilo de
aprendizaje, un 3 en la palabra siguiente en cuanto a la
correspondencia con su estilo; a la siguiente un 2, y un 1 a la
palabra que menos caracteriza su estilo. Tenga cuidado de ubicar un
número distinto al lado de cada palabra en la misma línea. </font></font></p>

<big><big><br>
Yo aprendo...</big></big>

<form name="estilo" action="3.1.php" method="post"> <!-- Se utiliza el método post enviado a este documento (3.1.php) -->
        <table style="text-align: left; width: 100%;" border="1" cellpadding="2" cellspacing="2">
        <tbody>

        <tr>
                <td style="vertical-align: top; width: 25%;">
                <select name="c1">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                </select>
        discerniendo<br>
                </td>
                <td style="vertical-align: top; width: 25%;">
                <select name="c2">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                </select>
        ensayando<br>
                </td>
                <td style="vertical-align: top;">
                <select name="c3">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                </select>
        involucrándome</td>
                <td style="vertical-align: top;">
                <select name="c4">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                </select>
        practicando</td>
        </tr>
        <tr>
                <td style="vertical-align: top; width: 25%;">
                <select name="c5">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                </select>
        receptivamente </td>
                <td style="vertical-align: top; width: 25%;">
                <select name="c6">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                </select>
        relacionando </td>
                <td style="vertical-align: top;">
                <select name="c7">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                </select>
        analíticamente </td>
                <td style="vertical-align: top;">
                <select name="c8">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                </select>
        imparcialmente </td>
        </tr>
        <tr>
                <td style="vertical-align: top; width: 25%;">
                <select name="c9">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                </select>
        sintiendo </td>
                <td style="vertical-align: top; width: 25%;">
                <select name="c10">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                </select>
        observando </td>
                <td style="vertical-align: top;">
                <select name="c11">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                </select>
        pensando </td>
                <td style="vertical-align: top;">
                <select name="c12">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                </select>
        haciendo </td>
        </tr>
        <tr>
                <td style="vertical-align: top; width: 25%;">
                <select name="c13">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                </select>
        aceptando </td>
                <td style="vertical-align: top; width: 25%;">
                <select name="c14">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                </select>
        arriesgando </td>
                <td style="vertical-align: top;">
                <select name="c15">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                </select>
        evaluando </td>
                <td style="vertical-align: top;">
                <select name="c16">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                </select>
        con cautela </td>
        </tr>
        <tr>
                <td style="vertical-align: top; width: 25%;">
                <select name="c17">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                </select>
        intuitivamente </td>
                <td style="vertical-align: top; width: 25%;">
                <select name="c18">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                </select>
        productivamente </td>
                <td style="vertical-align: top;">
                <select name="c19">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                </select>
        lógicamente </td>
                <td style="vertical-align: top;">
                <select name="c20">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                </select>
        cuestionando </td>
        </tr>
        <tr>
                <td style="vertical-align: top; width: 25%;">
                <select name="c21">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                </select>
        abstracto </td>
                <td style="vertical-align: top; width: 25%;">
                <select name="c22">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                </select>
        observando </td>
                <td style="vertical-align: top;">
                <select name="c23">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                </select>
        concreto </td>
                <td style="vertical-align: top;">
                <select name="c24">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                </select>
        activo </td>
        </tr>
        <tr>
                <td style="vertical-align: top; width: 25%;">
                <select name="c25">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                </select>
        orientado al presente </td>
                <td style="vertical-align: top; width: 25%;">
                <select name="c26">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                </select>
        reflexivamente </td>
                <td style="vertical-align: top;">
                <select name="c27">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                </select>
        orientado hacia el futuro </td>
                <td style="vertical-align: top;">
                <select name="c28">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                </select>
        pragmático </td>
        </tr>
        <tr>
                <td style="vertical-align: top; width: 25%;">
                <select name="c29">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                </select>
        aprendo más de la experiencia </td>
                <td style="vertical-align: top; width: 25%;">
                <select name="c30">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                </select>
        aprendo más de la observación </td>
                <td style="vertical-align: top;">
                <select name="c31">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                </select>
        aprendo más de la conceptualización </td>
                <td style="vertical-align: top;">
                <select name="c32">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                </select>
        aprendo más de la experimentación </td>
        </tr>
        <tr>
                <td style="vertical-align: top; width: 25%;">
                <select name="c33">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                </select>
        emotivo </td>
                <td style="vertical-align: top; width: 25%;">
                <select name="c34">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                </select>
        reservado </td>
                <td style="vertical-align: top;">
                <select name="c35">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                </select>
        racional </td>
                <td style="vertical-align: top;">
                <select name="c36">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                </select>
        abierto </td>
        </tr>

        </tbody>
        </table>
                <br>
                <input type="submit" class="btn btn-success" value="Calcular"> <!-- Botón que activa el "$_POST" del formulario 3.1.php -->
                <br>
</form>
<br>
<div class="row">
        <div class="col-md-4">
                ESTILO: <input type="text" readonly class="form-control" name="suEstilo" id="" value="<?php echo $selectedStyle; ?>"/> <!-- Muestra el estilo. Tiene asignado la variable "global" para cuando esta esté llena se muestre en pantalla. -->
        </div>
        <div class="col-md-4"></div>
        <div class="col-md-4"></div>
</div>
<br>
<br>

<?php include("footer.php");?> <!-- Instancia toda la información de footer.php -->