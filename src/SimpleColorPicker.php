<?php

namespace Rockero\FilamentSimpleColorPicker;

use Closure;
use Filament\Forms\Components\Concerns\HasAffixes;
use Filament\Forms\Components\Concerns\HasExtraInputAttributes;
use Filament\Forms\Components\Concerns\HasPlaceholder;
use Filament\Forms\Components\Field;
use Filament\Support\Concerns\HasExtraAlpineAttributes;

class SimpleColorPicker extends Field
{
    use HasAffixes;
    use HasExtraInputAttributes;
    use HasPlaceholder;
    use HasExtraAlpineAttributes;

    protected string $view = 'filament-simple-color-picker::simple-color-picker';

    protected array|Closure $colors = [];

    protected int|Closure $colorColumns = 3;

    public function colors(array|Closure $colors): static
    {
        $this->colors = $colors;

        return $this;
    }

    public function colorColumns(int|Closure $colorColumns): static
    {
        $this->colorColumns = $colorColumns;

        return $this;
    }

    public function getColors(): array
    {
        return $this->evaluate($this->colors);
    }

    public function getColorColumns(): int
    {
        return $this->evaluate($this->colorColumns);
    }
}
