<?php

namespace App\Models; 

class User {
  
    private static $table = "users";

    public static function getUsers(int $id) {
        
        $connPdo = new \PDO(DBDRIVE.': host='.DBHOST.'; dbname='.DBNAME, DBUSER, DBPASS);
        $sql = 'SELECT * FROM'.self::$table.'WHERE id = :id';
        $stmt = $connPdo->prepare($sql);
        $stmt->bindValue(':id', $id); 
        $stmt->execute();
        var_dump($stmt);
        if($stmt->rowCount() > 0) {
            print "teste";
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        } else {
            throw new \Exception("Nenhum usuario encontrado");        }
    }
}

