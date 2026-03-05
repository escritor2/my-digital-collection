<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Acervo Digital - README</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Oxygen', 'Ubuntu', 'Cantarell', sans-serif;
            line-height: 1.6;
            color: #1a1a1a;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            padding: 40px 20px;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            background: white;
            border-radius: 12px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
            overflow: hidden;
        }

        header {
            background: linear-gradient(135deg, #0D5A6D 0%, #2B8A9E 100%);
            color: white;
            padding: 60px 40px;
            text-align: center;
        }

        header h1 {
            font-size: 3.5em;
            margin-bottom: 10px;
            font-weight: 700;
            letter-spacing: -1px;
        }

        header .subtitle {
            font-size: 1.3em;
            opacity: 0.95;
            margin-bottom: 30px;
            font-weight: 300;
        }

        .badges {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 12px;
            margin-top: 20px;
        }

        .badge {
            display: inline-block;
            background: rgba(255, 255, 255, 0.2);
            color: white;
            padding: 8px 16px;
            border-radius: 6px;
            font-size: 0.9em;
            font-weight: 600;
            border: 1px solid rgba(255, 255, 255, 0.3);
            transition: all 0.3s ease;
        }

        .badge:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-2px);
        }

        main {
            padding: 60px 40px;
        }

        section {
            margin-bottom: 50px;
        }

        h2 {
            font-size: 2.2em;
            color: #0D5A6D;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 3px solid #0D5A6D;
            font-weight: 700;
        }

        h3 {
            font-size: 1.5em;
            color: #2B8A9E;
            margin-top: 25px;
            margin-bottom: 15px;
            font-weight: 600;
        }

        h4 {
            font-size: 1.2em;
            color: #1a1a1a;
            margin-top: 20px;
            margin-bottom: 10px;
            font-weight: 600;
        }

        p {
            margin-bottom: 15px;
            font-size: 1.05em;
            line-height: 1.8;
            color: #333;
        }

        .overview-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .card {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-left: 4px solid #0D5A6D;
            padding: 25px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(13, 90, 109, 0.2);
        }

        .card h4 {
            color: #0D5A6D;
            margin-top: 0;
        }

        .card p {
            margin-bottom: 0;
            font-size: 0.95em;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        thead {
            background: linear-gradient(135deg, #0D5A6D 0%, #2B8A9E 100%);
            color: white;
        }

        th {
            padding: 15px;
            text-align: left;
            font-weight: 600;
        }

        td {
            padding: 12px 15px;
            border-bottom: 1px solid #e0e0e0;
        }

        tbody tr:hover {
            background: #f8f9fa;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        code {
            background: #f5f5f5;
            padding: 2px 6px;
            border-radius: 4px;
            font-family: 'Courier New', monospace;
            color: #d63384;
            font-size: 0.9em;
        }

        pre {
            background: #1e1e1e;
            color: #d4d4d4;
            padding: 20px;
            border-radius: 8px;
            overflow-x: auto;
            margin: 20px 0;
            font-family: 'Courier New', monospace;
            font-size: 0.9em;
            line-height: 1.5;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        pre code {
            background: none;
            color: inherit;
            padding: 0;
        }

        .keyword { color: #569cd6; }
        .string { color: #ce9178; }
        .function { color: #dcdcaa; }
        .comment { color: #6a9955; }

        .diagram {
            background: #f8f9fa;
            border: 2px solid #0D5A6D;
            padding: 20px;
            border-radius: 8px;
            font-family: 'Courier New', monospace;
            font-size: 0.85em;
            overflow-x: auto;
            margin: 20px 0;
            white-space: pre;
            color: #0D5A6D;
        }

        .feature-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 15px;
            margin: 20px 0;
        }

        .feature-item {
            display: flex;
            align-items: flex-start;
            gap: 12px;
        }

        .feature-icon {
            font-size: 1.5em;
            min-width: 30px;
        }

        .feature-text h4 {
            margin-top: 0;
            margin-bottom: 5px;
        }

        .feature-text p {
            margin-bottom: 0;
            font-size: 0.95em;
            color: #666;
        }

        .steps {
            background: #f8f9fa;
            border-left: 4px solid #0D5A6D;
            padding: 25px;
            border-radius: 8px;
            margin: 20px 0;
        }

        .step {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
        }

        .step:last-child {
            margin-bottom: 0;
        }

        .step-number {
            background: #0D5A6D;
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            flex-shrink: 0;
        }

        .step-content h4 {
            margin-top: 0;
        }

        .step-content p {
            margin-bottom: 0;
        }

        .benefits {
            background: linear-gradient(135deg, #0D5A6D 0%, #2B8A9E 100%);
            color: white;
            padding: 30px;
            border-radius: 8px;
            margin: 20px 0;
        }

        .benefits h3 {
            color: white;
            border-bottom: 2px solid rgba(255, 255, 255, 0.3);
            padding-bottom: 10px;
        }

        .benefits-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .benefit-item {
            background: rgba(255, 255, 255, 0.1);
            padding: 15px;
            border-radius: 6px;
            border-left: 3px solid rgba(255, 255, 255, 0.5);
        }

        .benefit-item h4 {
            color: white;
            margin-top: 0;
        }

        .benefit-item p {
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 0;
        }

        .roadmap {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin: 20px 0;
        }

        .roadmap-item {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 6px;
            border-left: 4px solid #0D5A6D;
        }

        .roadmap-item input[type="checkbox"] {
            width: 20px;
            height: 20px;
            cursor: pointer;
        }

        .roadmap-item.completed {
            opacity: 0.6;
        }

        .roadmap-item.completed label {
            text-decoration: line-through;
        }

        .roadmap-item label {
            cursor: pointer;
            margin: 0;
            font-weight: 500;
        }

        .contribution-box {
            background: linear-gradient(135deg, #e9ecef 0%, #dee2e6 100%);
            border: 2px dashed #0D5A6D;
            padding: 25px;
            border-radius: 8px;
            margin: 20px 0;
        }

        .contribution-box h3 {
            margin-top: 0;
        }

        footer {
            background: #f8f9fa;
            padding: 40px;
            text-align: center;
            border-top: 1px solid #e0e0e0;
        }

        footer p {
            margin-bottom: 10px;
            font-size: 1em;
        }

        .social-links {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }

        .social-links a {
            display: inline-block;
            width: 40px;
            height: 40px;
            background: #0D5A6D;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            transition: all 0.3s ease;
            font-weight: 600;
        }

        .social-links a:hover {
            background: #2B8A9E;
            transform: translateY(-3px);
        }

        .highlight {
            background: #fff3cd;
            padding: 20px;
            border-left: 4px solid #ffc107;
            border-radius: 6px;
            margin: 20px 0;
        }

        .highlight strong {
            color: #856404;
        }

        @media (max-width: 768px) {
            header {
                padding: 40px 20px;
            }

            header h1 {
                font-size: 2.5em;
            }

            main {
                padding: 30px 20px;
            }

            h2 {
                font-size: 1.8em;
            }

            .badges {
                flex-direction: column;
                align-items: center;
            }

            .badge {
                width: 100%;
                text-align: center;
            }

            pre {
                font-size: 0.8em;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>📚 Meu Acervo Digital</h1>
            <p class="subtitle">Uma plataforma robusta, modular e escalável para gerenciamento pessoal de leitura</p>
            <div class="badges">
                <span class="badge">Laravel 11</span>
                <span class="badge">Vue.js 3</span>
                <span class="badge">Inertia.js</span>
                <span class="badge">Tailwind CSS 4</span>
                <span class="badge">PHP 8.3+</span>
                <span class="badge">MySQL 8.0+</span>
                <span class="badge">MIT License</span>
            </div>
        </header>

        <main>
            <!-- VISÃO GERAL -->
            <section>
                <h2>🎯 Visão Geral</h2>
                <p>O <strong>Meu Acervo Digital</strong> é um guia técnico avançado que demonstra a construção de uma aplicação moderna de gerenciamento de leitura utilizando o ecossistema Laravel. O projeto é um <strong>case study completo</strong> de arquitetura limpa, implementando padrões como <strong>Service Layer</strong>, <strong>Repository Pattern</strong> e <strong>Dependency Injection</strong>.</p>
                <p>Este projeto é ideal para desenvolvedores que desejam aprender ou aprofundar conhecimentos em:</p>
                <ul style="margin-left: 20px; margin-bottom: 15px;">
                    <li>Arquitetura de software em aplicações Laravel</li>
                    <li>Integração de frontend moderno (Vue.js 3) com backend robusto</li>
                    <li>Padrões de design e boas práticas de desenvolvimento</li>
                    <li>Estrutura modular e separação de responsabilidades</li>
                </ul>
            </section>

            <!-- FUNCIONALIDADES -->
            <section>
                <h2>✨ Funcionalidades Principais</h2>
                <div class="feature-list">
                    <div class="feature-item">
                        <div class="feature-icon">📖</div>
                        <div class="feature-text">
                            <h4>Catálogo Centralizado</h4>
                            <p>Gerenciamento de livros com ISBN, autor, descrição e metadados</p>
                        </div>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">📂</div>
                        <div class="feature-text">
                            <h4>Estante Personalizada</h4>
                            <p>Controle individual por usuário (Quero ler, Lendo, Lido, Abandonei)</p>
                        </div>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">⏱️</div>
                        <div class="feature-text">
                            <h4>Sessões de Leitura</h4>
                            <p>Registro detalhado com duração, páginas lidas e timestamps</p>
                        </div>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">📊</div>
                        <div class="feature-text">
                            <h4>Progresso Automático</h4>
                            <p>Atualização inteligente de status baseada em progresso</p>
                        </div>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">⭐</div>
                        <div class="feature-text">
                            <h4>Sistema de Avaliação</h4>
                            <p>Classificação de livros (1-5 estrelas)</p>
                        </div>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">🔐</div>
                        <div class="feature-text">
                            <h4>Isolamento de Dados</h4>
                            <p>Dados únicos por usuário com constraints de banco de dados</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- STACK TECNOLÓGICA -->
            <section>
                <h2>🛠️ Stack Tecnológica</h2>
                
                <h3>Backend</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Tecnologia</th>
                            <th>Versão</th>
                            <th>Propósito</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Laravel</strong></td>
                            <td>11</td>
                            <td>Framework PHP moderno e robusto</td>
                        </tr>
                        <tr>
                            <td><strong>PHP</strong></td>
                            <td>8.3+</td>
                            <td>Linguagem de programação</td>
                        </tr>
                        <tr>
                            <td><strong>Composer</strong></td>
                            <td>Latest</td>
                            <td>Gerenciador de dependências PHP</td>
                        </tr>
                        <tr>
                            <td><strong>Eloquent ORM</strong></td>
                            <td>Built-in</td>
                            <td>Abstração de banco de dados</td>
                        </tr>
                    </tbody>
                </table>

                <h3>Frontend</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Tecnologia</th>
                            <th>Versão</th>
                            <th>Propósito</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Vue.js</strong></td>
                            <td>3</td>
                            <td>Framework JavaScript reativo</td>
                        </tr>
                        <tr>
                            <td><strong>Inertia.js</strong></td>
                            <td>v1</td>
                            <td>Bridge entre Laravel e Vue.js</td>
                        </tr>
                        <tr>
                            <td><strong>Tailwind CSS</strong></td>
                            <td>4</td>
                            <td>Framework CSS utilitário</td>
                        </tr>
                        <tr>
                            <td><strong>Node.js</strong></td>
                            <td>LTS</td>
                            <td>Runtime JavaScript</td>
                        </tr>
                        <tr>
                            <td><strong>pnpm</strong></td>
                            <td>Latest</td>
                            <td>Gerenciador de pacotes otimizado</td>
                        </tr>
                    </tbody>
                </table>

                <h3>Banco de Dados</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Tecnologia</th>
                            <th>Versão</th>
                            <th>Propósito</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>MySQL</strong></td>
                            <td>8.0+</td>
                            <td>SGBD relacional</td>
                        </tr>
                    </tbody>
                </table>
            </section>

            <!-- INSTALAÇÃO -->
            <section>
                <h2>🚀 Instalação e Configuração</h2>
                
                <h3>Pré-requisitos</h3>
                <p>Certifique-se de ter as seguintes ferramentas instaladas:</p>
                <ul style="margin-left: 20px; margin-bottom: 20px;">
                    <li><strong>PHP 8.3+</strong></li>
                    <li><strong>Composer</strong></li>
                    <li><strong>Node.js (LTS)</strong></li>
                    <li><strong>pnpm</strong> - <code>npm install -g pnpm</code></li>
                    <li><strong>MySQL 8.0+</strong></li>
                </ul>

                <div class="steps">
                    <div class="step">
                        <div class="step-number">1</div>
                        <div class="step-content">
                            <h4>Clonar o Repositório</h4>
                            <pre><code>git clone https://github.com/seu-usuario/meu-acervo-digital.git
cd meu-acervo-digital</code></pre>
                        </div>
                    </div>

                    <div class="step">
                        <div class="step-number">2</div>
                        <div class="step-content">
                            <h4>Instalar Dependências</h4>
                            <pre><code>composer install
pnpm install</code></pre>
                        </div>
                    </div>

                    <div class="step">
                        <div class="step-number">3</div>
                        <div class="step-content">
                            <h4>Configurar Ambiente</h4>
                            <pre><code>cp .env.example .env
php artisan key:generate</code></pre>
                        </div>
                    </div>

                    <div class="step">
                        <div class="step-number">4</div>
                        <div class="step-content">
                            <h4>Configurar Banco de Dados</h4>
                            <p>Edite o arquivo <code>.env</code>:</p>
                            <pre><code>DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=meu_acervo_digital
DB_USERNAME=root
DB_PASSWORD=sua_senha</code></pre>
                            <p>Execute as migrações:</p>
                            <pre><code>php artisan migrate</code></pre>
                        </div>
                    </div>

                    <div class="step">
                        <div class="step-number">5</div>
                        <div class="step-content">
                            <h4>Executar a Aplicação</h4>
                            <p><strong>Terminal 1 - Backend:</strong></p>
                            <pre><code>php artisan serve</code></pre>
                            <p><strong>Terminal 2 - Frontend:</strong></p>
                            <pre><code>pnpm run dev</code></pre>
                            <p>Acesse em: <code>http://localhost:8000</code></p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ARQUITETURA -->
            <section>
                <h2>🏗️ Arquitetura do Sistema</h2>
                
                <h3>Fluxo de Dados</h3>
                <div class="diagram">┌─────────────────────────────────────────────────────────────┐
│                    Vue.js 3 Frontend (SPA)                  │
│                   (Componentes Reativos)                    │
└──────────────────────────┬──────────────────────────────────┘
                           │ HTTP Requests
                           ▼
┌─────────────────────────────────────────────────────────────┐
│              Inertia.js Bridge (Server-side)                │
│          (Renderização & Sincronização de Estado)           │
└──────────────────────────┬──────────────────────────────────┘
                           │ Props & Events
                           ▼
┌─────────────────────────────────────────────────────────────┐
│                  Laravel 11 Controllers                      │
│              (Orquestração de Requisições)                  │
└──────────────────────────┬──────────────────────────────────┘
                           │ Chamadas de Métodos
                           ▼
┌─────────────────────────────────────────────────────────────┐
│                   Service Layer (Negócio)                   │
│         (BookService, UserShelfService, etc.)               │
│     Implementa interfaces para injeção de dependência        │
└──────────────────────────┬──────────────────────────────────┘
                           │ Delegação de Dados
                           ▼
┌─────────────────────────────────────────────────────────────┐
│                Repository Layer (Dados)                     │
│      (BookRepository, UserBookRepository, etc.)             │
│     Abstração do Eloquent ORM para flexibilidade            │
└──────────────────────────┬──────────────────────────────────┘
                           │ Queries SQL
                           ▼
┌─────────────────────────────────────────────────────────────┐
│                   MySQL Database                            │
│          (Books, UserBooks, ReadingSessions)                │
└─────────────────────────────────────────────────────────────┘</div>

                <h3>Estrutura de Pastas</h3>
                <div class="diagram">meu-acervo-digital/
├── app/
│   ├── Interfaces/Modules/
│   │   ├── Book/
│   │   ├── UserShelf/
│   │   └── ReadingSession/
│   ├── Repositories/
│   ├── Services/
│   ├── Http/Controllers/
│   ├── Models/
│   └── Providers/
├── database/
│   ├── migrations/
│   └── seeders/
├── resources/
│   ├── js/
│   └── css/
├── routes/
└── config/</div>
            </section>

            <!-- PADRÕES DE DESIGN -->
            <section>
                <h2>📐 Padrões de Design Implementados</h2>
                
                <h3>1. Repository Pattern</h3>
                <p>O <strong>Repository Pattern</strong> abstrai a lógica de acesso a dados:</p>
                <pre><code><span class="comment">// Interface</span>
<span class="keyword">interface</span> <span class="function">BookRepositoryInterface</span> {
    <span class="keyword">public function</span> <span class="function">getAll</span>(): Collection;
    <span class="keyword">public function</span> <span class="function">findById</span>(<span class="keyword">int</span> $id): ?Book;
    <span class="keyword">public function</span> <span class="function">create</span>(<span class="keyword">array</span> $data): Book;
}

<span class="comment">// Implementação</span>
<span class="keyword">class</span> <span class="function">BookRepository</span> <span class="keyword">implements</span> BookRepositoryInterface {
    <span class="keyword">public function</span> <span class="function">getAll</span>(): Collection {
        <span class="keyword">return</span> Book::<span class="function">all</span>();
    }
}</code></pre>

                <div class="benefits">
                    <h3>Benefícios</h3>
                    <div class="benefits-grid">
                        <div class="benefit-item">
                            <h4>✅ Testabilidade</h4>
                            <p>Fácil criar mocks para testes</p>
                        </div>
                        <div class="benefit-item">
                            <h4>✅ Flexibilidade</h4>
                            <p>Trocar banco de dados sem alterar serviços</p>
                        </div>
                        <div class="benefit-item">
                            <h4>✅ Manutenibilidade</h4>
                            <p>Lógica de dados centralizada</p>
                        </div>
                    </div>
                </div>

                <h3>2. Service Layer</h3>
                <p>A <strong>Service Layer</strong> encapsula a lógica de negócio:</p>
                <pre><code><span class="keyword">class</span> <span class="function">BookService</span> <span class="keyword">implements</span> BookServiceInterface {
    <span class="keyword">public function</span> <span class="function">__construct</span>(
        <span class="keyword">private</span> BookRepositoryInterface $repository
    ) {}

    <span class="keyword">public function</span> <span class="function">createBook</span>(<span class="keyword">array</span> $data): Book {
        <span class="comment">// Validações de negócio</span>
        <span class="keyword">if</span> ($this->repository-><span class="function">findByTitleAndAuthor</span>(...)) {
            <span class="keyword">throw new</span> <span class="function">BookAlreadyExistsException</span>();
        }
        <span class="keyword">return</span> $this->repository-><span class="function">create</span>($data);
    }
}</code></pre>

                <h3>3. Dependency Injection</h3>
                <p>A <strong>Injeção de Dependência</strong> promove desacoplamento:</p>
                <pre><code><span class="comment">// Service Container</span>
$this->app-><span class="function">bind</span>(
    BookRepositoryInterface::<span class="keyword">class</span>,
    BookRepository::<span class="keyword">class</span>
);

<span class="comment">// Uso automático</span>
<span class="keyword">class</span> <span class="function">BookController</span> <span class="keyword">extends</span> Controller {
    <span class="keyword">public function</span> <span class="function">__construct</span>(
        <span class="keyword">private</span> BookServiceInterface $bookService
    ) {}
}</code></pre>
            </section>

            <!-- MODELOS DE DADOS -->
            <section>
                <h2>📊 Modelos de Dados</h2>
                
                <h3>Diagrama Entidade-Relacionamento</h3>
                <div class="diagram">┌──────────────┐         ┌──────────────┐         ┌──────────────────┐
│    Users     │         │    Books     │         │   UserBooks      │
├──────────────┤         ├──────────────┤         ├──────────────────┤
│ id (PK)      │◄────┐   │ id (PK)      │◄────┐   │ id (PK)          │
│ name         │     │   │ title        │     │   │ user_id (FK)     │
│ email        │     │   │ author       │     │   │ book_id (FK)     │
│ password     │     │   │ description  │     │   │ status           │
│ created_at   │     │   │ isbn         │     │   │ progress_pages   │
│ updated_at   │     │   │ page_count   │     │   │ rating           │
│              │     │   │ created_by   │     │   │ started_at       │
│              │     │   │ created_at   │     │   │ finished_at      │
│              │     │   │ updated_at   │     │   │ created_at       │
│              │     │   │              │     │   │ updated_at       │
└──────────────┘     │   └──────────────┘     │   └──────────────────┘
       │             │          │             │          │
       │             └──────────┘             │          │
       │                                      │          │
       │                                      └──────────┘
       │                                      
       └──────────────────┐
                          │
                   ┌──────────────────────┐
                   │ ReadingSessions      │
                   ├──────────────────────┤
                   │ id (PK)              │
                   │ user_id (FK)         │
                   │ user_book_id (FK)    │
                   │ started_at           │
                   │ ended_at             │
                   │ duration_minutes     │
                   │ pages_read           │
                   │ created_at           │
                   │ updated_at           │
                   └──────────────────────┘</div>
            </section>

            <!-- POR QUE ESTE STACK -->
            <section>
                <h2>💡 Por Que Este Stack?</h2>
                
                <div class="card">
                    <h4>Laravel 11</h4>
                    <ul style="margin-left: 20px;">
                        <li><strong>Ecossistema maduro:</strong> Comunidade ativa com bibliotecas robustas</li>
                        <li><strong>Eloquent ORM:</strong> Abstração elegante de banco de dados</li>
                        <li><strong>Migrações:</strong> Versionamento de schema automático</li>
                        <li><strong>Middleware:</strong> Tratamento de requisições flexível</li>
                        <li><strong>Service Container:</strong> Injeção de dependência nativa</li>
                    </ul>
                </div>

                <div class="card">
                    <h4>Vue.js 3</h4>
                    <ul style="margin-left: 20px;">
                        <li><strong>Reatividade:</strong> Sincronização automática de estado</li>
                        <li><strong>Composição:</strong> Reutilização de lógica com Composition API</li>
                        <li><strong>Performance:</strong> Virtual DOM otimizado</li>
                        <li><strong>Comunidade:</strong> Ecossistema rico de bibliotecas</li>
                    </ul>
                </div>

                <div class="card">
                    <h4>Inertia.js</h4>
                    <ul style="margin-left: 20px;">
                        <li><strong>Sem API REST:</strong> Comunica diretamente com controllers Laravel</li>
                        <li><strong>Props tipadas:</strong> Type-safety entre backend e frontend</li>
                        <li><strong>Roteamento unificado:</strong> Rotas definidas uma única vez</li>
                        <li><strong>Sem CORS:</strong> Simplifica desenvolvimento e deployment</li>
                    </ul>
                </div>

                <div class="card">
                    <h4>Tailwind CSS</h4>
                    <ul style="margin-left: 20px;">
                        <li><strong>Utilitário-first:</strong> Desenvolvimento rápido sem CSS customizado</li>
                        <li><strong>Responsivo:</strong> Mobile-first por padrão</li>
                        <li><strong>Temas:</strong> Fácil customização de cores e espaçamento</li>
                        <li><strong>Performance:</strong> Purga automática de CSS não utilizado</li>
                    </ul>
                </div>
            </section>

            <!-- ROADMAP -->
            <section>
                <h2>📚 Roadmap</h2>
                <div class="roadmap">
                    <div class="roadmap-item">
                        <input type="checkbox" id="v1-0" checked>
                        <label for="v1-0"><strong>v1.0</strong> - Funcionalidades core (Catálogo, Estante, Sessões)</label>
                    </div>
                    <div class="roadmap-item">
                        <input type="checkbox" id="v1-1">
                        <label for="v1-1"><strong>v1.1</strong> - Sistema de recomendações baseado em histórico</label>
                    </div>
                    <div class="roadmap-item">
                        <input type="checkbox" id="v1-2">
                        <label for="v1-2"><strong>v1.2</strong> - Integração com APIs de livros (Google Books, OpenLibrary)</label>
                    </div>
                    <div class="roadmap-item">
                        <input type="checkbox" id="v1-3">
                        <label for="v1-3"><strong>v1.3</strong> - Exportação de dados (PDF, CSV)</label>
                    </div>
                    <div class="roadmap-item">
                        <input type="checkbox" id="v2-0">
                        <label for="v2-0"><strong>v2.0</strong> - Funcionalidades sociais (Compartilhamento, Comunidades)</label>
                    </div>
                    <div class="roadmap-item">
                        <input type="checkbox" id="v2-1">
                        <label for="v2-1"><strong>v2.1</strong> - Mobile app (React Native)</label>
                    </div>
                    <div class="roadmap-item">
                        <input type="checkbox" id="v2-2">
                        <label for="v2-2"><strong>v2.2</strong> - IA para sugestões personalizadas</label>
                    </div>
                </div>
            </section>

            <!-- CONTRIBUIÇÃO -->
            <section>
                <h2>🤝 Guia de Contribuição</h2>
                
                <div class="contribution-box">
                    <h3>Como Contribuir</h3>
                    <div class="steps">
                        <div class="step">
                            <div class="step-number">1</div>
                            <div class="step-content">
                                <h4>Fork o repositório</h4>
                                <pre><code>git clone https://github.com/seu-usuario/meu-acervo-digital.git</code></pre>
                            </div>
                        </div>

                        <div class="step">
                            <div class="step-number">2</div>
                            <div class="step-content">
                                <h4>Crie uma branch para sua feature</h4>
                                <pre><code>git checkout -b feature/sua-feature</code></pre>
                            </div>
                        </div>

                        <div class="step">
                            <div class="step-number">3</div>
                            <div class="step-content">
                                <h4>Commit suas mudanças</h4>
                                <pre><code>git commit -m "feat: descrição clara da sua feature"</code></pre>
                            </div>
                        </div>

                        <div class="step">
                            <div class="step-number">4</div>
                            <div class="step-content">
                                <h4>Push para a branch</h4>
                                <pre><code>git push origin feature/sua-feature</code></pre>
                            </div>
                        </div>

                        <div class="step">
                            <div class="step-number">5</div>
                            <div class="step-content">
                                <h4>Abra um Pull Request</h4>
                                <p>Descreva as mudanças claramente, adicione testes se aplicável e referencie issues relacionadas.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <h3>Convenções de Commit</h3>
                <p>Seguimos <strong>Conventional Commits</strong>:</p>
                <pre><code><span class="string">feat:</span>     Nova funcionalidade
<span class="string">fix:</span>      Correção de bug
<span class="string">docs:</span>     Mudanças em documentação
<span class="string">style:</span>    Formatação, sem mudanças de lógica
<span class="string">refactor:</span> Refatoração de código
<span class="string">test:</span>     Adição ou atualização de testes
<span class="string">chore:</span>    Tarefas de build, dependências, etc.</code></pre>

                <h3>Padrões de Código</h3>
                <ul style="margin-left: 20px;">
                    <li><strong>PSR-12:</strong> Padrão de codificação PHP</li>
                    <li><strong>ESLint:</strong> Linting para JavaScript/Vue</li>
                    <li><strong>Prettier:</strong> Formatação automática</li>
                </ul>
                <pre><code><span class="comment"># Verificar padrões</span>
composer lint
pnpm lint

<span class="comment"># Corrigir automaticamente</span>
composer lint:fix
pnpm lint:fix</code></pre>
            </section>

            <!-- TROUBLESHOOTING -->
            <section>
                <h2>🔍 Troubleshooting</h2>

                <div class="highlight">
                    <strong>Problema:</strong> "Class not found" ao executar migrações
                    <p style="margin-top: 10px;"><strong>Solução:</strong></p>
                    <pre><code>composer dump-autoload
php artisan migrate</code></pre>
                </div>

                <div class="highlight">
                    <strong>Problema:</strong> Vite não compila assets
                    <p style="margin-top: 10px;"><strong>Solução:</strong></p>
                    <pre><code>rm -rf node_modules/.vite
pnpm install
pnpm run dev</code></pre>
                </div>

                <div class="highlight">
                    <strong>Problema:</strong> Erro de conexão com banco de dados
                    <p style="margin-top: 10px;"><strong>Solução:</strong></p>
                    <ol style="margin-left: 20px;">
                        <li>Verificar credenciais no <code>.env</code></li>
                        <li>Garantir que MySQL está rodando</li>
                        <li>Criar banco de dados manualmente se necessário</li>
                    </ol>
                </div>

                <div class="highlight">
                    <strong>Problema:</strong> Permissões de arquivo
                    <p style="margin-top: 10px;"><strong>Solução:</strong></p>
                    <pre><code>chmod -R 775 storage bootstrap/cache</code></pre>
                </div>
            </section>

            <!-- LICENÇA -->
            <section>
                <h2>📄 Licença</h2>
                <p>Este projeto está licenciado sob a <strong>Licença MIT</strong> - veja o arquivo LICENSE para detalhes.</p>
            </section>
        </main>

        <footer>
            <p><strong>Desenvolvido com ❤️ para a comunidade de desenvolvedores</strong></p>
            <p>Documentação completa: <a href="https://laravel.com/docs" style="color: #0D5A6D; text-decoration: none;"><strong>Laravel</strong></a> | <a href="https://vuejs.org/" style="color: #0D5A6D; text-decoration: none;"><strong>Vue.js</strong></a> | <a href="https://inertiajs.com/" style="color: #0D5A6D; text-decoration: none;"><strong>Inertia.js</strong></a></p>
            <div class="social-links">
                <a href="#" title="GitHub">GH</a>
                <a href="#" title="Twitter">TW</a>
                <a href="#" title="LinkedIn">LI</a>
            </div>
        </footer>
    </div>
</body>
</html>