<?php

namespace JoaoAmador\Agenda\Controller;

class FormularioInsercao implements InterfaceControladoraRequisicao
{

    public function processaRequisicao(): void
    {
        $titulo = "Cadastro de Contato";
        include_once __DIR__ . "/../../view/cursos/novo.php";
    }
}
