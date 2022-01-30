<?php include __DIR__ . '/../inicio-html.php'; ?>

<h1> <?= $titulo ?> </h1>

<form action="/salvar<?= isset($curso) ? '?id=' . $curso->getId() : ''; ?>" method="POST">
    <div class="mb-3">
        <label for="nomeCurso" class="form-label">Nome</label>
        <input type="text" class="form-control" id="nomeCurso" name="nomeCurso" value="<?= isset($curso) ? $curso->getNomeCurso() : ''; ?>" autofocus>
    </div>

    <div class="mb-3">
        <label for="chCurso" class="form-label">CPF</label>
        <input type="number" class="form-control" id="chCurso" name="chCurso" value="<?= isset($curso) ? $curso->getCh() : ''; ?>">
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary" id="btnSalvar">Salvar</button>
    </div>

</form>

<?php include __DIR__ . '/../fim-html.php'; ?>