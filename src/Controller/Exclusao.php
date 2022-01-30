<?php

namespace JoaoAmador\Agenda\Controller;

use JoaoAmador\Agenda\Infra\EntityManagerCreator;
//use JoaoAmador\Agenda\Entity\Curso;
use JoaoAmador\Agenda\Entity\Usuario;

class Exclusao implements InterfaceControladoraRequisicao
{
    /**
     * @var \Doctrine\ORM\EntityManagerInterface
     */
    private $entityManager;

    public function __construct()
    {
        $this->entityManager = (new EntityManagerCreator())
            ->getEntityManager();
    }

    public function processaRequisicao(): void
    {
        // pegar dados do formulario $_GET, usando filtros
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        // redirecionar
        if (is_null($id) || $id === false) {
            header('Location: /listar');
            return;
        }

        // pegar a referencia por id
        $usuario = $this->entityManager->getReference(Usuario::class, $id);
        //$curso = $entityManager->find($id);

        // apagar
        $this->entityManager->remove($usuario);
        $this->entityManager->flush();

        // redirecionar para outra pagina
        header('Location: /listar');
    }
}
