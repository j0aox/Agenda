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
    private string $nome;

    /**
     * @Column(type="integer")
     */
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
        return $this->nome;
    }

    public function setNome($nome): void
    {
        $this->nome = $nome;
    }

    public function getCpf(): int
    {
        return $this->cpf;
    }

    public function setCh($cpf): void
    {
        $this->ch = $cpf;
    }
}
