<?php

namespace JoaoAmador\Agenda\Entity;

/**
 * @Entity
 */
class Usuario
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private int $id;

    /**
     * @Column(type="string")
     */
    //private string $nomeCurso;
    private string $nomeUsuario;

    /**
     * @Column(type="integer")
     */
    //private int $ch;
    private int $cpf;

    public function getId(): int
    {
        return $this->id;
    }


    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getNome(): string
    {
        return $this->nomeUsuario;
    }

    public function setNome($nome): void
    {
        $this->nomeUsuario = $nome;
    }

    public function getCpf(): int
    {
        return $this->cpf;
    }

    public function setCpf($cpf): void
    {
        $this->cpf = $cpf;
    }
}
