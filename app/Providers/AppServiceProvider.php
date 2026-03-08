<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Repositórios
        $this->app->bind(\App\Interfaces\Modules\Book\BookRepositoryInterface::class , \App\Repositories\Modules\Book\BookRepository::class);
        $this->app->bind(\App\Interfaces\Modules\UserShelf\UserBookRepositoryInterface::class , \App\Repositories\Modules\UserShelf\UserBookRepository::class);
        $this->app->bind(\App\Interfaces\Modules\ReadingSession\ReadingSessionRepositoryInterface::class , \App\Repositories\Modules\ReadingSession\ReadingSessionRepository::class);

        // Serviços
        $this->app->bind(\App\Interfaces\Modules\Book\BookServiceInterface::class , \App\Services\Modules\Book\BookService::class);
        $this->app->bind(\App\Interfaces\Modules\UserShelf\UserBookServiceInterface::class , \App\Services\Modules\UserShelf\UserBookService::class);
        $this->app->bind(\App\Interfaces\Modules\ReadingSession\ReadingSessionServiceInterface::class , \App\Services\Modules\ReadingSession\ReadingSessionService::class);
        $this->app->bind(\App\Interfaces\Modules\Statistics\StatisticsServiceInterface::class , \App\Services\Modules\Statistics\StatisticsService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    //
    }
}
