<?php

namespace JoaoAmador\Agenda\Controller;

//use JoaoAmador\Agenda\Entity\Curso;
use JoaoAmador\Agenda\Entity\Usuario;
use JoaoAmador\Agenda\Infra\EntityManagerCreator;

class Listar implements InterfaceControladoraRequisicao
{

    private $repositorio;

    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())
            ->getEntityManager();
        $this->repositorio = $entityManager
            ->getRepository(Usuario::class);
    }

    public function processaRequisicao(): void
    {
        // pegar no repositorio
        $nomes = $this->repositorio->findAll();
        $titulo = "Lista de Contatos";
        include_once __DIR__ . "/../../view/cursos/listar.php";
    }
}
