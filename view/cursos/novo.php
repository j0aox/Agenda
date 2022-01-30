<?php include __DIR__ . '/../inicio-html.php'; ?>

<h1> <?= $titulo ?> </h1>

<form action="/salvar<?= isset($nomeUsuario) ? '?id=' . $nomeUsuario->getId() : ''; ?>" method="POST">
    <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" class="form-control" id="nome" name="nomeUsuario" value="<?= isset($nomeUsuario) ? $nomeUsuario->getNome() : ''; ?>" autofocus>
    </div>

    <div class="mb-3">
        <label for="cpf" class="form-label">CPF</label>
        <input type="number" class="form-control" id="birth-date" name="cpf" maxlength="14" value="<?= isset($nomeUsuario) ? $nomeUsuario->getCpf() : ''; ?>">
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary" id="btnSalvar">Salvar</button>
    </div>

</form>

<?php include __DIR__ . '/../fim-html.php'; ?>