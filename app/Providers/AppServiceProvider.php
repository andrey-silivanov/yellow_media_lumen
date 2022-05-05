<?php

namespace App\Providers;

use App\Core\Handlers\CommandHandler;
use App\Core\Handlers\Contracts\CommandHandlerInterface;
use App\Core\Repository\CompanyRepositoryInterface;
use App\Core\Repository\UserRepositoryInterface;
use App\Core\Services\RecoverPassword\Contracts\RecoverPasswordServiceInterface;
use App\Repository\CompanyRepository;
use App\Repository\UserRepository;
use App\Services\RecoverPassword\RecoverPasswordService;
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
        $this->app->bind(CompanyRepositoryInterface::class, CompanyRepository::class);
        $this->app->bind(RecoverPasswordServiceInterface::class, RecoverPasswordService::class);
    }
}
