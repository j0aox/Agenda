<?php include __DIR__ . '/../inicio-html.php'; ?>

<h1> <?= $titulo ?> </h1>

<a href="/novo" class="btn btn-primary mb-3">Novo Contato</a>

<ul class="list-group">
  <?php foreach ($cursos as $curso) : ?>
    <li class="list-group-item d-flex justify-content-between">
      <?php
      echo $curso->getNomeCurso() . " - " .
        $curso->getCh() ?>

      <span>
        <a href="/alterar?id=<?= $curso->getId(); ?>" class="btn btn-warning 
              btn-sm">Atualizar</a> &nbsp;
        <a href="/excluir?id=<?= $curso->getId(); ?>" class="btn btn-danger 
              btn-sm">Excluir</a> &nbsp;
      </span>
    </li>
  <?php endforeach; ?>
</ul>

<?php include __DIR__ . '/../fim-html.php'; ?>