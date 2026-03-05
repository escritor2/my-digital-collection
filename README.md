📚 Meu Acervo DigitalUma plataforma robusta, modular e escalável para gerenciamento pessoal de leitura





🎯 Visão GeralO Meu Acervo Digital é um guia técnico avançado que demonstra a construção de uma aplicação moderna de gerenciamento de leitura utilizando o ecossistema Laravel. O projeto é um case study completo de arquitetura limpa, implementando padrões como Service Layer, Repository Pattern e Dependency Injection, garantindo um código testável, manutenível e escalável.Este projeto é ideal para:•Arquitetura de software em aplicações Laravel•Integração de frontend moderno (Vue.js 3) com backend robusto•Padrões de design e boas práticas de desenvolvimento•Estrutura modular e separação de responsabilidades✨ Funcionalidades Principais🛠️ Stack TecnológicaBackendFrontendBanco de DadosLaravel 11Vue.js 3MySQL 8.0+PHP 8.3+Inertia.js v1ComposerTailwind CSS 4Eloquent ORMNode.js LTSpnpm🚀 Instalação e ConfiguraçãoPré-requisitosCopiar✓ PHP 8.3+
✓ Composer
✓ Node.js (LTS)
✓ pnpm (npm install -g pnpm)
✓ MySQL 8.0+
Passo a Passo1️⃣ Clonar o RepositórioCopiargit clone https://github.com/seu-usuario/meu-acervo-digital.git
cd meu-acervo-digital
2️⃣ Instalar DependênciasCopiarcomposer install
pnpm install
3️⃣ Configurar AmbienteCopiarcp .env.example .env
php artisan key:generate
4️⃣ Configurar Banco de DadosEdite o arquivo .env:CopiarDB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=meu_acervo_digital
DB_USERNAME=root
DB_PASSWORD=sua_senha
Execute as migrações:php artisan migrate5️⃣ Executar a AplicaçãoTerminal 1 - Backend:php artisan serveTerminal 2 - Frontend:pnpm run devAcesse em: http://localhost:8000🏗️ Arquitetura do SistemaFluxo de DadosCopiar┌─────────────────────────────────────────────────────────────┐
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
└─────────────────────────────────────────────────────────────┘
Estrutura de PastasCopiarmeu-acervo-digital/
├── app/
│   ├── Interfaces/Modules/
│   │   ├── Book/
│   │   │   ├── BookRepositoryInterface.php
│   │   │   └── BookServiceInterface.php
│   │   ├── UserShelf/
│   │   │   ├── UserBookRepositoryInterface.php
│   │   │   └── UserBookServiceInterface.php
│   │   └── ReadingSession/
│   │       ├── ReadingSessionRepositoryInterface.php
│   │       └── ReadingSessionServiceInterface.php
│   ├── Repositories/
│   │   ├── BookRepository.php
│   │   ├── UserBookRepository.php
│   │   └── ReadingSessionRepository.php
│   ├── Services/
│   │   ├── BookService.php
│   │   ├── UserShelfService.php
│   │   └── ReadingSessionService.php
│   ├── Http/Controllers/
│   ├── Models/
│   └── Providers/
├── database/migrations/
├── resources/
│   ├── js/
│   └── css/
├── routes/
└── config/
📐 Padrões de Design Implementados1. Repository PatternO Repository Pattern abstrai a lógica de acesso a dados:Copiar// Interface
interface BookRepositoryInterface {
    public function getAll(): Collection;
    public function findById(int $id): ?Book;
    public function create(array $data): Book;
    public function update(int $id, array $data): Book;
    public function delete(int $id): bool;
    public function findByTitleAndAuthor(string $title, string $author): ?Book;
}

// Implementação
class BookRepository implements BookRepositoryInterface {
    public function getAll(): Collection {
        return Book::all();
    }

    public function findById(int $id): ?Book {
        return Book::find($id);
    }

    public function create(array $data): Book {
        return Book::create($data);
    }
}
Benefícios:•✅ Testabilidade: Fácil criar mocks para testes•✅ Flexibilidade: Trocar banco de dados sem alterar serviços•✅ Manutenibilidade: Lógica de dados centralizada2. Service LayerA Service Layer encapsula a lógica de negócio:Copiarclass BookService implements BookServiceInterface {
    public function __construct(
        private BookRepositoryInterface $repository
    ) {}

    public function createBook(array $data): Book {
        // Validações de negócio
        if ($this->repository->findByTitleAndAuthor($data['title'], $data['author'])) {
            throw new BookAlreadyExistsException();
        }
        
        return $this->repository->create($data);
    }

    public function getAllBooks(): Collection {
        return $this->repository->getAll();
    }
}
Benefícios:•✅ Centralização de regras de negócio•✅ Reutilização de lógica em múltiplos controladores•✅ Facilita testes unitários3. Dependency InjectionA Injeção de Dependência promove desacoplamento:Copiar// Service Container (AppServiceProvider)
$this->app->bind(BookRepositoryInterface::class, BookRepository::class);
$this->app->bind(BookServiceInterface::class, BookService::class);

// Uso automático
class BookController extends Controller {
    public function __construct(
        private BookServiceInterface $bookService
    ) {}

    public function index() {
        $books = $this->bookService->getAllBooks();
        return inertia('Books/Index', ['books' => $books]);
    }
}
Benefícios:•✅ Código desacoplado e flexível•✅ Fácil substituição de implementações•✅ Melhor testabilidade📊 Modelos de DadosDiagrama Entidade-RelacionamentoCopiar┌──────────────┐         ┌──────────────┐         ┌──────────────────┐
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
                   └──────────────────────┘
💡 Por Que Este Stack?•Ecossistema maduro: Comunidade ativa com bibliotecas robustas•Eloquent ORM: Abstração elegante de banco de dados•Migrações: Versionamento de schema automático•Middleware: Tratamento de requisições flexível•Service Container: Injeção de dependência nativa•Reatividade: Sincronização automática de estado•Composição: Reutilização de lógica com Composition API•Performance: Virtual DOM otimizado•Comunidade: Ecossistema rico de bibliotecas•Sem API REST: Comunica diretamente com controllers Laravel•Props tipadas: Type-safety entre backend e frontend•Roteamento unificado: Rotas definidas uma única vez•Sem CORS: Simplifica desenvolvimento e deployment•Utilitário-first: Desenvolvimento rápido sem CSS customizado•Responsivo: Mobile-first por padrão•Temas: Fácil customização de cores e espaçamento•Performance: Purga automática de CSS não utilizado🧪 Testes e QualidadeEstrutura de TestesCopiartests/
├── Unit/
│   ├── Services/
│   │   ├── BookServiceTest.php
│   │   ├── UserShelfServiceTest.php
│   │   └── ReadingSessionServiceTest.php
│   └── Repositories/
│       └── BookRepositoryTest.php
└── Feature/
    ├── BookControllerTest.php
    ├── UserShelfControllerTest.php
    └── ReadingSessionControllerTest.php
Executar TestesCopiar# Todos os testes
php artisan test

# Apenas testes unitários
php artisan test tests/Unit

# Com cobertura
php artisan test --coverage
Exemplo de Teste UnitárioCopiarclass BookServiceTest extends TestCase {
    public function test_create_book_successfully() {
        $repository = Mockery::mock(BookRepositoryInterface::class);
        $repository->shouldReceive('create')
                   ->once()
                   ->with(['title' => 'Clean Code', 'author' => 'Robert C. Martin'])
                   ->andReturn(new Book(['title' => 'Clean Code']));

        $service = new BookService($repository);
        $book = $service->createBook(['title' => 'Clean Code', 'author' => 'Robert C. Martin']);

        $this->assertEquals('Clean Code', $book->title);
    }
}
📚 Roadmapv1.0 - Funcionalidades core (Catálogo, Estante, Sessões)v1.1 - Sistema de recomendações baseado em históricov1.2 - Integração com APIs de livros (Google Books, OpenLibrary)v1.3 - Exportação de dados (PDF, CSV)v2.0 - Funcionalidades sociais (Compartilhamento, Comunidades)v2.1 - Mobile app (React Native)v2.2 - IA para sugestões personalizadas🤝 Guia de ContribuiçãoComo Contribuir1.Fork o repositóriogit clone https://github.com/seu-usuario/meu-acervo-digital.git2.Crie uma branch para sua featuregit checkout -b feature/sua-feature3.Commit suas mudançasgit commit -m "feat: descrição clara da sua feature"4.Push para a branchgit push origin feature/sua-feature5.Abra um Pull Request•Descreva as mudanças claramente•Adicione testes se aplicável•Referencie issues relacionadasConvenções de CommitSeguimos Conventional Commits:Copiarfeat:     Nova funcionalidade
fix:      Correção de bug
docs:     Mudanças em documentação
style:    Formatação, sem mudanças de lógica
refactor: Refatoração de código
test:     Adição ou atualização de testes
chore:    Tarefas de build, dependências, etc.
Padrões de Código•PSR-12: Padrão de codificação PHP•ESLint: Linting para JavaScript/Vue•Prettier: Formatação automáticaCopiar# Verificar padrões
composer lint
pnpm lint

# Corrigir automaticamente
composer lint:fix
pnpm lint:fix
🔍 Troubleshooting❌ Problema: "Class not found" ao executar migrações✅ Solução:Copiarcomposer dump-autoload
php artisan migrate
❌ Problema: Vite não compila assets✅ Solução:Copiarrm -rf node_modules/.vite
pnpm install
pnpm run dev
❌ Problema: Erro de conexão com banco de dados✅ Solução:1.Verificar credenciais no .env2.Garantir que MySQL está rodando3.Criar banco de dados manualmente se necessário:CREATE DATABASE meu_acervo_digital;❌ Problema: Permissões de arquivo✅ Solução:chmod -R 775 storage bootstrap/cache📖 Documentação Adicional•Laravel Documentation•Vue.js 3 Guide•Inertia.js Documentation•Tailwind CSS Documentation📄 LicençaEste projeto está licenciado sob a Licença MIT - veja o arquivo LICENSE para detalhes.Desenvolvido com ❤️ para a comunidade de desenvolvedores⬆ Voltar ao topo

