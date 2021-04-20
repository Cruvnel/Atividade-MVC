<?php
namespace App\Controllers;

use Core\Controller;
use Core\Request;
use App\Models\User;


// Controller 02 - Este chama a página Home e mostra as informações

class HomeController extends Controller {
    
    public function index() { 


        $this->view('home'); // chamando a page que vai exibir 
    
    }
}

