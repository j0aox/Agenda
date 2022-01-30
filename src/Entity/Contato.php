<?php

namespace JoaoAmador\Agenda\Entity;


/**
 * @Entity
 */
class Contato
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
    private string $tipoContato;

    /**
     * @Column(type="string")
     */
    //private int $ch;
    private string $descricao;

    /**
     * @ManyToOne(targetEntity="Usuario")
     */
    private $usuario;

    public function getId(): int
    {
        return $this->id;
    }


    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getTipoContato(): string
    {
        return $this->tipoContato;
    }

    public function setTipoContato($nome): void
    {
        $this->tipoContato = $nome;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function setDescricao($descricao): void
    {
        $this->descricao = $descricao;
    }

    public function getIdUsuario()
    {
        return $this->usuario;
    }

    public function setIdUsuario($usuario)
    {
        return $this->usuario = $usuario;
    }

}


