<?php

use JoaoAmador\Agenda\Controller\{
    Exclusao,
    FormularioEdicao,
    FormularioInsercao,
    Listar,
    Persistencia,
    Inicio
};

return [
    ''                  => Inicio::class,
    '/'                 => Inicio::class,
    '/index'            => Inicio::class,
    '/listar'    => Listar::class,
    '/novo'       => FormularioInsercao::class,
    '/salvar'     => Persistencia::class,
    '/excluir'    => Exclusao::class,
    '/alterar'    => FormularioEdicao::class,
];
