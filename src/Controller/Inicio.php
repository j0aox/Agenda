<?php

namespace JoaoAmador\Agenda\Controller;

class Inicio implements InterfaceControladoraRequisicao
{

    public function processaRequisicao(): void
    {
        $titulo = "Gerenciador de Contatos";
        include_once __DIR__ . "/../../view/inicio.php";
    }
}
