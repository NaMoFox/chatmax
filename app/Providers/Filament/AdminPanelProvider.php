<?php

namespace App\Providers\Filament;
use Filament\Navigation\NavigationBuilder;
use App\Filament\Pages\Tenancy\EditTeamProfile;
use App\Filament\Pages\Tenancy\RegisterTeam;
use App\Models\Team;
use Filament\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Auth;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\MenuItem;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Support\Enums\MaxWidth;

class AdminPanelProvider extends PanelProvider
{
    
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->colors([
               'danger' => Color::Red,
                //'gray' => '#475569',
                'gray' => Color::Slate,
                'info' => Color::Blue,
                'primary' => Color::Green,
                'success' => Color::Green,
                'warning' => Color::Orange,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->plugins([
               \BezhanSalleh\FilamentShield\FilamentShieldPlugin::make()
                          
            ])
            
            ->tenant(Team::class, ownershipRelationship: 'team', slugAttribute: 'slug')
            ->tenantProfile(EditTeamProfile::class)     
            ->tenantRegistration(RegisterTeam::class)
            ->tenantMenu(fn() => Auth::check() && Auth::user()->hasRole('super_admin'))
        
            ## PARA AGREGAR UN LINK AL MENU
            //->navigationItems([
              //  \Filament\Navigation\NavigationItem::make('Nuevo Cliente')
                //->url('/admin/new')
                //->icon('heroicon-o-user-plus')
                //->visible(fn(): bool => auth()->user()->can('super_admin')) ]);    
                
            ->brandLogo(asset('/logo.svg'))
            ->favicon(asset('favicon-32x32.png'))
            ->sidebarCollapsibleOnDesktop()
            ->maxContentWidth(MaxWidth::Full)
            ->spa()
            ->profile();
           }

}
