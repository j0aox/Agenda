<?php

namespace JoaoAmador\Agenda\Controller;

use JoaoAmador\Agenda\Infra\EntityManagerCreator;
use JoaoAmador\Agenda\Entity\Curso;


class Persistencia implements InterfaceControladoraRequisicao
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
        // pegar dados do formulario $_POST, usando filtros
        $nomeCurso = filter_input(INPUT_POST, 'nomeCurso', FILTER_SANITIZE_STRING);
        $chCurso   = filter_input(INPUT_POST, 'chCurso', FILTER_VALIDATE_INT);

        // montar modelo curso
        $curso = new Curso;
        $curso->setNomeCurso($nomeCurso);
        $curso->setCh($chCurso);

        // ATUALIZAR
        // pegar dados do formulario $_GET, usando filtros
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if (!is_null($id) && $id !== false) {
            // posso atualizar
            $curso->setId($id);
            // Como já temos o id, não precisa fazer o find,
            // basta fazer um merge (juntar) ja tenho um entidade montada, so que una
            $this->entityManager->merge($curso);
        } else {
            // Inserir no Banco
            $this->entityManager->persist($curso);
        }

        $this->entityManager->flush();

        // redirecionar para outra pagina, false significa nao substituir o header, 302 movido temporaria
        header('Location: /listar', false, 302);
    }
}
