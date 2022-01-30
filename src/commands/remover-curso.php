<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use JoaoAmador\Agenda\Helper\EntityManagerFactory;
use JoaoAmador\Agenda\Entity\Curso;

// gerenciar a entidade de cursos
$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

// criar repositorio de cursos
$cursoRepository = $entityManager->getRepository(Curso::class);

// dados para usar na exclusão, o ID
$id = 8;

// buscar o curso pelo id
//$curso = $cursoRepository->find($id);
$curso = $entityManager->getReference(Curso::class, $id);

// vericar se o dado existe na base de dados
if (is_null($curso)) {
    echo "<p>Curso inexistente</p>";
}
// apagar o dado
$entityManager->remove($curso);

// confirmar as modificação
$entityManager->flush($curso);