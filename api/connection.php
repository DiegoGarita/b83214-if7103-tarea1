<!-- Connection, crea la conexión general al servidor y a la base de datos MySQL en el servidor de Turrialba. Además tiene la ejecución de las consultas. -->
<?php 

    class connection{ //Se crea la clase conexión para poder utilizarla múltiples veces.
    private $hostname = "163.178.107.10"; //Servidor de Turrialba.
    private $user = "laboratorios"; //Usuario general para estudiantes.
    private $password = "KmZpo.2796"; //Contraseña.
    private $BD = "if7103_tarea1_b83214"; //Base de datos utilizada con los datos brindados.
    private $connection; //Variable utilizada para almacenar la conexión.

        public function __construct(){ 
            try{
                $this->connection = @mysqli_connect($this->hostname, $this->user, $this->password); //En la variable "connection" asignar la conexión a mySQL. Requiere el servidor, usuario y contraseña.
                mysqli_select_db($this->connection, $this->BD); //Una vez iniciada la conexión seleccionar la base de datos a utilizar. (Es como hacer "USE ...").
            }catch(Exception $error){
            echo "Error de conexión: ".$error; //Ataja el error en caso de fallo con la conexión al servidor o identificación de la base de datos
            }
        }

        public function selectData($sql){ //Método que ejecuta consultas, recibe la consulta y utiliza el debido método para retornar el resultado.
            $query = mysqli_query($this->connection, $sql); //Almacena en la variable "query" la ejecución de la consulta. Requiere de los datos de conexión y la consulta como tal.
            return $query; //Devuelve el resultado de la consulta.
        }
    }

?>