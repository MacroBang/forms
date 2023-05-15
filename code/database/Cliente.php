<?php

class ConnectionDB {

    private static $conn;

    public static function getConnection() {

        //se o atributo não conter a conexão
        if (empty(self::$conn)) {

            //abre o arquivo que contém o 
            $conn = parse_ini_file('code\config\acesso.ini');
            $localhost = $conn['localhost'];
            $database = $conn['database'];
            $user = $conn['user'];
            $password = $conn['password'];
            
            //cria instância da conexão com o banco
            self::$conn = new PDO("mysql:host=$localhost;dbname=$database", $user, $password);
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$conn;
    }

    //salvar cadastro
    public static function save($data) {
        
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
    
    public static function alter($data) {

        $conn = self::getConnection();

        $sql = "UPDATE cliente SET 
        nome = :nome,
        email = :email,
        numero_contato = :numero_contato,
        cpf = :cpf,
        senha = :senha 
        WHERE id = :id";

        $conn
        ->prepare($sql)
        ->execute([
        ':id'             => $data['id'],
        ':nome'           => $data['nome'],
        ':email'          => $data['email'],
        ':numero_contato' => $data['numero_contato'],
        ':cpf'            => $data['cpf'],
        ':senha'          => $data['senha']
        ]);
    }

    public static function delete($id) {
        
        $conn = self::getConnection();

        $sql = "DELETE FROM cliente WHERE id = :id";

        $conn
        ->prepare($sql)
        ->bindParam(':id', $id)
        ->execute();
    }
}