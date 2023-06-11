<?php

use function PHPSTORM_META\map;

class UserModel
{
    private $email;
    private $password;
    private $db;
    private $dns;
    private $dns_user;
    private $dns_password;
    private $id;
    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;

        $this->dns_user = 'toto';
        $this->dns_password = 'password';
        $this->dns = 'mysql:dbname=piePHP;host=127.0.0.1';

        $dbh = new PDO($this->dns, $this->dns_user, $this->dns_password);

        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->db = $dbh;
    }
    public function create()
    {

        $sql = "INSERT INTO users (email, password) VALUES (:email,:pass)";
        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
        $pdo_statement->bindValue(':pass', $_POST['password'], PDO::PARAM_STR);
        $pdo_statement->execute();

        $this->lastInsertId();
    }
    public function lastInsertId()
    {
        $sql = "SELECT LAST_INSERT_ID() from users";
        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute();
        $this->id = $pdo_statement->fetch();
    }


    public function read()
    {
        $sql = ("SELECT * FROM users WHERE users.id= :id");
        $sth = $this->db->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
        $sth->execute(['id' => $this->id[0]]);
        $infos = $sth->fetch();
        return $infos;
    }
}
