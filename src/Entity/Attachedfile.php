<?php

namespace App\Entity;

use App\Repository\AttachedfileRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AttachedfileRepository::class)
 */
class Attachedfile
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $IP;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Zone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ORACLE_HOME_Path;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ORACLE_BASE_Path;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ORACLE_SID;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $SGA;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $PGA;

    /**
     * @ORM\Column(type="boolean")
     */
    private $ORACLE_version;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getIP(): ?string
    {
        return $this->IP;
    }

    public function setIP(string $IP): self
    {
        $this->IP = $IP;

        return $this;
    }

    public function getZone(): ?string
    {
        return $this->Zone;
    }

    public function setZone(string $Zone): self
    {
        $this->Zone = $Zone;

        return $this;
    }

    public function getORACLEHOMEPath(): ?string
    {
        return $this->ORACLE_HOME_Path;
    }

    public function setORACLEHOMEPath(string $ORACLE_HOME_Path): self
    {
        $this->ORACLE_HOME_Path = $ORACLE_HOME_Path;

        return $this;
    }

    public function getORACLEBASEPath(): ?string
    {
        return $this->ORACLE_BASE_Path;
    }

    public function setORACLEBASEPath(string $ORACLE_BASE_Path): self
    {
        $this->ORACLE_BASE_Path = $ORACLE_BASE_Path;

        return $this;
    }

    public function getORACLESID(): ?string
    {
        return $this->ORACLE_SID;
    }

    public function setORACLESID(string $ORACLE_SID): self
    {
        $this->ORACLE_SID = $ORACLE_SID;

        return $this;
    }

    public function getSGA(): ?string
    {
        return $this->SGA;
    }

    public function setSGA(string $SGA): self
    {
        $this->SGA = $SGA;

        return $this;
    }

    public function getPGA(): ?string
    {
        return $this->PGA;
    }

    public function setPGA(string $PGA): self
    {
        $this->PGA = $PGA;

        return $this;
    }

    public function isORACLEVersion(): ?bool
    {
        return $this->ORACLE_version;
    }

    public function setORACLEVersion(bool $ORACLE_version): self
    {
        $this->ORACLE_version = $ORACLE_version;

        return $this;
    }
}
