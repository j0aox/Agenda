<?php include __DIR__ . '/../inicio-html.php'; ?>

<h1> <?= $titulo ?> </h1>

<form action="/salvar-info<?= isset($teste) ? '?id=' . $teste->getId() : ''; ?>" method="POST">
    <div class="mb-3">
        <label for="nome" class="form-label">Telefone ou Email</label>
        <input type="text" class="form-control" id="nome" name="tipoContato" value="<?= isset($teste) ? $teste->getTipoContato() : ''; ?>" autofocus>
    </div>

    <div class="mb-3">
        <label for="cpf" class="form-label">Descrição</label>
        <input type="text" class="form-control" id="cpf" name="descricao" value="<?= isset($teste) ? $teste->getDescricao() : ''; ?>">
    </div>

    <div class="mb-3">
        <label for="exampleFormControlSelect1">Selecione o</label>
        <select class="form-control" id="exampleFormControlSelect1" name="usuario_id">
            <?php foreach ($nomes as $nome) : ?>
                <option value="<?= isset($teste) ? $teste->getId() : ''; ?>"><?php echo $nome->getNome(); ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary" id="btnSalvar">Salvar</button>
    </div>

</form>

<?php include __DIR__ . '/../fim-html.php'; ?>