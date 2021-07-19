<p align="center">
    <a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
    <a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Testando as rotas de requisição

-   É possível realizar o teste das requisições de forma simples, baixe e instale um dos seguintes cliente de API REST:
    -   [Insomnia](https://insomnia.rest/)
    -   [Postman](https://www.postman.com/)

<br />

<p align="center">
    <a href="#observacoes"> :bookmark_tabs: Observações</a>&nbsp;&nbsp;|&nbsp;&nbsp;
    <a href="#autenticacao-api"> :closed_lock_with_key: Atutenticação na API</a>&nbsp;&nbsp;|&nbsp;&nbsp;
    <a href="#categorias"> :pushpin: Categorias</a>&nbsp;&nbsp;|&nbsp;&nbsp;
    <a href="#produtos"> :package: Produtos</a>&nbsp;&nbsp;|&nbsp;&nbsp;
    <a href="#licenca"> :memo: Licença</a>
</p>

<br />

<div id="observacoes" align="center">
    <h2> :bookmark_tabs: Observações</h2>
</div>

<div id="#" align="center">
  <h4>
    Algumas observações importantes para o uso e compreensão do Laravel.
  </h4>
</div>

1. Nas rotas que possui um parâmetro nela: **_{id}_** trocar pelo **número do ID** que queria requisitar.
2. Nas rotas **POST** e **PUT** enviar no Body (corpo) da requisição, os dados no formato **_JSON_**.

```bash
# Exemplo _JSON_ cadastro de produtos:
`
{
	"name": "teste 1",
	"price": 20,
	"description": "test test teste",
	"photo": "teste.jpg",
	"category_id": 2
}
`
```

3. Antes de testar, verifique quais dados são obrigatórios nos métodos do controller de cada rota.
4. Nas rotas protegidas pelo _auth:api_ é necessário incluir um **token** no **header** da requisição.
5. O _token_ é gerado ao logar, copie-o e insira no Header no seu client HTTP:
   5.1. nome do header: **Authorization**
   5.2. valor do header: **Bearer colar_token_gerado_aqui** (dê um espaço entre o _Bearer_ e o token).
   5.3. Exemplo na rota de cadastrar produtos:

<br />

![Header Authorization](https://user-images.githubusercontent.com/23063152/84219865-d18a8d00-aaa7-11ea-947f-702c88cf80a2.png)

<br />

6.  Apesar do CRUD aparentar ser uma única rota no arquivo de **routes/api.php**. O método **resources** do laravel diferencia as rotas de acordo com a requisição feita, se o Controller.php for criado commo um resouce e possuir as funções padrão:
    6.1. **(Index, Show, Store, Update e Destroy)**, a própria rota direciona para o método específico.

        | Tipos de Requisição |                      Descrição                      |
        | :-----------------: | :-------------------------------------------------: |
        |      **Index**      |          listar / busca todos os recursos.          |
        |      **Show**       |  listar / busca um recurso passado na requisição.   |
        |      **Store**      |             cadastra / cria um recurso.             |
        |     **Update**      | atualiza / altera um recurso passado na requisição. |
        |     **Destroy**     | deleta / excluir um recurso passado na requisição.  |

<br />

7. Lista de comandos básicos e úteis para lidar com os elementos do laravel

```bash
# caso altere algo manualmente, tode-o para que o composer mapeie novamente a estrutura da aplicação.
$ `composer dump-autoload`

# Tabelas / Seeders / Factorys

#Criar tabela
$ `php artisan make:migration create_name_table`

# Criar seeder
$ `php artisan make:seeder NomeTableSeeder`

# Roda todos os seeders que estiverem mapeados em DatabaseSeeder (padrão).
 $ `php artisan db:seed`

 # Executar seeder específico.
 $ `php artisan db:seed --class=NomeTableSeeder`

 # incluir o model é opcional, mas já faz a inserção e indica a qual está relacionado.
 # >> Facorys <<  são incluídos nos seeders para serem executados.
 $ `php artisan make:factory NomeFactory --model=Models\NameModel`

# Model / Controllers

# Cria um model.
$ `php artisan make:model Models\Name`

# Cria um model e sua respectiva tabela.
$ `php artisan make:model Models\Name -m`

# Cria um controller sem nenhum método.
$ `php artisan make:controller Pasta\NameController`

# Cria o controller com os métodos padrões.
$ `php artisan make:controller Pasta\NameController --resource`

# Routes / View

# Lista no terminal todas as rotas da aplicação, com alguns parâmetros, como: Controller e group.
$ `php artisan route:list`

# Limpa o cache de rotas da aplicação.
$ `php artisan route:cache`

# Limpa o cache de views da aplicação.
$ `php artisan view:clear`
```

<br />

<div id="autenticacao-api" align="center">
    <h2> :closed_lock_with_key: Atutenticação na API</h2>
</div>

<div id="#" align="center">
  <h4>
    Tabela com as informações de atutenticação na API.
  </h4>
</div>

<table class="table" align="center" style="text-align: center;">
    <thead>
        <tr>
            <th scope="col">Método</th>
            <th scope="col">Característica</th>
            <th scope="col">Rota</th>
            </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row" rowspan="2">GET</th>
            <td>Logout</td>
            <td><code>http://localhost:8000/api/logout</code></td>
        </tr>
        <tr>
            <td>Login (Rota default: exibe apenas uma mensagem.)</td>
            <td><code>http://localhost:8000/api/login</code></td>
        </tr>
        <tr>
            <th scope="row" rowspan="2">POST</th>
            <td>Register</td>
            <td><code>http://localhost:8000/api/register</code></td>
        </tr>
        <tr>
            <td>Logged</td>
            <td><code>http://localhost:8000/api/logged</code></td>
        </tr>
    </tbody>
</table>

<br />

<div id="categorias" align="center">
    <h2> :pushpin: Categorias</h2>
</div>

<div id="#" align="center">
  <h4>
    Tabela com as informações do CRUD de Categorias.
  </h4>
</div>

<table class="table" align="center" style="text-align: center;">
    <thead>
        <tr>
            <th scope="col">Método</th>
            <th scope="col">Característica</th>
            <th scope="col">Rota</th>
            </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row" rowspan="2">GET</th>
            <td>Listar / Buscar todas</td>
            <td><code>http://localhost:8000/api/categories</code></td>
        </tr>
        <tr>
            <td>Listar / Buscar uma específica</td>
            <td><code>http://localhost:8000/api/categories/{id}</code></td>
        </tr>
        <tr>
            <th scope="row">POST</th>
            <td>Cadastrar / Criar</td>
            <td><code>http://localhost:8000/api/categories</code></td>
        </tr>
        <tr>
            <th scope="row">PUT</th>
            <td>Atualizar / Alterar</td>
            <td><code>http://localhost:8000/api/categories/{id}</code></td>
        </tr>
        <tr>
            <th scope="row">DELETE</th>
            <td>Deletar / Excluir</td>
            <td><code>http://localhost:8000/api/categories/{id}</code></td>
        </tr>
    </tbody>
</table>

<br />

<div id="produtos" align="center">
    <h2> :package: Produtos</h2>
</div>

<div id="#" align="center">
  <h4>
    Tabela com as informações do CRUD de Produtos.
  </h4>
</div>

<table class="table" align="center" style="text-align: center;">
    <thead>
        <tr>
            <th scope="col">Método</th>
            <th scope="col">Característica</th>
            <th scope="col">Rota</th>
            </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row" rowspan="2">GET</th>
            <td>Listar / Buscar todos</td>
            <td><code>http://localhost:8000/api/products</code></td>
        </tr>
        <tr>
            <td>Listar / Buscar um específico</td>
            <td><code>http://localhost:8000/api/products/{id}</code></td>
        </tr>
        <tr>
            <th scope="row">POST</th>
            <td>Cadastrar / Criar</td>
            <td><code>http://localhost:8000/api/products</code></td>
        </tr>
        <tr>
            <th scope="row">PUT</th>
            <td>Atualizar / Alterar</td>
            <td><code>http://localhost:8000/api/products/{id}</code></td>
        </tr>
        <tr>
            <th scope="row">DELETE</th>
            <td>Deletar / Excluir</td>
            <td><code>http://localhost:8000/api/products/{id}</code></td>
        </tr>
    </tbody>
</table>

<br />

<div id="licenca" align="center">
    <h2> :memo: Licença</h2>
</div>

The Laravel framework is open-sourced software licensed :balance_scale: under the [MIT license](https://opensource.org/licenses/MIT).

---

Feito por: :copyright: Thaiza Medeiros :woman_technologist: :purple_heart:
