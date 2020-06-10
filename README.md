![Rest-API](https://user-images.githubusercontent.com/23063152/84206685-100f5000-aa86-11ea-9289-0e3d8d0acfd7.png)

## TestBackEndBeta
Bem vindos a um pequeno exemplo de API Restfull utilizando framework **Laravel**, 
com autenticação do **Passport**.

Para a inicialização do projeto, siga os seguintes passos:

### Requisitos

1. Escolha um diretório no qual irá hospedar seu projeto localmente.
2. Tenha um servidor PHP e de banco de dados instalado:
> 2.1. Uma opção é o: [XAMPP](https://www.apachefriends.org/) - possui alguns servidores e já disponibiliza um servidor local PHP e MySQL.
3. Instalar o [GIT](https://git-scm.com/)  - responsável pelo versionamento de arquivos.
4. Instalar o composer [Composer](https://getcomposer.org/).

___

### Obtendo o repositório

+ Abra o terminal do seu computador e entre na pasta que deseja armazenar o projeto.
+ No seu terminal (cmd.exe no windows) da sua máquina escreva:
  - git clone link_repositorio.git (ex: git clone https://github.com/ThaiMedeiros/TestBackEndBeta.git)
  - Aguarde até que o download do projeto tenha terminado.
+ Entre na pasta do projeto, neste caso: **``cd api``**

### inicializando o projeto

+ Copie o arquivo: **.env.example** cole no mesmo diretório em que se encontra e remova a extensão **.example**. Então, coloque as credenciais de acesso ao seu banco de dados. 
+ Execute o xampp através do xampp.control **inicialize o Apache e o MySQL**, após acesse o **``http://localhost://phpmyadmin``** e crie um novo banco de dados.
+ Após a criação do banco, volte ao terminal na raiz do projeto **Laravel** e digite:
  - ``composer install`` ou ``composer update`` : para instalar as dependências do projeto.
  - ``php artisan key:generate`` : para gerar uma chave **APP_KEY=** criptografada, que pode ser usada posteriormente em autenticações se necessário.
  - ``php artisan migrate`` : para rodar as migrações/tabelas no banco de dados.
  - ``php artisan passport:install`` : irá gerar duas chavez criptografadas no banco para realizar as autenticações. 
  ! -- Observação: sempre que apagar todas as tabelas do banco de dados, rode o **passport:install** novamente após o **migrate**.
+ Caso queria popular o banco de dados para começar as suas requisições, execute: **``php artisan db:seed``**, ele irá rodar todos os seeders programados e populará o banco de dados automaticamente.
+ Para inicializar, execute no terminal o comando: **``php artisan serve``** e poderá acessá-lo através do endereço: ``http://localhost:8000``.

Depois de inicializado, já é possível começar os testes! Então, clique: [API](https://github.com/ThaiMedeiros/TestBackEndBeta/edit/master/api/README.md)
