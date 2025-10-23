<?php

namespace App\Controller;

use App\Controller\AbstractController;
use App\Service\SecurityService;

class SecurityController extends AbstractController
{
    private readonly SecurityService $securityService;

    public function __construct()
    {
        $this->securityService = new SecurityService();
    }

    //Méthode login (se connecter)
    public function login()
    {
        $data = [];
        if ($this->formSubmit($_POST)) {
            $data["message"] = $this->securityService->connexion();
        }
        $this->render('login', 'login', $data);
    }

    //Méthode logout (se déconnecter)
    public function logout() {
         $this->securityService->deconnexion();
        $this->render('','');
    }

    //Méthode register (créer un compte User)
    public function register() {
         $this->securityService->addUser();
        $this->render('','');
    }
}