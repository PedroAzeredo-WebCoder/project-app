# Projeto de Desenvolvimento Web Avançado

Este projeto é desenvolvido como parte do meu estudo e aprimoramento profissional, inspirado no curso **"Desenvolvimento Web Avançado com PHP, Laravel e Vue.JS"** da [Udemy](https://www.udemy.com/course/curso-completo-do-desenvolvedor-laravel/), com diversas melhorias e práticas adicionais para simular um ambiente de trabalho real em equipe. Além de seguir o curso, estamos adaptando o projeto para utilizar versões mais recentes das tecnologias, como PHP 8.2 e Laravel 12.

## Objetivos

- Consolidar conhecimentos em **PHP**, **Laravel** e **Vue.JS**  
- Utilizar ferramentas e práticas modernas de desenvolvimento  
- Simular um ambiente profissional, seguindo boas práticas de times de desenvolvimento

## Tecnologias e Ferramentas Utilizadas

- **PHP** (Laravel Framework)  
- **Vue.JS** (Frontend SPA)  
- **Docker** (Ambientes isolados de desenvolvimento)  
- **Nginx** (Servidor web em container Docker)  
- **PostgreSQL** (Banco de dados em container Docker)  
- **Node.js** (Ambiente para build e gerenciamento de assets via Vite)  
- **Vite** (Build tool para frontend)  
- **Git Flow** (Estratégia de ramificação)  
- **Conventional Commits** (Padrão de mensagens de commit)  
- **PSR Standards** (Padrões de codificação PHP)  
- **ESLint + Prettier** (Padronização de código JavaScript)

## Metodologia de Trabalho

- Controle rigoroso de versões e branches seguindo o **Git Flow**  
- Mensagens de commit padronizadas com **Conventional Commits**  
- Organização de backend e frontend seguindo boas práticas de mercado  
- Ambientes isolados configurados via **Docker**, incluindo **Nginx**, **PostgreSQL** e **Node.js**  
- Otimização do frontend com **Vite** para desenvolvimento e build

## Instruções para Rodar o Projeto

### Requisitos

- Docker instalado

### Rodando o Projeto com Docker

1. **Iniciar o projeto**  
   ```bash
   docker-compose up --build -d
   ```

2. **Parar o projeto**  
   ```bash
   docker-compose down -v
   ```

---

### Limpeza de Cache do Docker

1. **Limpar cache de build de todos os serviços**  
   ```bash
   docker-compose build --no-cache
   ```

2. **Limpar cache de build de um serviço específico**  
   ```bash
   docker-compose build <nome-do-serviço> --no-cache
   ```

## ⚙️ Comandos Composer

Estes comandos executam o Composer **dentro** do container `php` usando o script `comp` definido em `composer.json`:

1. **Instalar todas as dependências**  
   ```bash
   composer comp install
   ```

2. **Instalar um pacote específico**  
   ```bash
   composer comp require vendor/<nome-do-pacote>
   ```

3. **Instalar um pacote como dependência de desenvolvimento**  
   ```bash
   composer comp require --dev vendor/<nome-do-pacote>
   ```

4. **Atualizar todas as dependências**  
   ```bash
   composer comp update
   ```

5. **Atualizar autoload**  
   ```bash
   composer comp dump-autoload -o
   ```

6. **Remover um pacote específico**  
   ```bash
   composer comp remove vendor/<nome-do-pacote>
   ```

## ⚡ Comandos Artisan

Você também pode encurtar qualquer comando do Artisan definindo o script `artisan` em `composer.json`:

1. **Exemplo – Criar uma view**  
   ```bash
   composer artisan make:view site/principal
   ```

*(substitua `make:view site/principal` por qualquer outro comando do Artisan, por exemplo `migrate`, `make:controller`, etc.)*

## 🚀 Comandos Adicionais Docker

1. **Visualizar logs de todos os containers**  
   ```bash
   docker-compose logs -f
   ```

2. **Reiniciar um serviço específico**  
   ```bash
   docker-compose restart <nome-do-serviço>
   ```

3. **Acessar o shell de um container**  
   ```bash
   docker-compose exec <nome-do-serviço> sh
   ```

4. **Visualizar status dos containers**  
   ```bash
   docker-compose ps
   ```

## Status do Projeto

🚧 **Em desenvolvimento** | Em constante evolução, com entregas organizadas em milestones e sprints.