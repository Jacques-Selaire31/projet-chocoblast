<?php

namespace App\Entity;

use Dom\Entity;

class User implements EntityInterface
{
    private int $id;
    private ?string $firstname;
    private ?string $lastname;
    private ?string $pseudo;
    private ?string $email;
    private ?string $password;
    private ?string $imgProfil;
    private ?array $grants;
    private ?bool $status;
    public function __construct(?string $firstname=null, ?string $lastname=null, ?string $email=null, ?string $password=null)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * Get the value of id
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param int $id
     *
     * @return self
     */
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get the value of firstname
     *
     * @return string
     */
    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    /**
     * Set the value of firstname
     *
     * @param string $firstname
     *
     * @return self
     */
    public function setFirstname(?string $firstname): self
    {
        $this->firstname = $firstname;
        return $this;
    }

    /**
     * Get the value of lastname
     *
     * @return string
     */
    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    /**
     * Set the value of lastname
     *
     * @param string $lastname
     *
     * @return self
     */
    public function setLastname(?string $lastname): self
    {
        $this->lastname = $lastname;
        return $this;
    }

    /**
     * Get the value of pseudo
     *
     * @return ?string
     */
    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    /**
     * Set the value of pseudo
     *
     * @param ?string $pseudo
     *
     * @return self
     */
    public function setPseudo(?string $pseudo): self
    {
        $this->pseudo = $pseudo;
        return $this;
    }

    /**
     * Get the value of email
     *
     * @return string
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @param string $email
     *
     * @return self
     */
    public function setEmail(?string $email): self
    {
        $this->email = $email;
        return $this;
    }

    /**
     * Get the value of password
     *
     * @return string
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @param string $password
     *
     * @return self
     */
    public function setPassword(?string $password): self
    {
        $this->password = $password;
        return $this;
    }

    /**
     * Get the value of imgProfil
     *
     * @return ?string
     */
    public function getImgProfil(): ?string
    {
        return $this->imgProfil;
    }

    /**
     * Set the value of imgProfil
     *
     * @param ?string $imgProfil
     *
     * @return self
     */
    public function setImgProfil(?string $imgProfil): self
    {
        $this->imgProfil = $imgProfil;
        return $this;
    }

    /**
     * Get the value of grants
     *
     * @return ?array
     */
    public function getGrants(): ?array
    {
        return $this->grants;
    }

    /**
     * Set the value of grants
     *
     * @param ?array $grants
     *
     * @return self
     */
    public function setGrants(?array $grants): self
    {
        $this->grants = $grants;
        return $this;
    }

    /**
     * Get the value of status
     *
     * @return ?bool
     */
    public function getStatus(): ?bool
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @param ?bool $status
     *
     * @return self
     */
    public function setStatus(?bool $status): self
    {
        $this->status = $status;
        return $this;
    }

    public function hashPassword()
    {
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
    }
    public function verifPassword(string $plainPassword): bool
    {
        return password_verify($plainPassword, $this->password);
    }
}
