<?php

namespace JoaoAmador\Agenda\Controller;

use JoaoAmador\Agenda\Infra\EntityManagerCreator;
use JoaoAmador\Agenda\Entity\Usuario;


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
        $nomeUser = filter_input(INPUT_POST, 'nomeUsuario', FILTER_SANITIZE_STRING);
        $cpf   = filter_input(INPUT_POST, 'cpf', FILTER_VALIDATE_INT);

        // montar modelo curso
        $user = new Usuario;
        $user->setNome($nomeUser);
        $user->setCpf($cpf);

        // ATUALIZAR
        // pegar dados do formulario $_GET, usando filtros
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if (!is_null($id) && $id !== false) {
            // posso atualizar
            $user->setId($id);
            // Como já temos o id, não precisa fazer o find,
            // basta fazer um merge (juntar) ja tenho um entidade montada, so que una
            $this->entityManager->merge($user);
        } else {
            // Inserir no Banco
            $this->entityManager->persist($user);
        }

        $this->entityManager->flush();

        // redirecionar para outra pagina, false significa nao substituir o header, 302 movido temporaria
        header('Location: /listar', false, 302);
    }
}
