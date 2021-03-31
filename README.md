<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p>Essa API foic criada usando o <a href="https://laravel.com/docs/8.x/sanctum" target="_blank">Sanctum</a> que fornece um sistema de autenticação leve para API´s, SPA´s baseadas em tokens.<br></p>

## Usuário


- Register(Post): "api/register"
<p align="left">Nessa rota deve ser passsado as informações para poder criar seu usuário</p>

```js
{
"name":"Math",
"email":"math@gmail.com",
"password":"1233",
"password_confirmation":"1233"
}

```

<p>Retorno</p>
<b>O Token vai ser necessário para acessar as rotas protegidas</b>

```js
{
  "user": {
    "name": "Math",
    "email": "math@gmail.com",
    "updated_at": "2021-03-31T22:01:54.000000Z",
    "created_at": "2021-03-31T22:01:54.000000Z",
    "id": 1
  },
  "token": "1|yEC4J49HP31Vtsa17AuznfuUvLD3Jr3QIMSYZ3cD"
}

```

- Login(Post): "api/login"
<p align="left">Nessa rota deve ser passsado as informações corretas do usuário cadastrado</p>

```js
{

"email":"math@gmail.com",
"password":"1233"

}
```


<p>Retorno</p>
<b>O Token vai ser necessário para acessar as rotas protegidas</b>

```js
{
  "user": {
    "id": 1,
    "name": "Math",
    "email": "math@gmail.com",
    "email_verified_at": null,
    "created_at": "2021-03-31T22:01:54.000000Z",
    "updated_at": "2021-03-31T22:01:54.000000Z"
  },
  "token": "3|hO6ly4F2pNfmVJHmsuxOQ9Rxj0mCX0WY7Dy1t9Gk"
}

```


- Loggout(Post): "api/logout"
<p align="left">Essa rota irá destruir o token criado, impossibilitando qualquer acesso as rotas privadas</p>

<p>Retorno</p>


```js
{
  "message": "Logged out"
}

```


## Products

### Rotas públicas

- Show['GET']: api/products/:id
- Search['GET']: api/search/{name}
- Products['GET']: api/products

### Rotas Privadas
- Store['POST']: api/products
- Update['PUT']: api/products/{id}
- Delete['DELETE']: api/products/{id}

<hr>

- Store['POST']: api/products
<p align="left">Essa rota vai cadastar os produtos segundo suas informações</p>
<p align="left"> Deve ser adicionado uma autorização do tipo Bearer nesta rota</p>

```js
{
"name": "Iphone 3",
"description":"this is a product 7",
"price":"200.99",
"slug": "peoduct-7"
}
```
<p>Retorno</p>


```js
{
  "name": "Iphone45",
  "description": "this is a product 7",
  "price": "200.99",
  "slug": "peoduct-7",
  "updated_at": "2021-03-31T23:01:32.000000Z",
  "created_at": "2021-03-31T23:01:32.000000Z",
  "id": 6
}

```



- Update['PUT']: api/products/:id
<p align="left">Essa rota vai atualizar os produtos segundo suas informações</p>
<p align="left"> Deve ser adicionado uma autorização do tipo Bearer nesta rota</p>

```js
{
"name": "Product two",
"description":"this is a product 2",
"price":"199.99",
"slug": "product-two"
}
```
<p>Retorno</p>


```js
{
  "id": 2,
  "name": "Product two",
  "description": "this is a product 2",
  "price": "199.99",
  "slug": "product-two",
  "created_at": "2021-03-31T21:08:53.000000Z",
  "updated_at": "2021-03-31T21:17:00.000000Z"
}

```


- Delete['DELETE']: api/products/:id
<p align="left">Essa rota vai deletar determinado produto</p>
<p align="left"> Deve ser adicionado uma autorização do tipo Bearer nesta rota</p>


- Index['GET']: api/products
<p align="left">Essa rota vai retornar todos os produtos cadastrados</p>
<p align="left">Retorno</p>

```js
[
  {
    "id": 1,
    "name": "Product One",
    "description": "this is a product",
    "price": "99.99",
    "slug": "product-one",
    "created_at": "2021-03-31T20:47:06.000000Z",
    "updated_at": "2021-03-31T20:47:06.000000Z"
  },
  {
    "id": 4,
    "name": "Iphone",
    "description": "this is a product 3",
    "price": "499.99",
    "slug": "peoduct-two",
    "created_at": "2021-03-31T21:22:07.000000Z",
    "updated_at": "2021-03-31T21:22:07.000000Z"
  },
  {
    "id": 5,
    "name": "Iphone 13",
    "description": "this is a product43",
    "price": "609.99",
    "slug": "peoduct-two",
    "created_at": "2021-03-31T22:02:32.000000Z",
    "updated_at": "2021-03-31T22:02:32.000000Z"
  }
]
```


- Show['GET']: api/products/:id
<p align="left">Essa rota vai retornar determinado produto</p>
<p align="left">Retorno</p>

```js
{
  "id": 2,
  "name": "Product two",
  "description": "this is a product 2",
  "price": "499.99",
  "slug": "peoduct-two",
  "created_at": "2021-03-31T21:08:53.000000Z",
  "updated_at": "2021-03-31T21:08:53.000000Z"
}
```

- Search['GET']: api/products/search/:name
<p align="left">Essa rota vai retornar todas as informações de um produto segundo seu nome</p>
<p align="left">Retorno</p>

<p>Exemplo: http://127.0.0.1:8000/api/products/search/45</p>

<p>Retorno</p>

```js
[
  {
    "id": 6,
    "name": "Iphone45",
    "description": "this is a product 7",
    "price": "200.99",
    "slug": "peoduct-7",
    "created_at": "2021-03-31T23:01:32.000000Z",
    "updated_at": "2021-03-31T23:01:32.000000Z"
  }
]
```


