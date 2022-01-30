<?php

namespace JoaoAmador\Agenda\Controller;

use JoaoAmador\Agenda\Entity\Usuario;
use JoaoAmador\Agenda\Infra\EntityManagerCreator;

class FormularioInsercaoInfo implements InterfaceControladoraRequisicao
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
        $nomes = $this->repositorio->findAll();
        $titulo = "Cadastro de Contato";
        include_once __DIR__ . "/../../view/cursos/add-info.php";
    }
}
