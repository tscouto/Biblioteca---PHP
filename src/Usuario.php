<?php

namespace Tiago\Biblioteca;

use Tiago\Biblioteca\Livro;



abstract class Usuario
{

    protected string $nome;

    protected array $livrosEmpretados = [];

    public function __construct(string $nome)
    {
        $this->nome = $nome;
    }

    abstract public function podePegarEmprestado(): bool;

    public function adicionarLivroEmprestado(Livro $livro)
    {
        if ($this->podePegarEmprestado()) {
            $this->livrosEmpretados[] = $livro;
        } else {
            throw new \Exception("O usuario nao pode pegar livros emprestados mas ta tentando.");
        }
    }

    public function removerLivroEmprestado(Livro $livro)
    {
        $this->livrosEmpretados = array_filter(
            $this->livrosEmpretados,
            fn($livroAtual) => $livroAtual !== $livro

        );
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function listarLivrosEmprestadps(): array
    {
        return $this->livrosEmpretados;
    }
}
