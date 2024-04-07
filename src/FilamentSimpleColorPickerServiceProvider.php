<?php

namespace Teguhpermadi\FilamentSimpleColorPicker;

use Filament\PluginServiceProvider;
use Spatie\LaravelPackageTools\Package;

class FilamentSimpleColorPickerServiceProvider extends PluginServiceProvider
{
    public static string $name = 'filament-simple-color-picker';

    protected array $resources = [];

    protected array $pages = [];

    protected array $widgets = [];

    protected array $styles = [
        'plugin-filament-simple-color-picker' => __DIR__.'/../resources/dist/filament-simple-color-picker.css',
    ];

    protected array $scripts = [];

    protected array $beforeCoreScripts = [];

    public function configurePackage(Package $package): void
    {
        $package->name(static::$name)
            ->hasViews();
    }
}
