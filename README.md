# Puce

**Puce** é um processador de micro pagamentos escrito em PHP utilizando o framework Laravel. Ele é compatível com moedas derivadas do Bitcoin Core e foi desenvolvido utilizando Laravel 5.7 e PHP 7.2.

## Características

- **Compatibilidade**: Suporte para moedas derivadas do Bitcoin Core.
- **Framework**: Construído com Laravel 5.7.
- **Versão PHP**: Requer PHP 7.2.
- **Recursos**: `Transactions`, `Cache`, `Requests`, `Middlewares`, `2FA`, `Blade`, `Curl`

## Requisitos

- PHP 7.2 ou superior
- Composer
- Extensões PHP: `openssl`, `pdo`, `mbstring`, `tokenizer`, `xml`, `bcmath`, `curl`
- Servidor de banco de dados (MySQL, PostgreSQL, etc.)

## Instalação

Siga as etapas abaixo para configurar o Puce em seu ambiente local.

### 1. Clone o Repositório

```bash
git clone https://github.com/seu-usuario/puce.git
cd puce
```

### 2. Instale as Dependências
```bash
composer install
```

### 3. Configure o Ambiente
Renomeie o arquivo .env.example para .env:
```bash
cp .env.example .env
```

Abra o arquivo .env e configure as seguintes variáveis de ambiente:

```
APP_NAME=Puce
APP_ENV=local
APP_KEY=base64:gerar_sua_chave
APP_DEBUG=true
APP_URL=http://localhost

# Configurações do banco de dados
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nome_do_banco
DB_USERNAME=usuario_do_banco
DB_PASSWORD=senha_do_banco
```

### 4. Gere a Chave da Aplicação
```bash
php artisan key:generate
```

### 5. Execute as Migrações
```bash
php artisan migrate
```

### 6. Execute o Servidor de Desenvolvimento
```php
php artisan serve
```