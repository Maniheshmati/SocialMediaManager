<?php

namespace App\Filament\Resources\SocialAccountsResource\Pages;

use App\Filament\Resources\SocialAccountsResource;
use Filament\Resources\Pages\Page;

class SocialAccounts extends Page
{
//    public static function shouldRegisterNavigation(): bool
//    {
//        dd(auth()->check());
//        return auth()->check() && auth()->user()->can('manage settings');
//    }

    protected static string $resource = SocialAccountsResource::class;

    protected static string $view = 'filament.resources.social-accounts-resource.pages.social-accounts';


    public static function shouldRegisterNavigation(array $parameters = []): bool
    {
        ray('here');
        ray(auth()->check(), auth()->user()?->toArray());
        return auth()->check() && auth()->user()->can('manage settings');
    }
    public function mount(): void
    {
        dd('Page mounted', auth()->check(), auth()->user()?->toArray());
    }
}
