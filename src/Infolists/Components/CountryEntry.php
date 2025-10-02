<?php

namespace Parfaitementweb\FilamentCountryField\Infolists\Components;

use Closure;
use Filament\Infolists\Components\TextEntry;
use Parfaitementweb\FilamentCountryField\Data\CountryCodeMapping;
use Parfaitementweb\FilamentCountryField\Traits\HasData;

class CountryEntry extends TextEntry
{
    use HasData;

    protected bool | Closure $displayFlag = false;

    public function nativeCountry()
    {
        $countries = $this->getCountriesList();
        $state = $this->getState();

        // Handle both alpha-2 and alpha-3 codes in the state
        $label = $countries[$state] ?? $this->findCountryLabel($state, $countries) ?? $state;

        if (! $this->getDisplayFlag()) {
            return $label;
        }

        return $this->formatCountryLabelWithFlag(is_string($state) ? $state : '', (string) $label);
    }

    protected function findCountryLabel(mixed $state, array $countries): ?string
    {
        if (! is_string($state)) {
            return null;
        }

        $state = strtoupper($state);

        // If we're using alpha3 and the state is alpha-2, convert it
        if ($this->getUseAlpha3() && strlen($state) === 2) {
            $alpha3Code = CountryCodeMapping::alpha2ToAlpha3($state);
            if ($alpha3Code && isset($countries[$alpha3Code])) {
                return $countries[$alpha3Code];
            }
        }

        // If we're not using alpha3 and the state is alpha-3, convert it
        if (! $this->getUseAlpha3() && strlen($state) === 3) {
            $alpha2Code = CountryCodeMapping::alpha3ToAlpha2($state);
            if ($alpha2Code && isset($countries[$alpha2Code])) {
                return $countries[$alpha2Code];
            }
        }

        return null;
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

    protected function setUp(): void
    {
        parent::setUp();

        $this->formatStateUsing(fn (): string => $this->nativeCountry());
    }
}
