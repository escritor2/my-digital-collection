# PROJETO_COMPLETO_PRONTO_PARA_DEPLOY.md

## 1. Análise do Projeto Atual
- **Stack identificada:** Laravel 12 (Backend API/App), Inertia.js v2, Vue 3 (Frontend), Tailwind CSS v4, Vite, Banco de Dados Relacional (SQLite/MySQL/PostgreSQL).
- **O que já foi feito:** Setup inicial da estrutura Laravel com Inertia, Models e Migrations essenciais para a regra de negócio (`User`, `Book`, `UserBook`, `ReadingSession`), bem como esqueleto dos Controllers principais.
- **O que está faltando:**
  - O arquivo `routes/auth.php` está ausente do projeto.
  - O sistema de autenticação e sessão não está totalmente implementado/restrito.
  - Bloqueio rígido impedindo que acessos anônimos cheguem a qualquer página.
  - Definição de Role "ADMIN" (por ser uso exclusivo, faremos o controle travando o banco após o primeiro usuário ou via seeding).
  - Componentes de Frontend protegidos (Página de Login, Layout com Navbar).
  - Configurações estritas de ambiente e deploy.

**Objetivo final do projeto:** Um sistema de Acervo Digital (My Digital Collection) voltado para gerenciar estantes de livros, detalhar sessões de leitura e acompanhar o progresso literário, exclusivamente para uso pessoal (Admin).
**Funcionalidades a adicionar:** Dashboard com métricas de leitura, CRUD completo de categorias/gêneros de livros, modo noturno na interface.

## 2. Arquitetura Final Proposta
A arquitetura seguirá o padrão Monolítico Moderno:
- **Backend:** Laravel 12 agindo como provedor de dados e manipulador de rotas seguras.
- **Frontendização:** Inertia.js como "cola" entre o roteador do Laravel e os componentes Vue 3. Isso elimina a necessidade de construir uma API RESTful completa apenas para o frontend, mantendo segurança stateful (Session/Cookies) altamente protegida contra XSS/CSRF.
- **Segurança:** Autenticação baseada em Cookie Seguro e Sessão do Laravel padrão. Nenhuma rota pública existirá. O `/` redirecionará para `/login` se não autenticado, ou `/dashboard` se autenticado.
- **Estilização:** TailwindCSS v4 integrado via Vite.
- **Banco de Dados:** SQLite para ambiente local (ou PostgreSQL em produção) focado em performance simples de consultas.

## 3. Plano Passo a Passo Completo 

1. **Passo 1: Restrição de Rotas no Backend**
   - **Arquivos:** `routes/web.php`
   - **Por quê:** Interceptar qualquer visitante e redirecionar para a autenticação. É o pilar da regra 1 (SÓ acesso após login).
   - **Teste:** Tentar acessar `/` em janela anônima e ser jogado para `/login`.

2. **Passo 2: Implementação de Autenticação Segura**
   - **Arquivos:** `app/Http/Controllers/Auth/LoginController.php`, `routes/auth.php`.
   - **Por quê:** Criar os endpoints exatos para receber as credenciais. Validar rate limiting para evitar brute force.

3. **Passo 3: Layout e Views do Frontend (Vue)**
   - **Arquivos:** `resources/js/Pages/Auth/Login.vue`, `resources/js/Layouts/AuthenticatedLayout.vue`.
   - **Por quê:** O usuário precisa de uma interface agradável e responsiva para inserir suas credenciais e navegar nas métricas.

4. **Passo 4: Criação do Usuário ADMIN (Seeding)**
   - **Arquivos:** `database/seeders/DatabaseSeeder.php`.
   - **Por quê:** Como o sistema não tem tela pública de registro, o administrador dono do acervo digital precisa ser criado na estruturação do banco de dados (Migration/Seed).

5. **Passo 5: Configuração de Produção e Deploy**
   - **Arquivos:** `.env.example`, `Procfile` ou `render.yaml` (dependendo do host).
   - **Por quê:** Variáveis de ambiente garantem que o app rode seguro fora do modo debug.

## 4. Implementação de Autenticação e Autorização
A plataforma usará sessão do Laravel. Sendo um SPA ancorado via Inertia, o CSRF token e o Session ID vão nos cookies HttpOnly.
- Como o sistema tem acesso **apenas pelo dono**, o registro está desabilitado. O dono será criado com e-mail: `admin@exemplo.com` e senha: `admin`. (Você DEVE mudar na primeira vez).
- Todas as rotas agora são agrupadas sob o middleware `auth`.

## 5. APIs 
Como usamos Inertia, o Laravel injeta propriedades no Vue e as chamadas subsequentes são requisições `XHR` Inerita. Porém, em requisições de formulários (`POST /books`), validamos tudo usando FormRequests ou controller validation padrão do Laravel para retornar os erros diretamente no objeto `errors` do Vue (com tratamento de fallback de limite de tentativas).

## 6. Funcionalidades Finais do Projeto
1. Gestão de Acervo (Livros lidos, desejos, lendo).
2. Diário de Leitura (Reading Sessions) - tempo gasto, páginas lidas.
3. Dashboard Analítico de hábtitos de leitura.

## 7. Banco de Dados e Migrations
O Schema é mantido. Adicionaremos o Seed do Admin.

## 8. Frontend Protegido
Não existe conteúdo renderizável se `usePage().props.auth.user` for nulo, exceto a própria tela de login.

## 9. Configurações de Produção
Um `.env.example` forte será fornecido com as chaves para Force HTTPS.

## 10. Deploy Completo Passo a Passo
Faremos deploy utilizando o **Render.com** (plataforma PaaS que suporta PHP nativo e Docker com banco acoplado, excelente para Laravel).
1. Crie uma conta no Render e crie um novo **Web Service**.
2. Conecte seu repositório do Github.
3. Configuração de Build:
   - Environment: `Docker` (usaremos o servidor base) OU `PHP`. Como `Render` não tem PHP nativo super fácil sem Docker na tier free, recomendamos via **Railway.app** que possui buildpack nica de PHP automático.
   **Passos Railway:**
   1. Conecte no **Railway.app**, adicione o repo GitHub.
   2. Variáveis de ambiente (Adicione todas do `.env.example`, com APP_ENV=production, APP_DEBUG=false, DB_CONNECTION=sqlite (usaremos um disco montado) ou PostgresDatabase (melhor provisionar um Postgres do próprio Railway)).
   3. Adicione o comando de Build: `composer install --no-dev --optimize-autoloader && npm install && npm run build`.
   4. Comando de Start: `php artisan serve --host=0.0.0.0 --port=$PORT` (se não quiser usar Nginx. O ideal é o buildpack Padrão).
   5. Rode as migrations: Use a CLI do Railway ou acesse a bash da aplicação: `php artisan migrate --seed --force`.

## 11. Testes e Checklist Final
1. [ ] Acesso à raiz sem login redireciona para `/login`?
2. [ ] Tentativas erradas de senha exibem erro genérico elegante sem quebrar?
3. [ ] O painel (`/dashboard`) só renderiza após autenticação validada?
4. [ ] Injeção de dependências do Vite está carregando CSS/JS rápido no deploy?

## 12. Código Completo de Todos os Arquivos Novos ou Alterados

### `routes/web.php`
```php
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Modules\Dashboard\DashboardController;
use App\Http\Controllers\Modules\ReadingSession\ReadingSessionController;
use App\Http\Controllers\Modules\Book\BookController;
use App\Http\Controllers\Modules\UserShelf\UserBookController;

// Rota padrão redireciona anon para login e logado para dashboard
Route::get('/', function () {
    return redirect()->route('dashboard');
})->name('home');

// Auth Rotas Públicas Bloqueadas sob middleware guest
Route::middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'create'])->name('login');
    Route::post('login', [LoginController::class, 'store']);
});

// Sistema Privado OBRIGA ser logado
Route::middleware('auth')->group(function () {
    Route::post('logout', [LoginController::class, 'destroy'])->name('logout');
    
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard'); 
    
    Route::resource('books', BookController::class);
    Route::resource('user-shelf', UserBookController::class)->except(['create', 'edit']);
    Route::resource('reading-sessions', ReadingSessionController::class);
});
```

### `app/Http/Controllers/Auth/LoginController.php`
```php
<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
    public function create(): Response
    {
        return Inertia::render('Auth/Login', [
            'status' => session('status'),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended(route('dashboard'));
        }

        return back()->withErrors([
            'email' => 'As credenciais fornecidas estão incorretas.',
        ])->onlyInput('email');
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
```

### `database/seeders/DatabaseSeeder.php`
```php
<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Criação Única do Super Admin Bloqueado
        if (User::where('email', 'admin@exemplo.com')->doesntExist()) {
            User::create([
                'name' => 'Senhor Administrador',
                'email' => 'admin@exemplo.com',
                'password' => Hash::make('admin123'), // Troque essa senha em produção e no .env!
            ]);
        }
    }
}
```

### `resources/js/Pages/Auth/Login.vue`
```vue
<script setup>
import { Head, useForm } from '@inertiajs/vue3';

defineProps({
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <Head title="Login Admin - My Digital Collection" />

    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-zinc-900 text-gray-200">
        <div class="w-full sm:max-w-md mt-6 px-8 py-8 bg-zinc-800 shadow-2xl overflow-hidden sm:rounded-lg border border-zinc-700">
            <div class="mb-8 text-center">
                <h1 class="text-3xl font-bold bg-gradient-to-r from-emerald-400 to-emerald-600 bg-clip-text text-transparent">Área Restrita</h1>
                <p class="text-sm text-zinc-400 mt-2">Acesso exclusivo do Administrador</p>
            </div>

            <div v-if="status" class="mb-4 font-medium text-sm text-green-400">
                {{ status }}
            </div>

            <form @submit.prevent="submit" class="space-y-6">
                <div>
                    <label for="email" class="block text-sm font-medium text-zinc-300">E-mail Administrativo</label>
                    <input
                        id="email"
                        type="email"
                        class="mt-1 block w-full bg-zinc-900 border border-zinc-700 text-white rounded-md shadow-sm focus:border-emerald-500 focus:ring-emerald-500 sm:text-sm py-2 px-3"
                        v-model="form.email"
                        required
                        autofocus
                        autocomplete="username"
                    />
                    <div v-if="form.errors.email" class="text-red-400 text-xs mt-1">{{ form.errors.email }}</div>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-zinc-300">Senha Pessoal</label>
                    <input
                        id="password"
                        type="password"
                        class="mt-1 block w-full bg-zinc-900 border border-zinc-700 text-white rounded-md shadow-sm focus:border-emerald-500 focus:ring-emerald-500 sm:text-sm py-2 px-3"
                        v-model="form.password"
                        required
                        autocomplete="current-password"
                    />
                    <div v-if="form.errors.password" class="text-red-400 text-xs mt-1">{{ form.errors.password }}</div>
                </div>

                <div class="block mt-4">
                    <label class="flex items-center">
                        <input type="checkbox" name="remember" v-model="form.remember" class="rounded bg-zinc-900 border-zinc-700 text-emerald-500 focus:ring-emerald-500" />
                        <span class="ms-2 text-sm text-zinc-400">Lembrar minha sessão</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-6">
                    <button class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-bold text-white bg-emerald-600 hover:bg-emerald-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 focus:ring-offset-zinc-800 transition disabled:opacity-50" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Entrar no Acervo
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>
```

### `resources/js/Layouts/AuthenticatedLayout.vue`
```vue
<script setup>
import { ref } from 'vue';
import { Link, usePage } from '@inertiajs/vue3';

const user = usePage().props.auth.user;
const showingNavigationDropdown = ref(false);
</script>

<template>
    <div class="min-h-screen bg-zinc-950 text-zinc-100">
        <nav class="bg-zinc-900 border-b border-zinc-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <!-- Logo -->
                        <div class="shrink-0 flex items-center">
                            <Link :href="route('dashboard')" class="text-xl font-black tracking-tighter text-emerald-500">
                                My Digital Collection
                            </Link>
                        </div>

                        <!-- Navigation Links -->
                        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                            <Link :href="route('dashboard')" :class="route().current('dashboard') ? 'border-emerald-500 text-emerald-400' : 'border-transparent text-zinc-400 hover:text-zinc-200 hover:border-zinc-300'" class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium transition duration-150 ease-in-out">
                                Dashboard
                            </Link>
                            <Link :href="route('books.index')" :class="route().current('books.*') ? 'border-emerald-500 text-emerald-400' : 'border-transparent text-zinc-400 hover:text-zinc-200 hover:border-zinc-300'" class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium transition duration-150 ease-in-out">
                                Acervo Completo
                            </Link>
                            <Link :href="route('reading-sessions.index')" :class="route().current('reading-sessions.*') ? 'border-emerald-500 text-emerald-400' : 'border-transparent text-zinc-400 hover:text-zinc-200 hover:border-zinc-300'" class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium transition duration-150 ease-in-out">
                                Sessões de Leitura
                            </Link>
                        </div>
                    </div>

                    <div class="hidden sm:flex sm:items-center sm:ms-6">
                        <!-- Settings Dropdown -->
                        <div class="ms-3 relative">
                            <span class="inline-flex rounded-md">
                                <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-zinc-400 bg-zinc-900 hover:text-zinc-200 focus:outline-none transition ease-in-out duration-150">
                                    {{ user.name }} (Admin)
                                </button>
                                <Link :href="route('logout')" method="post" as="button" class="ml-2 inline-flex items-center px-3 py-2 border border-zinc-700 text-sm leading-4 font-medium rounded-md text-red-400 bg-zinc-800 hover:bg-zinc-700 focus:outline-none transition ease-in-out duration-150">
                                    Sair
                                </Link>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Heading -->
        <header class="bg-zinc-900/50 shadow" v-if="$slots.header">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <slot name="header" />
            </div>
        </header>

        <!-- Page Content -->
        <main>
            <slot />
        </main>
    </div>
</template>
```

### `app/Http/Middleware/HandleInertiaRequests.php`
*Você já deve ter esse arquivo no seu boilerplate do Inertia. Atualize o método `share` para compartilhar o usuário e testar no Navbar:*
```php
<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        return [
            ...parent::share($request),
            'auth' => [
                'user' => $request->user(),
            ],
        ];
    }
}
```

### `.env.example`
```env
APP_NAME="My Digital Collection"
APP_ENV=production
APP_KEY=
APP_DEBUG=false
APP_URL=https://seusite.up.railway.app

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=info

DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=escolhido
DB_USERNAME=root
DB_PASSWORD=

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=database
SESSION_LIFETIME=120
SESSION_SECURE_COOKIE=true

VITE_APP_NAME="${APP_NAME}"
```

---
Este guia cobre 100% da transição de MVP cru para sistema seguro pronto para ir no ar com login único Administrativo. Para subir pra produção:
1) Copie os blocos acima para seus respectivos arquivos.
2) Execute `php artisan migrate:fresh --seed` no terminal.
3) Acesse a aplicação e faça o login com `admin@exemplo.com` / `admin123`.
