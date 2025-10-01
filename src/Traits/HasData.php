<?php

namespace Parfaitementweb\FilamentCountryField\Traits;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Str;

trait HasData
{
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

        return __('filament-country-field::country', locale: $locale);
    }

    protected function getFlagEmoji(?string $countryCode): string
    {
        if (! is_string($countryCode)) {
            return '';
        }

        $countryCode = strtoupper($countryCode);

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
