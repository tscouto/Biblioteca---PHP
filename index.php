
<?php
require_once 'vendor/autoload.php';

use Tiago\Biblioteca\Professor;
use Tiago\Biblioteca\Aluno;
use Tiago\Biblioteca\Livro;
use Tiago\Biblioteca\Estante;
use Tiago\Biblioteca\Bibliotecario;

echo 'Sistema de Biblioteca Inciadio! <br>';

// Criando os livros
$livro = new Livro('Tiago da Silva Couto', 'PHP 8 e OOP');
$livro1 = new Livro('Maria de Souza', 'JavaScript para Iniciantes');
$livro2 = new Livro('Carlos Pereira', 'Python nivel avancado');

// Criando estante e adicionando livros
$estante = new Estante();
$estante->adicionarLivro($livro);
$estante->adicionarLivro($livro1);
$estante->adicionarLivro($livro2);


$aluno = new Aluno('João',);
$professor = new Professor('Marcos'); // 🔹 ESTA LINHA É ESSENCIAL
// Bibliotecario::emprestarLivro($professor, $livro1, $estante);
// echo '<pre>';
// var_dump($estante);
// echo '</pre>';
try {
    Bibliotecario::emprestarLivro($professor, $livro1, $estante);
    echo "Livro:{$livro->getTitulo()} ermprestado para  " . $professor->getNome() . "<br>";
    Bibliotecario::devolverLivro($professor, $livro1, $estante);
    echo "Livro:{$livro->getTitulo()} devolvido para  " . $aluno->getNome() . '<br>';
    Bibliotecario::emprestarLivro($aluno, $livro1, $estante);
} catch (\Exception $e) {
    echo 'Erro: ' . $e->getMessage() . '<br>';
}
