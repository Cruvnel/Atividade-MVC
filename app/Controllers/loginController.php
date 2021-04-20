<?php
namespace App\Controllers;

// Controller 01

use Core\Controller;
use Core\Request;
use App\Models\User;

class LoginController extends Controller {
    
    public function index(Request $request) {
        $userModel = new User();
       
        // Verificação da Senha

        if($request->post('pass') != $request->post('password')) {
            $this->view('login');
      
         // Verificação da Email

          } elseif(!filter_var($request->post('email'), FILTER_VALIDATE_EMAIL)) {
            $this->view('login');
           
            } else {

            $response = $userModel->record($request->post());
            
             // se o cadastro for concluído, seguirá para a page Home
            if($response) {
                $this->redirect('home');

             // se o cadastro não for concluído, reinicia a pagina
            } else {
                $this->view('login');
            }
        }
    }
}