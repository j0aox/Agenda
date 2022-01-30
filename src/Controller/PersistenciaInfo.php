<?php

namespace JoaoAmador\Agenda\Controller;

use JoaoAmador\Agenda\Infra\EntityManagerCreator;
use JoaoAmador\Agenda\Entity\Usuario;
use JoaoAmador\Agenda\Entity\Contato;


class PersistenciaInfo implements InterfaceControladoraRequisicao
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
        $contato = filter_input(INPUT_POST, 'tipoContato', FILTER_SANITIZE_STRING);
        $descricao   = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
        $idUsuario   = filter_input(INPUT_POST, 'usuario_id', FILTER_SANITIZE_STRING);

        // montar modelo curso
        $contatoUser = new Contato;
        $contatoUser->setTipoContato($contato);
        $contatoUser->setDescricao($descricao);
        //$contatoUser->setIdUsuario($idUsuario);

        // ATUALIZAR
        // pegar dados do formulario $_GET, usando filtros
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if (!is_null($id) && $id !== false) {
            // posso atualizar
            $contatoUser->setId($id);
            // Como já temos o id, não precisa fazer o find,
            // basta fazer um merge (juntar) ja tenho um entidade montada, so que una
            $this->entityManager->merge($contatoUser);
        } else {
            // Inserir no Banco
            $this->entityManager->persist($contatoUser);
        }

        $this->entityManager->flush();

        // redirecionar para outra pagina, false significa nao substituir o header, 302 movido temporaria
        header('Location: /listar', false, 302);
    }
}
