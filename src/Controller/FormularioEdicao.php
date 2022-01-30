<?php

namespace JoaoAmador\Agenda\Controller;

use JoaoAmador\Agenda\Entity\Curso;
use JoaoAmador\Agenda\Controller\InterfaceControladoraRequisicao;
use JoaoAmador\Agenda\Infra\EntityManagerCreator;

class FormularioEdicao implements InterfaceControladoraRequisicao
{
    /**
     * @var \Doctrine\Common\Persistence\ObjectRepository
     */
    private $repositorioCursos;

    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())
            ->getEntityManager();
        $this->repositorioCursos = $entityManager
            ->getRepository(Curso::class);
    }

    public function processaRequisicao(): void
    {
        $id = filter_input(
            INPUT_GET,
            'id',
            FILTER_VALIDATE_INT
        );

        if (is_null($id) || $id === false) {
            header('Location: /listar');
            return;
        }

        $curso = $this->repositorioCursos->find($id);
        $titulo = "Atualizar curso " . $curso->getNomeCurso();
        require __DIR__ . '/../../view/cursos/novo.php';
    }
}
