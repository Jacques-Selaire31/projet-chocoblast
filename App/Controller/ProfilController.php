<?php

namespace App\Controller;

use App\Controller\AbstractController;

class ProfilController extends AbstractController
{
    public function profil()
    {
        $this->render("profil", "profil");
    }
}
