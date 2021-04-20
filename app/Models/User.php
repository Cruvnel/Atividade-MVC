<?php

namespace App\Models;
use Core\Database;

class User {
   
    private $table = "user";

    public function getAll() {
        $db = Database::getInstance();
        
        return $db->getList($this->table, '*');
    }

    // Pegar Dados

    public function record($data = null) {
        $db = Database::getInstance();

        if($data == null || empty($data)) return false;

           // confirmar dados - se a senha/email não estiver certo

           if(!isset($data['pass']) || !isset($data['password']) || !isset($data['email'])) {
               return false;
           }
   
           if(filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        
           // gravar no banco 
           
           $data = [
            'nome' => $data['name'],
            'email' => $data['email'],
            'senha' => password_hash($data['pass'], PASSWORD_BCRYPT, ["cost" => 10]),
        ];

        return $db->insert($this->table, $data);
    }
  }

}