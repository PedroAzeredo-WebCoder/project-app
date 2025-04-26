# Projeto de Desenvolvimento Web Avançado

Este projeto é desenvolvido como parte do meu estudo e aprimoramento profissional, inspirado no curso **"Desenvolvimento Web Avançado com PHP, Laravel e Vue.JS"**, com diversas melhorias e práticas adicionais para simular um ambiente de trabalho real em equipe.

## Objetivos

- Consolidar conhecimentos em **PHP**, **Laravel** e **Vue.JS**;
- Utilizar ferramentas e práticas modernas de desenvolvimento;
- Simular um ambiente profissional, seguindo boas práticas de times de desenvolvimento.

## Tecnologias e Ferramentas Utilizadas

- **PHP** (Laravel Framework)
- **Vue.JS** (Frontend SPA)
- **Docker** (Ambientes isolados de desenvolvimento)
- **Nginx** (Servidor web em container Docker)
- **PostgreSQL** (Banco de dados em container Docker)
- **Node.js** (Ambiente para build e gerenciamento de assets via Vite, também em container Docker)
- **Vite** (Build tool para frontend)
- **Git Flow** (Estratégia de ramificação)
- **Conventional Commits** (Padrão de mensagens de commit)
- **PSR Standards** (Padrões de codificação PHP)
- **ESLint + Prettier** (Padronização de código JavaScript)

## Metodologia de Trabalho

Este projeto busca replicar uma rotina de time de desenvolvimento, adotando:

- Controle rigoroso de versões e branches seguindo o **Git Flow**;
- Mensagens de commit padronizadas com **Conventional Commits**;
- Organização de backend e frontend seguindo boas práticas e padrões de mercado;
- Ambientes isolados configurados via **Docker**, incluindo **Nginx** para o servidor web, **PostgreSQL** para o banco de dados e **Node.js** para compilação de assets;
- Otimização do frontend com **Vite** para desenvolvimento e build.

## Como iniciar o projeto

> Em breve comandos detalhados para iniciar o ambiente Docker e preparar o projeto.

**Exemplo básico:**

```bash
# Subir containers
docker-compose up -d

# Instalar dependências PHP
docker exec -it nome_container_php composer install

# Instalar dependências Node.js
docker exec -it nome_container_node npm install

# Compilar assets
docker exec -it nome_container_node npm run dev

# Executar migrations
docker exec -it nome_container_php php artisan migrate
```

*(Esses comandos serão ajustados conforme a configuração final do ambiente.)*

## Status do Projeto

🚧 Em desenvolvimento | Em constante evolução, com entregas organizadas em milestones e sprints.