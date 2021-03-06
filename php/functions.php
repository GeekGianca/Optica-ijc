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
    public function getUser($iduser)
    {
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
    public function saveUser($iduser, $name, $phone, $birthdate, $address, $eps)
    {
        $query = "INSERT INTO `users`(`idusers`, `name`, `contact_phone`, `type_user`, `birthdate`, `address`, `status_user`, `eps`) VALUES (?,?,?,3,?,?,1,?)";
        $statement = $this->conn->prepare($query);
        $statement->bind_param("ssssss", $iduser, $name, $phone, $birthdate, $address, $eps);
        $result = $statement->execute();
        $statement->close();
        if ($result) {
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
    public function requestAppointment($iduser, $date, $time)
    {
        $query = "INSERT INTO `quotes`(`users_idusers`, `date_quotes`, `time_quotes`, `available`, `status`) VALUES (?,?,?,1,1)";
        $statement = $this->conn->prepare($query);
        $statement->bind_param("sss", $iduser, $date, $time);
        $result = $statement->execute();
        $statement->close();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function deleterequestappointment($iduser, $date, $time)
    {
        $statement = $this->conn->prepare("DELETE FROM quotes WHERE `users_idusers` = ? AND `date_quotes` = ? AND `time_quotes` = ?");
        $statement->bind_param("sss", $iduser, $date, $time);
        $result = $statement->execute();
        $statement->close();
        return $result;
    }

    /**
     * @param $iduser
     * @param $pass
     * @return array|bool|null
     */
    public function checkUser($iduser, $pass)
    {
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

    public function loginuser($iduser, $pass)
    {
        $statement = $this->conn->prepare("SELECT users.name, acces_user.users_idusers, users.contact_phone, users.type_user as type, users.eps FROM users INNER JOIN acces_user on users.idusers = acces_user.users_idusers WHERE acces_user.users_idusers = ? AND acces_user.password_user = ? AND users.type_user = 3;");
        $statement->bind_param("ss", $iduser, $pass);
        $statement->execute();
        $getuser = $statement->get_result()->fetch_assoc();
        $statement->close();
        if ($getuser != null) {
            return $getuser;
        } else {
            return false;
        }
    }

    public function retrieveformula($iduser)
    {
        $result = $this->conn->query("");
    }

    public function getquotes($iduser)
    {
        $resp = $this->conn->query("SELECT idquotes, users_idusers, date_quotes, time_quotes, available, status FROM quotes WHERE users_idusers = '$iduser';");
        $result = array();
        while ($item = $resp->fetch_assoc()) {
            $result[] = $item;
        }
        return $result;
    }

    public function updatequotes($codigocita)
    {
        $statement = $this->conn->prepare("UPDATE quotes SET available = 2, status = 2 WHERE idquotes = ?;");
        $statement->bind_param("s", $codigocita);
        $result = $statement->execute();
        $statement->close();
        if ($result) {
            $statement = $this->conn->prepare("SELECT users_idusers FROM quotes WHERE idquotes = ?");
            $statement->bind_param("s", $codigocita);
            $statement->execute();
            $code = $statement->get_result()->fetch_assoc();
            $statement->close();
            return $code;
        } else {
            return false;
        }
    }

    public function updatequotesaccept($codigocita)
    {
        $statement = $this->conn->prepare("UPDATE quotes SET available = 0, status = 0 WHERE idquotes = ?;");
        $statement->bind_param("s", $codigocita);
        $result = $statement->execute();
        $statement->close();
        if ($result) {
            $statement = $this->conn->prepare("SELECT users_idusers FROM quotes WHERE idquotes = ?");
            $statement->bind_param("s", $codigocita);
            $statement->execute();
            $code = $statement->get_result()->fetch_assoc();
            $statement->close();
            return $code;
        } else {
            return false;
        }
    }

    public function getchistories($iduser)
    {
        $resp = $this->conn->query("SELECT idclinical_histories, users_idusers, current_illness FROM clinical_histories WHERE users_idusers = '$iduser';");
        $result = array();
        while ($item = $resp->fetch_assoc()) {
            $result[] = $item;
        }
        return $result;
    }

    public function getquotesquantity()
    {
        $statement = $this->conn->prepare("SELECT COUNT(*) as total FROM quotes;");
        $statement->execute();
        $countquo = $statement->get_result()->fetch_assoc();
        $statement->close();
        if ($countquo) {
            return $countquo;
        } else {
            return false;
        }
    }

    public function insertconsultation($cedula, $fecha, $hora, $razon, $sintomas, $tconsulta)
    {
        $fechayh = $fecha . ' ' . $hora;
        $isSave = $this->requestAppointment($cedula, $fecha, $hora);
        if ($isSave) {
            $query = "INSERT INTO `reason_consultation`(`quotes_idquotes`, `reason`, `date`, `symptom`, `type_consult`) VALUES ((SELECT quotes.idquotes FROM quotes WHERE quotes.users_idusers = '$cedula' AND quotes.date_quotes = '$fecha' AND quotes.time_quotes = '$hora'),?,?,?,?);";
            $statement = $this->conn->prepare($query);
            $statement->bind_param("ssss", $razon, $fechayh, $sintomas, $tconsulta);
            $result = $statement->execute();
            $statement->close();
            if ($result) {
                return true;
            } else {
                $this->deleterequestappointment($cedula, $fecha, $hora);
                return false;
            }
        } else {
            return null;
        }
    }

    public function getallquotes()
    {
        $query = $this->conn->query("SELECT * FROM quotes;");
        $response = array();
        while ($item = $query->fetch_assoc())
            $response[] = $item;
        return $response;
    }

    public function getallconsultation()
    {
        $query = $this->conn->query("SELECT * FROM reason_consultation;");
        $response = array();
        while ($item = $query->fetch_assoc())
            $response[] = $item;
        return $response;
    }

    public function getallproviders()
    {
        $query = $this->conn->query("SELECT * FROM SELECT * FROM `provider`;");
        $response = array();
        while ($item = $query->fetch_assoc())
            $response[] = $item;
        return $response;
    }

    public function regwallet($service)
    {
        require_once '../php/adminsession.php';
        session_start();
        $usrsess = new AdminSession();
        $user = $usrsess->getCurrentUser();
        $curuser = $user['users_idusers'];
        $query = "INSERT INTO `wallet`(`users_idusers`, `claim_date`, `type_service`) VALUES (?,(SELECT NOW()), ?);";
        $statement = $this->conn->prepare($query);
        $statement->bind_param("ss", $curuser, $service);
        $result = $statement->execute();
        $statement->close();
        if ($result) {
            return $this->getUser($curuser);
        } else {
            return false;
        }
    }

    public function regprovider($idpro, $name, $phone, $contact, $city)
    {
        $curuser = $this->regwallet("REGISTRO PROVEEDOR");
        if ($curuser) {
            $query = "INSERT INTO `provider`(`idprovider`, `wallet_idservice`, `name`, `phoneprovider`, `contactdirect`, `city`) VALUES (?,(SELECT `idservice` FROM `wallet` WHERE `users_idusers` = '$curuser'),?,?,?,?);";
            $statement = $this->conn->prepare($query);
            $statement->bind_param("ssssss", $idpro, $name, $phone, $contact, $city);
            $result = $statement->execute();
            $statement->close();
            if ($result) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}