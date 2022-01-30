<?php

namespace JoaoAmador\Agenda\Controller;

//use JoaoAmador\Agenda\Entity\Curso;
use JoaoAmador\Agenda\Entity\Usuario;
use JoaoAmador\Agenda\Controller\InterfaceControladoraRequisicao;
use JoaoAmador\Agenda\Infra\EntityManagerCreator;

class FormularioEdicao implements InterfaceControladoraRequisicao
{
    /**
     * @var \Doctrine\Common\Persistence\ObjectRepository
     */
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
        $id = filter_input(
            INPUT_GET,
            'id',
            FILTER_VALIDATE_INT
        );

        if (is_null($id) || $id === false) {
            header('Location: /listar');
            return;
        }

        $nomeUsuario = $this->repositorio->find($id);
        $titulo = "Atualizar Contato " . $nomeUsuario->getNome();
        require __DIR__ . '/../../view/cursos/novo.php';
    }
}
