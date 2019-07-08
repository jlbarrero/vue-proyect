<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PersonaRepository")
 */
class Persona
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nombres;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $apellidos;

    /**
     * @ORM\Column(type="integer")
     */
    private $edad;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $sexo;

    /**
     * @ORM\Column(type="date")
     */
    private $fechaNac;

    /**
     * @ORM\Column(type="string", length=11)
     */
    private $noId;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $cantHijos;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $raza;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $salario;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $cargo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombres(): ?string
    {
        return $this->nombres;
    }

    public function setNombres(string $nombres): self
    {
        $this->nombres = $nombres;

        return $this;
    }

    public function getApellidos(): ?string
    {
        return $this->apellidos;
    }

    public function setApellidos(string $apellidos): self
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    public function getEdad(): ?int
    {
        return $this->edad;
    }

    public function setEdad(int $edad): self
    {
        $this->edad = $edad;

        return $this;
    }

    public function getSexo(): ?string
    {
        return $this->sexo;
    }

    public function setSexo(string $sexo): self
    {
        $this->sexo = $sexo;

        return $this;
    }

    public function getFechaNac(): ?\DateTimeInterface
    {
        return $this->fechaNac;
    }

    public function setFechaNac(\DateTimeInterface $fechaNac): self
    {
        $this->fechaNac = $fechaNac;

        return $this;
    }

    public function getNoId(): ?string
    {
        return $this->noId;
    }

    public function setNoId(string $noId): self
    {
        $this->noId = $noId;

        return $this;
    }

    public function getCantHijos(): ?int
    {
        return $this->cantHijos;
    }

    public function setCantHijos(?int $cantHijos): self
    {
        $this->cantHijos = $cantHijos;

        return $this;
    }

    public function getRaza(): ?string
    {
        return $this->raza;
    }

    public function setRaza(string $raza): self
    {
        $this->raza = $raza;

        return $this;
    }

    public function getSalario()
    {
        return $this->salario;
    }

    public function setSalario($salario): self
    {
        $this->salario = $salario;

        return $this;
    }

    public function getCargo(): ?string
    {
        return $this->cargo;
    }

    public function setCargo(string $cargo): self
    {
        $this->cargo = $cargo;

        return $this;
    }


    public function toArry():array
    {
        return [
            'id'=>$this->getId(),
            'nombres'=>$this->getNombres(),
            'apellidos'=>$this->getApellidos(),
            'edad'=>$this->getEdad(),
            'sexo'=>$this->getSexo(),
            'fechaNac'=>$this->getFechaNac(),
            'noId'=>$this->getNoId(),
            'cantHijos'=>$this->getCantHijos(),
            'raza'=>$this->getRaza(),
            'salario'=>$this->getSalario(),
            'cargo'=>$this->getCargo(),
        ];
    }
}
