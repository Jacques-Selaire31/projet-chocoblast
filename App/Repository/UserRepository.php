<?php

namespace App\Repository;

use App\Entity\EntityInterface;
use App\Repository\AbstractRepository;
use App\Entity\User;

class UserRepository extends AbstractRepository{

    //Constructeur
    public function __construct()
    {
      $this->setConnexion();
    }

    // Ajouter un utilisateur
    public function saveUser(User $user):void{
       
        //1 Requête SQL
        $req="INSERT INTO users(firstname, lastname, email, pseudo, 'password', img_profile, grants, 'status') VALUE (?,?,?,?,?,?,?,?)";
        //2 Prepare
        $sql= $this->connexion->prepare($req);
        //3 Bind value
        $sql->bindValue(1,$user->getFirstname(), \PDO::PARAM_STR);
        $sql->bindValue(2,$user->getLastname(), \PDO::PARAM_STR);
        $sql->bindValue(3,$user->getEmail(), \PDO::PARAM_STR);
        $sql->bindValue(4,$user->getPseudo(), \PDO::PARAM_STR);
        $sql->bindValue(5,$user->getPassword(), \PDO::PARAM_STR);
        $sql->bindValue(6,$user->getImgProfil(), \PDO::PARAM_STR);
        $sql->bindValue(7,implode(",",$user->getGrants()), \PDO::PARAM_STR);
        $sql->bindValue(8,$user->getStatus(), \PDO::PARAM_BOOL);
        //4 Execute
        $sql->execute();
    }
    public function find(int $id): ?EntityInterface{
        $req="SELECT firstname, lastname, email, pseudo, img_profile AS imgProfil, grants AS tab, 'status' FROM users WHERE id = ?";
        //2 Prepare
        $sql= $this->connexion->prepare($req);
        //3 Bind param
        $sql->bindParam(1,$id, \PDO::PARAM_INT);
        //4 Execute
        $sql->execute();
        $sql->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, User::class); // On retourne un objet User
        $data= $sql->fetch();
        return $data;
    }
    public function findAll(): array{
        $req="SELECT firstname, lastname, email, pseudo, img_profile,  'status' FROM users";
        //2 Prepare
        $sql= $this->connexion->prepare($req);
        //4 Execute
        $sql->execute();
        $sql->setFetchMode(\PDO::FETCH_CLASS, User::class); // On retourne un objet User
        $data= $sql->fetchAll();
        return $data;
    }
    public function isAccountExist(string $email): bool
    {
        $req = "SELECT id FROM users WHERE email = ?";
        //2 Prepare
        $sql = $this->connexion->prepare($req);
        //3 Bind param
        $sql->bindParam(1, $email, \PDO::PARAM_STR);
        //4 Execute
        $sql->execute();
        $data = $sql->fetch(\PDO::FETCH_ASSOC);
        if (!empty($data)) {
            return true;
        }
        return false;
    }
    public function findAccoundByEmail(string $email):? User {
        $req = "SELECT firstname, lastname, email, pseudo, `password`, img_profile AS imgProfil, grants AS tab, 'status' FROM users WHERE email = ?";
        //2 Prepare
        $sql = $this->connexion->prepare($req);
        //3 Bind param
        $sql->bindParam(1, $email, \PDO::PARAM_STR);
        //4 Execute
        $sql->execute();
        $sql->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, User::class); // On retourne un objet User
        $data= $sql->fetch();
        return $data;
    }

}