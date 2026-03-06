<p align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="300" alt="Laravel Logo">
</p>

<h1 align="center">📚 Meu Acervo Digital</h1>

<p align="center">
  <strong>Organize suas leituras, construa sua estante virtual e acompanhe seu progresso!</strong>
</p>

<p align="center">
  <a href="#-sobre-o-projeto">Sobre</a> •
  <a href="#-tecnologias">Tecnologias</a> •
  <a href="#-funcionalidades">Funcionalidades</a> •
  <a href="#-arquitetura">Arquitetura</a> •
  <a href="#-como-executar">Como Executar</a> •
  <a href="#-licença">Licença</a>
</p>

---

## 📖 Sobre o Projeto

O **Meu Acervo Digital** é uma aplicação web moderna projetada para amantes da leitura. Com ele, você pode criar uma estante de livros virtual, buscar novos títulos, adicionar ao seu catálogo pessoal e registrar estatísticas de leitura detalhadas (Sessões de Leitura). 

Se você quer apenas registrar o que já leu, o que está lendo ou planejar leituras futuras, esta plataforma entrega uma experiência fluida e rica em detalhes.

---

## 🚀 Tecnologias

Este projeto foi desenvolvido utilizando as mais modernas tecnologias do ecossistema PHP e JavaScript:

### Backend
- **[Laravel 12](https://laravel.com/)** - O framework PHP mais elegante do mercado
- **[PHP 8.2+](https://php.net/)** - Linguagem de programação moderna e rápida
- **Design Patterns** - Repositories e Services (Boas práticas e código limpo)

### Frontend
- **[Vue.js 3](https://vuejs.org/)** (Composition API) - Framework progressivo de JavaScript
- **[Inertia.js](https://inertiajs.com/)** - Para criar SPAs sem criar uma API externa
- **[Tailwind CSS v4](https://tailwindcss.com/)** - Estilização baseada em utilitários para criar interfaces responsivas e lindas
- **[Vite](https://vitejs.dev/)** - O bundler frontend ultra-rápido do ecossistema web

---

## ✨ Funcionalidades

- 🔐 **Autenticação**: Registro e login de usuários de forma segura.
- 📚 **Catálogo de Livros**: Um CRUD completo para gerenciar títulos globais disponíveis na plataforma.
- 🗂 **Estante do Usuário (User Shelf)**: Adicione livros do catálogo à sua estante pessoal e defina o status (Quero Ler, Lendo, Lido, Abandonei).
- ⏱ **Sessões de Leitura**: Registre quantas páginas você leu por dia e o tempo gasto na leitura.
- 📊 **Dashboard Pessoal**: Visualize um resumo do seu avanço literário, número de livros concluídos e muito mais.

---

## 🏗 Arquitetura

O backend segue o paradigma robusto de uma arquitetura baseada em **Service Pattern** e **Repository Pattern**:

- **Controllers**: Lidam apenas com as requisições HTTP e retorno via Inertia.
- **Services**: Contém as regras de negócio complexas.
- **Repositories**: Injetados nos Services, abstraem a lógica do banco de dados (Eloquent ORM).
- **Service Providers**: Vinculam interfaces e implementações no Service Container do Laravel para manter o forte desacoplamento (ex: `AppServiceProvider`).

---

## ⚙️ Como Executar

### Pré-requisitos
Antes de começar, certifique-se de ter instalado na sua máquina:
- **PHP** (>= 8.2)
- **Composer** (Gerenciador de pacotes do PHP)
- **Node.js** & **NPM** (Para compilar os assets do frontend)
- **SQLite / MySQL** (Banco de dados)

### Passos para instalação

1. **Clone o repositório:**
   ```bash
   git clone https://github.com/seu-usuario/meu-acervo-digital.git
   cd meu-acervo-digital
   ```

2. **Instale as dependências do PHP:**
   ```bash
   composer install
   ```

3. **Instale as dependências do Frontend:**
   ```bash
   npm install
   ```

4. **Prepare o ambiente (.env):**
   Copie o arquivo de exemplo para gerar o arquivo `.env`:
   ```bash
   cp .env.example .env
   ```
   *Se estiver usando Windows, pode usar o comando: `copy .env.example .env`*

5. **Gere a chave da aplicação Laravel:**
   ```bash
   php artisan key:generate
   ```

6. **Configure e rode as Migrations (Banco de Dados):**
   ```bash
   php artisan migrate
   ```

7. **Compile os assets (Vite):**
   ```bash
   npm run build
   ```
   *Ou execute `npm run dev` para desenvolvimento com hot-reload ativo.*

8. **Inicie o servidor local do Laravel:**
   ```bash
   php artisan serve
   ```

Você agora poderá acessar a aplicação no seu navegador: `http://localhost:8000`.

---

## 📄 Licença

Este projeto não possui restrições e foi construído seguindo a licença padrão [MIT](https://opensource.org/licenses/MIT). 

---

<p align="center">
  Desenvolvido com 💙 para todos os bibliófilos de plantão.
</p>
