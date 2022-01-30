<?php

namespace JoaoAmador\Agenda\Controller;

use JoaoAmador\Agenda\Entity\Curso;
use JoaoAmador\Agenda\Infra\EntityManagerCreator;

class Listar implements InterfaceControladoraRequisicao
{

    private $repositorioDeCursos;

    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())
            ->getEntityManager();
        $this->repositorioDeCursos = $entityManager
            ->getRepository(Curso::class);
    }

    public function processaRequisicao(): void
    {
        // pegar no repositorio
        $cursos = $this->repositorioDeCursos->findAll();
        $titulo = "Lista de Contatos";
        include_once __DIR__ . "/../../view/cursos/listar.php";
    }
}
