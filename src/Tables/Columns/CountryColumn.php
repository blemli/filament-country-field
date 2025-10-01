<?php

namespace Parfaitementweb\FilamentCountryField\Tables\Columns;

use Closure;
use Filament\Tables\Columns\TextColumn;
use Parfaitementweb\FilamentCountryField\Traits\HasData;

class CountryColumn extends TextColumn
{
    use HasData;

    protected bool | Closure $displayFlag = false;

    public function formatState(mixed $state): mixed
    {
        $countries = $this->getCountriesList();

        $label = $countries[$state] ?? $state;

        if (! $this->getDisplayFlag()) {
            return $label;
        }

        return $this->formatCountryLabelWithFlag(is_string($state) ? $state : '', (string) $label);
    }

    public function flag(bool | Closure $condition = true): static
    {
        $this->displayFlag = $condition;

        return $this;
    }

    protected function getDisplayFlag(): bool
    {
        return (bool) $this->evaluate($this->displayFlag);
    }
}
