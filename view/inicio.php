<?php include __DIR__ . '/inicio-html.php'; ?>

<div class="px-4 py-5 my-5 text-center">

  <h1 class="display-5 fw-bold"> <?= $titulo ?> </h1>
  <div class="col-lg-6 mx-auto">
    <p class="lead mb-4">Sistema Gerenciador de Contatos. Veja a listagem de contatos, cadastre novos contatos.</p>
    <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
      <a href="/listar" class="btn btn-primary btn-lg px-4 gap-3">Contatos</a>
    </div>
  </div>
</div>

<?php include __DIR__ . '/fim-html.php'; ?>