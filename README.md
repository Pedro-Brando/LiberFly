# Liberfly - Processo Seletivo Back-End

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

###Passo 2: Instalar Dependências
```bash
composer install
npm install
```

###Passo 3: Configurar o Arquivo .env
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

###Passo 4: Gerar a Chave da Aplicação
```bash
php artisan key:generate
```

###Passo 5: Rodar as Migrações
```bash
php artisan migrate --seed
```

###Passo 6: Iniciar o Servidor
```bash
php artisan serve
```

A aplicação estará rodando em http://localhost:8000.
