
# Desafio Back-end MakeWeb

Primeiramente, obrigado pelo seu interesse em trabalhar na Agência MakeWeb! Abaixo você encontrará todos as informações necessárias para iniciar o seu teste.

## Índice

- [O Desafio](#o-desafio)
- [Pré-requisitos](#pré-requisitos)
- [Passos](#passos)
  1. [Realize o fork do repositório](#1-realize-o-fork-do-repositório)
  2. [Clone o repositório Forkado](#2-clone-o-repositório-forkado)
  3. [Instale as dependências Composer](#3-instale-as-dependências-composer)
  4. [Configurando .env](#4-configurando-env)
  5. [Configurando o Banco de Dados](#5-configurando-o-banco-de-dados)
  6. [Inicialize o servidor](#6-inicialize-o-servidor)
  7. [Gere uma chave de aplicação](#7-gere-uma-chave-de-aplicação)
  8. [Gere um link com storage](#8-gere-um-link-com-storage)
  9. [Execute as migrations e seeders](#9-execute-as-migrations-e-seeders)
- [O que será avaliado](#o-que-será-avaliado)
- [Links úteis](#links-úteis)
- [Desenvolvedores/Contribuintes](#desenvolvedorescontribuintes)

## O Desafio

O desafio consiste em desenvolver um site de filmes utilizando o framework Laravel junto com o Livewire. Este site terá três páginas principais:

1. Página de Listagem de Filmes: Uma página que exibe todos os filmes cadastrados.
2. Página de Cadastro de Filmes: Um formulário para adicionar novos filmes ao sistema.
3. Página de Visualização de Filme: Uma página que mostra os detalhes de um filme específico.

### Objetivos Principais

1. Formulário de Cadastro:
    - Implementar o formulário de cadastro de filmes utilizando as classes de formulário e atributos de validação do Livewire.
    - Certificar-se de que os filmes sejam salvos corretamente no banco de dados.

2. Listagem de Filmes:
    - Programar a página de listagem para exibir todos os filmes cadastrados.
    - Buscar os filmes diretamente do banco de dados.

3. Visualização de Filme:
    - Utilizar parâmetros de URL do Laravel para buscar e exibir os dados do filme.
    - Mostrar as informações detalhadas de um filme na página.

### Desafios Bônus

1. Paginação na Listagem de Filmes:
    - Adicionar a funcionalidade de paginação na página de listagem de filmes para melhorar a experiência do usuário em listas grandes.
2. Após cadastrar um novo filme, redirecionar o usuário para a página de visualização desse filme.
3. Mensagem de validação no formulário
    - Apresentar as mensagens de validação dos campos do formulário

## Pré-requisitos

- [PHP](https://www.php.net/) +8.2
- [Composer](https://getcomposer.org/download/)
- Acesso à internet.

## Passos

Esse teste tem como objetivo avaliar o seu conhecimento back-end em PHP e Laravel, portanto estamos considerando que você ja possua o conhecimento básico PHP, Laravel e versionamento de código com Git e GitHub.

### 1. Realize o fork do repositório

Primeiramente, faça um fork deste repositório para a sua conta do GitHub. Clique no botão "Fork" no canto superior direito da página.

### 2. Clone o repositório Forkado

Em seguida, clone o repositório forkado para a sua máquina local. No terminal, execute o comando:

```bash
git clone https://github.com/seu-usuario/nome-do-repositorio.git
```

Certifique-se de substituir seu-usuario pelo seu nome de usuário no GitHub e nome-do-repositorio pelo nome do repositório forkado.

### 3. Instale as dependências Composer

Navegue até o diretório do projeto clonado e instale as dependências necessárias:

```bash
cd nome-do-repositorio
composer install
```

### 4. Configurando .env

Copie o arquivo `.env.example` para `.env` com o comando:

```bash
cp .env.example .env
```

### 5. Configurando o Banco de Dados

O projeto está configurado para utilizar o SQLite como banco de dados, então vamos ensinar a como configurar o SQLite.

Para utilizar o SQLite é bem simples, apenas crie o arquivo `database.sqlite` dentro do diretório `database` dessa forma:

```bash
.
├── [...]
│
├── database
│   ├── factories
│   ├── migrations
│   ├── seeders
│   ├── .gitignore
│   └── database.sqlite # Crie esse arquivo
└── [...]
```

Caso possua o conhecimento e queira utilizar outro banco sinta-se à vontade.

### 6. Inicialize o servidor

Inicialize o servidor PHP:

```bash
php artisan serve
```

### 7. Gere uma chave de aplicação

Execute o seguinte comando para gerar uma chave de aplicação:

```bash
php artisan key:generate
```

### 8. Gere um link com storage

Execute o seguinte comando para gerar um link simbólico com a pasta storage:

```bash
php artisan storage:link
```

### 9. Execute as migrations e seeders

Se o projeto Laravel requer migrations e seeders, execute os seguintes comandos:

```bash
php artisan migrate

php artisan db:seed
```

## O que será avaliado

- Padrões de classe, atributos e métodos
- Utilização dos recursos disponíveis no Laravel e Livewire
- Conhecimento da linguagem e do framework
- Utilização correta de git

## Links úteis

- [PHP](https://www.php.net/)
- [Composer](https://getcomposer.org/)
- [Laravel](https://laravel.com/docs/11.x)
- [Livewire](https://livewire.laravel.com/)

<hr>

### `<?php echo 'Boa Sorte! 😄';`

## Solução

Objetivos principais e os 3 bônus implementados.

| Página | Rota | Como foi feito |
|---|---|---|
| Listagem | `/` | `Film::latest('id')->paginate(12)` com `WithPagination` (bônus 1) |
| Cadastro | `/cadastrar` | Form Object `App\Livewire\Forms\FilmForm` com atributos `#[Validate]` e mensagens em português (bônus 3); upload da capa com `WithFileUploads` no disco `public`; redireciona para o filme após salvar (bônus 2) |
| Visualização | `/ver/{film}` | Route Model Binding: o Laravel busca o filme pelo id da URL e devolve 404 se não existir |

Decisões:

- **Accessor `cover_url` no model `Film`**: as views usam `$film->cover_url` em vez de montar o caminho da imagem em cada lugar.
- **"Diretor"**: o layout original tinha esse campo, mas a tabela `films` não tem a coluna. Mantive a migration como veio e exibo a data de cadastro no lugar.
- **Ordenação por `id`**: ordenar só por `created_at` empatava quando vários filmes eram cadastrados no mesmo segundo (os testes pegaram isso).

### Testes

```bash
php artisan test
```

Cobrem o cadastro com upload, as mensagens de validação, a capa que não é imagem, a visualização (incluindo o 404) e a paginação. O `phpunit.xml` usa SQLite em memória.

## Desenvolvedores/Contribuintes

<table>
    <tbody>
        <tr>
            <td align="center" width="14.28%">
                <a href="https://github.com/vitorbizarra">
                    <img src="https://avatars.githubusercontent.com/u/79993997?v=4" width="100px;"
                        alt="Vitor Bizarra" />
                    <br />
                    <sub><b>Vitor Bizarra</b></sub>
                </a>
            </td>
        </tr>
    </tbody>
</table>

## Copyright ©️ 2024 - Agência MakeWeb
