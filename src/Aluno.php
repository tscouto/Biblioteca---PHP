<?php

namespace Tiago\Biblioteca;

class Aluno extends Usuario
{
    private int $maximoLivrosEmpretados = 1;

    public function podePegarEmprestado(): bool
    {
        if (count($this->livrosEmpretados) < $this->maximoLivrosEmpretados) {
            return true;
        }
        return false;
    }
}
