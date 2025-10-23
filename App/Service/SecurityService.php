<?php

namespace App\Service;

use App\Repository\UserRepository;
use App\Entity\User;

class SecurityService
{
    private readonly UserRepository $userRepository;
    private User $user;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
        $this->user = new User();
    }

    //Logique métier de la création de compte
    public function addUser() {}

    //Logique métier de la connexion
    public function connexion()
    {
        if (!$this->userRepository->isAccountExist($_POST["email"])) {
            return "Ce compte n'existe pas";
        }
        $this->user = $this->userRepository->findAccoundByEmail($_POST["email"]);
        //dd($this->user, $_POST["password"]);
        // dd($passwordDEMESCOUILLES = password_hash("password1", PASSWORD_DEFAULT));
        if ($this->user->verifPassword($_POST["password"])) {
            session_start();
            $_SESSION["firstname"]= $this->user->getFirstname();
            $_SESSION["lastname"]= $this->user->getLastname();
            $_SESSION["pseudo"]= $this->user->getPseudo();
            $_SESSION["email"]= $this->user->getEmail();
            $_SESSION["imgProfil"]= $this->user->getImgProfil();
            $_SESSION["status"]= $this->user->getStatus();
             header("Location: /profil");
            exit(); 
            return "Vous êtes connecté";
        }
    }

    //Logique métier de la déconnexion
    public function deconnexion() {}
}