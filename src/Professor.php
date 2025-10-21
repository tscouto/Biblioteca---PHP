<?php

namespace Tiago\Biblioteca;


class Professor extends Usuario
{
    private const MAX_LIVROS_EMPRESTADOS = 3;

    public function podePegarEmprestado(): bool
    {
        return count($this->livrosEmpretados) <  self::MAX_LIVROS_EMPRESTADOS;
    }
}
