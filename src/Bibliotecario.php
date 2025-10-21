<?php

namespace Tiago\Biblioteca;



class  Bibliotecario
{
    public static function emprestarLivro(Usuario $usuario, Livro $livro, Estante $estante)
    {
        echo '<hr>';

        if (!$usuario->podePegarEmprestado()) {
            throw new \Exception("O livro nao pode pegar emprestado");
            return false;
        }

        if (!$livro->estaDisponivel()) {
            throw new \Exception("O livro nao esta disponivel");
            return false;
        }

        if (!$estante->verificarLivro($livro)) {
            throw new \Exception("O livro nao esta estante");
            return false;
        }

        // Tudo certo: realiza o empréstimo
        $livro->marcarComoEmpretado();
        $usuario->adicionarLivroEmprestado($livro);
        $estante->removerLivro($livro);
        return true;
    }

    public static function devolverLivro(Usuario $usuario, Livro $livro, Estante $estante): bool
    {
        if ($livro->estaDisponivel()) {
         throw new \Exception("O livro esta disponivel");
            return false;
        }

        if ($estante->buscarLivroPorTItulo($livro->getTitulo())) {
           throw new \Exception("O livro ja esta disponivel");
            return false;
        }
        if (!in_array($livro, $usuario->listarLivrosEmprestadps())) {
          throw new \Exception("O livro nao esta com o usuario");
            return false;
        }

        $usuario->removerLivroEmprestado($livro);
        $estante->adicionarLivro($livro);
        $livro->marcarComoDisponivil();
        return true;
    }
}
