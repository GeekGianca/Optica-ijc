<?php
/**
 * Created by PhpStorm.
 * User: Null
 * Date: 10/31/2018
 * Time: 1:16 AM
 */
    class Functions
    {
        /**
         * Controla la conexion a la base de datos
         * se crea una referencia en el constructor
         * y se le asigna la instancia del metodo en la confiduracion
         * @var mysqli
         */
        private $conn;

        /**
         * Functions constructor.
         */
        public function __construct()
        {
            require_once 'db.php';
            $db = new Db();
            $this->conn = $db->connect();
        }

        /**
         *
         */
        public function __destruct()
        {
            // TODO: Implement __destruct() method.
        }

        /**
         * Obtiene un usuario atraves de su identificacion
         * devuelve verdadero o falso dependiendo si
         * el usuario existe
         * @param $iduser
         * @return bool
         */
        public function getUser($iduser){
            $query = "SELECT * FROM `users` WHERE `idusers` = ? LIMIT 1";
            $statement = $this->conn->prepare($query);
            $statement->bind_param("s", $iduser);
            $statement->execute();
            $statement->store_result();
            if ($statement->num_rows > 0) {
                $statement->close();
                return true;
            } else {
                $statement->close();
                return false;
            }
        }

        /**
         * @param $iduser
         * @param $name
         * @param $phone
         * @param $birthdate
         * @param $address
         * @param $eps
         * @return mixed|null
         */
        public function saveUser($iduser, $name, $phone, $birthdate, $address, $eps){
            $query = "INSERT INTO `users`(`idusers`, `name`, `contact_phone`, `type_user`, `birthdate`, `address`, `status_user`, `eps`) VALUES (?,?,?,3,?,?,1,?)";
            $statement = $this->conn->prepare($query);
            $statement->bind_param("ssssss", $iduser, $name, $phone, $birthdate, $address, $eps);
            $result = $statement->execute();
            $statement->close();
            if ($result){
                $id_user = $this->conn->insert_id;
                return $id_user;
            } else {
                return null;
            }
        }

        /**
         * @param $iduser
         * @param $date
         * @param $time
         * @return bool
         */
        public function requestAppointment($iduser, $date, $time){
            $query = "INSERT INTO `quotes`(`users_idusers`, `date_quotes`, `time_quotes`, `available`, `status`) VALUES (?,?,?,1,1)";
            $statement = $this->conn->prepare($query);
            $statement->bind_param("sss", $iduser, $date, $time);
            $result = $statement->execute();
            $statement->close();
            if ($result){
                return true;
            } else {
                return false;
            }
        }

        /**
         * @param $iduser
         * @param $pass
         * @return array|bool|null
         */
        public function checkUser($iduser, $pass){
            $statement = $this->conn->prepare("SELECT users.name, acces_user.users_idusers FROM users INNER JOIN acces_user on users.idusers = acces_user.users_idusers WHERE acces_user.users_idusers = ? AND acces_user.password_user = ? AND users.type_user = 0;");
            $statement->bind_param("ss", $iduser, $pass);
            $statement->execute();
            $getuser = $statement->get_result()->fetch_assoc();
            $statement->close();
            if ($getuser) {
                return $getuser;
            } else {
                return false;
            }
        }
    }