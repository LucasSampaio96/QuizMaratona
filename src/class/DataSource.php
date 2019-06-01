
<?php
    class DataSource{
        private $con;

        function __construct($nomebd) {
            $this->con = mysqli_connect("localhost", "root", "", $nomebd);
            if(!$this->con) {
                die('Falha na conexao');
            }
        }

        function __destruct() {
            mysqli_close($this->con);
        }

        function __get($name) {
            return $this->con;
        }
    }
