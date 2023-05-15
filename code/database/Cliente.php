<?php

class ConnectionDB {

    private static $conn;

    public static function getConnection() {

        //se o atributo não conter a conexão
        if (empty(self::$conn)) {
            $conn = parse_ini_file('code\config\acesso.ini');
            $localhost = $conn['localhost'];
            $database = $conn['database'];
            $user = $conn['user'];
            $password = $conn['password'];
            
            self::$conn = new PDO("mysql:host=$localhost;dbname=$database", $user, $password);
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$conn;
    }

    //salvar e atualizar registro
    public static function save($data) {
        
        //instância com conexão do banco
        $conn = self::getConnection();

        $sql = "INSERT INTO cliente (nome, email, numero_contato, cpf, senha) 
        VALUES (:nome, :email, :numero_contato, :cpf, :senha)";
        
        $conn
        ->prepare($sql)
        ->execute([
            ':nome'           => $data['nome'],
            ':email'          => $data['email'],
            ':numero_contato' => $data['numero_contato'],
            ':cpf'            => $data['cpf'],
            ':senha'          => $data['senha']
        ]);
        return true;
    }

    

}