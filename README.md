# Sistema de Biblioteca em PHP

## Descrição do Projeto

Este é um **sistema de gerenciamento de biblioteca** desenvolvido em **PHP** usando **Programação Orientada a Objetos (POO)**.
O projeto permite gerenciar livros, usuários (alunos e professores) e empréstimos de forma simples, simulando o funcionamento de uma biblioteca real.

O sistema foi desenvolvido como exercício para estudo de **classes, objetos, encapsulamento e métodos em PHP**.

## Funcionalidades

* Cadastro de **livros** com título, autor e disponibilidade.
* Cadastro de **usuários**, diferenciando **alunos** e **professores**.
* Sistema de **empréstimo e devolução de livros** (somente usuários autorizados podem pegar livros emprestados).
* Controle de **disponibilidade dos livros**.
* Consulta de livros disponíveis na estante.
* Busca de livros por título.

## Estrutura do Projeto

O projeto está organizado em **namespaces e classes** para facilitar a manutenção:

```
Tiago\Biblioteca
│
├─ Livro.php           # Classe Livro com título, autor e status de disponibilidade
├─ Usuario.php         # Classe abstrata Usuario com métodos para empréstimos
├─ Aluno.php           # Herda de Usuario
├─ Professor.php       # Herda de Usuario
├─ Estante.php         # Gerencia livros adicionados à estante
└─ Bibliotecario.php   # Classe responsável por realizar empréstimos e devoluções
```

## Exemplo de Uso

```php
<?php

use Tiago\Biblioteca\Livro;
use Tiago\Biblioteca\Estante;
use Tiago\Biblioteca\Aluno;
use Tiago\Biblioteca\Professor;
use Tiago\Biblioteca\Bibliotecario;

// Criando livros
$livro1 = new Livro('Tiago da Silva Couto', 'PHP 8 e OOP');
$livro1->marcarComoDisponivil();

$livro2 = new Livro('Maria de Souza', 'JavaScript para Iniciantes');
$livro2->marcarComoDisponivil();

// Criando estante e adicionando livros
$estante = new Estante();
$estante->adicionarLivro($livro1);
$estante->adicionarLivro($livro2);

// Criando usuários
$aluno = new Aluno('João');
$professor = new Professor('Marcos');

// Emprestando um livro
Bibliotecario::emprestarLivro($professor, $livro2, $estante);
```

## Como Rodar

1. Clone este repositório:

```bash
git clone https://github.com/seu-usuario/sistema-biblioteca.git
```

2. Abra o projeto em um servidor local, como **XAMPP** ou **Laragon**.
3. Execute os arquivos PHP no navegador ou terminal.
4. Utilize os métodos das classes para testar empréstimos, devoluções e consultas.

## Tecnologias Utilizadas

* PHP 8
* Programação Orientada a Objetos (POO)
* Namespaces

## Observações

* Este projeto é **educacional** e não inclui interface gráfica; toda interação é via código PHP.
* O sistema pode ser expandido para incluir **banco de dados, interface web e autenticação de usuários**.
