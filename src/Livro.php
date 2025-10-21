<?php

namespace Tiago\Biblioteca;

class Livro
{
    private string $titulo;
    private string $autor;
    private bool $disponivel = true;

    public function __construct(string $autor, string $titulo)
    {
        $this->titulo = $titulo;
        $this->autor = $autor;
    }

    public function marcarComoEmpretado()
    {
        $this->disponivel = false;
    }
    public function marcarComoDisponivil()
    {
        $this->disponivel = true;
    }
    public function estaDisponivel(): bool
    {
        return $this->disponivel;
    }

    // Metodo Getters
    public function getTitulo(): string
    {
        return $this->titulo;
    }

    public function getAutor(): string
    {
        return $this->autor;
    }
}
