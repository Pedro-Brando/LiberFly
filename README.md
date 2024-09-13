# Liberfly - Processo Seletivo Back-End

## [Vídeo da apresentação do código e seu funcionamento](https://www.loom.com/share/c313c2d6c7f442f9aff70aca6b06f2f8)

Este projeto foi desenvolvido como parte do processo seletivo da Liberfly. Ele é uma API RESTful construída com Laravel, utilizando autenticação JWT e documentada com Swagger.

## Funcionalidades

- **Listar Produtos**: Exibe uma lista de todos os produtos disponíveis.
- **Buscar Produto por ID**: Retorna os detalhes de um produto específico.
- **Autenticação JWT**: Requer que os usuários façam login para acessar as rotas protegidas.
- **Documentação com Swagger**: A API está documentada com o Swagger UI.

## Tecnologias Utilizadas

- **PHP** (Laravel)
- **MySQL** (Banco de Dados)
- **JWT** (Autenticação)
- **Swagger** (Documentação da API)

---

## Instalação e Configuração

### Requisitos do Sistema

- PHP >= 8.0
- Composer
- MySQL
- Node.js & NPM (opcional, caso tenha frontend ou assets para compilar)
  
### Passo 1: Clonar o Repositório

```bash
git clone https://github.com/seu-usuario/seu-repositorio.git
cd seu-repositorio
```

### Passo 2: Instalar Dependências
```bash
composer install
npm install
```

### Passo 3: Configurar o Arquivo .env
Crie um arquivo .env a partir do .env.example:
```bash
cp .env.example .env
```
```bash
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:sua_chave
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=liberfly
DB_USERNAME=root
DB_PASSWORD=
```

### Passo 4: Gerar a Chave da Aplicação
```bash
php artisan key:generate
```

### Passo 5: Rodar as Migrações
```bash
php artisan migrate --seed
```

### Passo 6: Iniciar o Servidor
```bash
php artisan serve
```

A aplicação estará rodando em http://localhost:8000.

## Autenticação JWT

### Rota de Login:
Você precisará autenticar um usuário para obter o token JWT. Use a rota de login:
- URL: /api/auth/login
- Método: POST
- Parâmetros:
-- email: Email do usuário.
-- password: Senha do usuário.
Exemplo de requisição (usando Postman ou cURL):
```bash
{
    "email": "email@example.com",
    "password": "password"
}
```
A resposta será um token JWT que deve ser usado nas outras requisições como autorização.

### Endpoints da API
# 1. Listar Produtos
- URL: /api/produtos
- Método: GET
- Autenticação: Bearer Token (JWT)
Exemplo de Resposta:
```bash
[
    {
        "id": 1,
        "nome": "Produto 1",
        "preco": "99.99",
        "descricao": "Descrição do produto 1"
    },
    {
        "id": 2,
        "nome": "Produto 2",
        "preco": "199.99",
        "descricao": "Descrição do produto 2"
    }
]
```

# 2. Buscar produto por ID
-URL: /api/produtos/{id}
-Método: GET
-Autenticação: Bearer Token (JWT)
Exemplo de Resposta:
```bash
{
    "id": 1,
    "nome": "Produto 1",
    "preco": "99.99",
    "descricao": "Descrição do produto 1"
}
```

### Testes Automatizados
Para rodar os testes de integração (Feature Tests), utilize o comando:
```bash
php artisan test
```

## Documentação da API com Swagger
A documentação da API foi gerada utilizando o Swagger. Para visualizar a documentação no navegador:

-Certifique-se de que a aplicação está rodando.
-Acesse http://localhost:8000/api/documentation.
A documentação mostrará todos os endpoints disponíveis, parâmetros, e exemplos de respostas.
