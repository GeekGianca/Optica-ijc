<?php
/**
 * Created by PhpStorm.
 * User: Null
 * Date: 10/31/2018
 * Time: 1:16 AM
 */
    class Functions
    {
        private $conn;

        public function __construct()
        {
            require_once 'db.php';
            $db = new Db();
            $this->conn = $db->connect();
        }

        public function __destruct()
        {
            // TODO: Implement __destruct() method.
        }

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

        public function loginuser($iduser, $pass){
            $statement = $this->conn->prepare("SELECT users.name, acces_user.users_idusers FROM users INNER JOIN acces_user on users.idusers = acces_user.users_idusers WHERE acces_user.users_idusers = ? AND acces_user.password_user = ?;");
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