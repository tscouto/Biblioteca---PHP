<?php

namespace Tiago\Biblioteca;

class Estante
{
    private array $livros = [];

    public function adicionarLivro(Livro $livro): void
    {

        $this->livros[] = $livro;
    }

    public function removerLivro(Livro $livro): void
    {
        $this->livros = array_filter(
            $this->livros,
            // fn($livroAtual) => $livroAtual !== $livro);
            function ($LivroAtual) use ($livro) {
                echo 'Livro Atual : ' . $LivroAtual->getTitulo();
                if ($LivroAtual === $livro) {
                    echo 'Livro removido !';
                }
                echo '<br>';
                return $LivroAtual !== $livro;
            }
        );

        // $novosLivros = [];

        // foreach ($this->livros as $livroAtual) {
        //     if ($livroAtual !== $livro) {
        //         // Mantém o livro na nova lista
        //         array_push($novosLivros, $livroAtual);
        //     } else {
        //         // Livro removido
        //         echo 'Livro removido: ' . $livroAtual->getTitulo() . ' de ' . $livroAtual->getAutor() . '<br>';
        //     }
        // }

        // $this->livros = $novosLivros;
    }

    public function verificarLivro(Livro $livro): bool
    {
        return in_array($livro, $this->livros);
    }

    public function buscarLivroPorTItulo(string $titulo): ?Livro

    {
        foreach ($this->livros as $livro) {
            if (str_contains(strtolower($livro->getTitulo()), strtolower($titulo))) {
                return $livro;
            }
        }
        return null;
    }

    public function listarLivrosDisponivel(): array
    {
        $livrosDisponivels = [];
        foreach ($this->livros as $livrosAtuais) {
            if ($livrosAtuais->estaDisponivel()) {
                $livrosDisponivels[] = $livrosAtuais;
            }
        }

        return $livrosDisponivels;
        // return array_filter($this->livros, function($livroAtual){
        //     return $livroAtual->estaDisponivel();
        // });
    }
}
