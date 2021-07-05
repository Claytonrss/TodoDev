# TodoDev - A sua lista de tarefas

## Demonstração

![](tododev.gif)

## Tecnologias utilizadas

-   PHP
-   Laravel
-   MySQL
-   HTML5
-   CSS3
-   SASS
-   Bootstrap
-   Javascript
-   Jquery
-   Axios
-   API REST
-   PHPUnit

## Pré-requisitos

Antes de começar, você vai precisar ter instalado em sua máquina as seguintes ferramentas: Git, PHP (>= 7.0.0), Composer e MySQL.

## Rodando o Projeto

Clone o repositório

    git clone https://github.com/Claytonrss/TodoDev.git

Acesse a pasta do repositório

    cd TodoDev

Instale todas as dependências utilizando os comandos

    composer install
    npm install
    npm run dev

Definindo um banco de dados

    Utilizando o MySQL, crie um banco de dados com o nome tododev

Renomeie o arquivo .env_exemple para .env

    cp .env_exemple .env

Preencha o arquivo **.env** com as informações do servidor onde está criado o banco de dados

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=tododev
    DB_USERNAME=root
    DB_PASSWORD=

Execute o comando abaixo para criação e configuração das tabelas dentro do banco de dados

    php artisan migrate

Inicie o servidor de local

    php artisan serve

Agora você pode acessar o servidor em [http://localhost:8000](http://localhost:8000/)

## Especificação da API

Utilizando os passos anteriores, é possível também acessar a API construída com Laravel em [http://localhost:8000/api/](http://localhost:8000/api/)

### Endpoints:

#### Listar tarefas

`GET /api/todos`

Exemplo do corpo da resposta:

```JSON
{ {
  "type": "success",
  "todos": [
    {
      "id": 2,
      "description": "Criar Layout",
      "status": 0,
      "created_at": "2021-07-04T20:33:04.000000Z",
      "updated_at": "2021-07-04T20:33:04.000000Z"
    },
    {
      "id": 1,
      "description": "Finalizar API",
      "status": 0,
      "created_at": "2021-07-04T20:32:50.000000Z",
      "updated_at": "2021-07-04T20:32:50.000000Z"
    }
  ]
} }
```

#### Criar tarefa

`POST /api/todos`

Exemplo do corpo da requisição:

```JSON
{
	"description" : "",
	"status": 0
}
```

Exemplo do corpo da resposta:

```JSON
{
  "type": "success",
  "todo": {
    "id": 1,
    "description": "Finalizar API",
    "status": 0,
    "created_at": "2021-07-04T20:32:50.000000Z",
    "updated_at": "2021-07-04T20:38:35.000000Z"
  }
}
```

#### Atualizar tarefa

`PUT /api/todos/id`

Exemplo do corpo da requisição:

```JSON
{
	"status": 1
}
```

Exemplo do corpo da resposta:

```JSON
{
  "type": "success",
  "todo": {
    "id": 1,
    "description": "Finalizar API",
    "status": 1,
    "created_at": "2021-07-04T20:32:50.000000Z",
    "updated_at": "2021-07-04T20:38:35.000000Z"
  }
}
```

#### Deletar tarefa

`DELETE /api/todos/id`

Exemplo do corpo da resposta:

```JSON
{
  "type": "success"
}
```

## Rodando os Testes

Foi utilizado o PHPUnit para escrever os testes unitários. Para rodar os testes, execute o seguinte comando:

```
  ./vendor/bin/phpunit
```

## Autor

<a href="https://claytonrss.github.io/">
 <img style="border-radius: 50%;" src="https://avatars.githubusercontent.com/u/33030911?v=4" width="100px;" alt=""/>
 <br />
 
Feito com ❤️ por <a href="https://claytonrss.github.io/" title="Clayton Rafael">Clayton Rafael</a> 👋🏽 Entre em contato!

[![](https://img.shields.io/badge/WhatsApp-25D366?style=for-the-badge&logo=whatsapp&logoColor=white&link=https://wa.me/5511965280345)](https://wa.me/5511965280345) [![Gmail Badge](https://img.shields.io/badge/Gmail-D14836?style=for-the-badge&logo=gmail&logoColor=white&link=mailtoclayton.rssouza@gmail.com)](mailto:clayton.rssouza@gmail.com) [![Linkedin Badge](https://img.shields.io/badge/LinkedIn-0077B5?style=for-the-badge&logo=linkedin&logoColor=white&link=https://www.linkedin.com/in/clayton-rafael-62b908146/)](https://www.linkedin.com/in/clayton-rafael-62b908146/) [![Linkedin Badge](https://img.shields.io/badge/Instagram-E4405F?style=for-the-badge&logo=instagram&logoColor=white&link=https://www.instagram.com/clayton.rssouza/)](https://www.instagram.com/clayton.rssouza/)

## 📝 Licença

Este projeto esta sobe a licença [MIT](./LICENSE).
