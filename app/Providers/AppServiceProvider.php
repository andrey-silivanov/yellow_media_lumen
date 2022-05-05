<?php

namespace App\Providers;

use App\Core\Handlers\CommandHandler;
use App\Core\Handlers\Contracts\CommandHandlerInterface;
use App\Core\Repository\UserRepositoryInterface;
use App\Repository\UserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(CommandHandlerInterface::class, CommandHandler::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }
}
