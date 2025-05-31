# Super Gestão

![Status](https://img.shields.io/badge/status-em%20desenvolvimento-yellow)
![Laravel](https://img.shields.io/badge/laravel-10.x-red)
![TailwindCSS](https://img.shields.io/badge/tailwindcss-3.x-blue)
![PHP](https://img.shields.io/badge/PHP-^8.1-777BB4?logo=php)

Sistema web desenvolvido com Laravel, Eloquent ORM e Tailwind CSS, voltado para o gerenciamento de empresas, clientes, produtos e serviços.

## Descrição

O Super Gestão é uma aplicação para controle e organização de processos empresariais. Com uma interface moderna feita com Tailwind CSS e construída com Laravel, o sistema oferece recursos para o gerenciamento de:

- Clientes  
- Fornecedores  
- Produtos  
- Serviços  
- Pedidos  

Utiliza o Eloquent ORM para facilitar o mapeamento objeto-relacional (ORM), tornando as interações com o banco de dados mais simples e elegantes.

## Tecnologias Utilizadas

- PHP  
- Laravel  
- Eloquent ORM  
- Tailwind CSS  
- MySQL (ou outro banco de dados compatível)  

## Como executar o projeto

1. Clone o repositório:
   ```bash
   git clone https://github.com/pedronns/super-gestao
   cd super-gestao
   ```

2. Instale as dependências do Laravel:
   ```bash
   composer install
   ```

3. Copie o arquivo de ambiente e configure:

   - Linux/macOS:
     ```bash
     cp .env.example .env
     ```

   - Windows (cmd):
     ```cmd
     copy .env.example .env
     ```

   - Windows (PowerShell):
     ```powershell
     Copy-Item .env.example .env
     ```

4. Gere a chave da aplicação:
   ```bash
   php artisan key:generate
   ```

5. Configure as variáveis do banco de dados no arquivo `.env`.

6. Execute as migrations:
   ```bash
   php artisan migrate
   ```

7. Inicie o servidor local:
   ```bash
   php artisan serve
   ```

8. Acesse via navegador:
   ```
   http://localhost:8000
   ```

## Funcionalidades

- Cadastro, edição e exclusão de clientes e fornecedores  
- Gestão de produtos com preços e descrições  
- Criação e acompanhamento de pedidos  
- Interface responsiva e moderna com Tailwind CSS  
- Manipulação de dados com Eloquent ORM  

## Status do Projeto

Em desenvolvimento

## Autor

Desenvolvido por Pedro Nunes
