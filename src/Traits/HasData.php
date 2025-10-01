<?php

namespace Parfaitementweb\FilamentCountryField\Traits;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Str;
use Parfaitementweb\FilamentCountryField\Data\CountryCodeMapping;

trait HasData
{
    protected bool $useAlpha3 = false;

    public function getCountriesList(): array
    {
        return $this->getList();
    }

    public function getList(): array
    {
        $locale = App::getLocale();

        if (str_contains($locale, '_')) {
            if (! Lang::has('filament-country-field::country', $locale, false)) {
                $locale = Str::before($locale, '_');
            }
        }

        $countries = __('filament-country-field::country', locale: $locale);

        // If alpha3 is enabled, convert the keys from alpha-2 to alpha-3
        if ($this->useAlpha3) {
            $alpha3Countries = [];
            foreach ($countries as $alpha2Code => $countryName) {
                $alpha3Code = CountryCodeMapping::alpha2ToAlpha3($alpha2Code);
                if ($alpha3Code) {
                    $alpha3Countries[$alpha3Code] = $countryName;
                } else {
                    // Fallback to original code if mapping not found
                    $alpha3Countries[$alpha2Code] = $countryName;
                }
            }
            return $alpha3Countries;
        }

        return $countries;
    }

    public function alpha3(bool $condition = true): static
    {
        $this->useAlpha3 = $condition;

        return $this;
    }

    protected function getUseAlpha3(): bool
    {
        return $this->useAlpha3;
    }

    protected function getFlagEmoji(?string $countryCode): string
    {
        if (! is_string($countryCode)) {
            return '';
        }

        $countryCode = strtoupper($countryCode);

        // Convert alpha-3 to alpha-2 if needed (flags use alpha-2 codes)
        if (strlen($countryCode) === 3) {
            $alpha2Code = CountryCodeMapping::alpha3ToAlpha2($countryCode);
            if ($alpha2Code) {
                $countryCode = $alpha2Code;
            } else {
                return '';
            }
        }

        if (strlen($countryCode) !== 2) {
            return '';
        }

        $characters = str_split($countryCode);

        foreach ($characters as $character) {
            if ($character < 'A' || $character > 'Z') {
                return '';
            }
        }

        return implode('', array_map(
            static fn (string $character) => mb_chr(0x1F1E6 + ord($character) - ord('A'), 'UTF-8'),
            $characters
        ));
    }

    protected function formatCountryLabelWithFlag(string $countryCode, string $label): string
    {
        $flag = $this->getFlagEmoji($countryCode);

        return $flag === '' ? $label : trim($flag . ' ' . $label);
    }
}
