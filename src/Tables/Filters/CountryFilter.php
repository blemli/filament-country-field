<?php

namespace Parfaitementweb\FilamentCountryField\Tables\Filters;

use Closure;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Contracts\Support\Arrayable;
use Parfaitementweb\FilamentCountryField\Traits\HasData;

class CountryFilter extends SelectFilter
{
    use HasData;

    protected array | Arrayable | string | Closure | null $excluded = null;

    protected array | Arrayable | string | Closure | null $added = null;

    protected array | Arrayable | string | Closure | null $mapped = null;

    protected array | Arrayable | string | Closure | null $only = null;

    protected bool | Closure $displayFlag = false;

    protected function setUp(): void
    {
        parent::setUp();

        $this->options(fn () => $this->resolveDefaultOptions());
    }

    public function relationship(Closure|string|null $name, Closure|string|null $titleAttribute = null, ?Closure $modifyQueryUsing = null, Closure|bool $hasEmptyOption = false): static
    {
        return parent::relationship($name, $titleAttribute, $modifyQueryUsing, $hasEmptyOption);
    }

    public function fromDatabase(string $column = null): static
    {
        $column = $column ?? $this->getName();

        $this->options(function () use ($column) {
            $table = $this->getTable();
            $query = $table->getModel()::query();

            // Get unique country codes from the database
            $countryCodes = $query->whereNotNull($column)
                ->distinct()
                ->pluck($column)
                ->filter()
                ->toArray();

            if (empty($countryCodes)) {
                return [];
            }

            // Get the full country list
            $allCountries = $this->getCountriesList();

            // Filter to only include countries that exist in the database
            $filteredCountries = collect($allCountries)
                ->filter(function ($country, $code) use ($countryCodes) {
                    return in_array($code, $countryCodes);
                });

            // Apply other filters (only, exclude, etc.)
            return $this->applyFiltersToCollection($filteredCountries)->toArray();
        });

        return $this;
    }

    public function getOptions(): array
    {
        $options = $this->evaluate($this->options) ?? [];

        if ($options instanceof Arrayable) {
            $options = $options->toArray();
        }

        if (! empty($options)) {
            return $options;
        }

        return $this->resolveDefaultOptions();
    }

    protected function resolveDefaultOptions(): array
    {
        $countries = $this->getCountriesList();

        $collection = collect($countries)
            ->when($this->only, function ($options) {
                $onlyCountries = $this->getOnly();

                if (empty($onlyCountries)) {
                    return $options;
                }

                $filtered = $options->filter(function ($country, $key) use ($onlyCountries) {
                    return in_array($key, $onlyCountries);
                });

                return $filtered->isEmpty() ? $options : $filtered;
            })
            ->when($this->mapped, function ($options) {
                return $options->mapWithKeys(function ($country, $key) {
                    if (in_array($key, array_keys($this->mapped))) {
                        return [$this->mapped[$key] => $country];
                    }

                    return [$key => $country];
                });
            })
            ->merge($this->getAdd())
            ->reject(function ($country, $key) {
                return in_array($key, $this->getExclude());
            })
            ->sort();

        if ($this->getDisplayFlag()) {
            $collection = $collection->map(function ($country, $key) {
                return $this->formatCountryLabelWithFlag($key, $country);
            });
        }

        return $collection->toArray();
    }

    public function map(array | Closure | string | Arrayable | null $mapped = null): static
    {
        $this->mapped = $mapped;

        return $this;
    }

    public function getMap(): array
    {
        return $this->evaluate($this->mapped ?? null);
    }

    public function exclude(array | Closure | string | Arrayable | null $excluded = null): static
    {
        $this->excluded = $excluded;

        return $this;
    }

    public function getExclude(): array
    {
        return $this->evaluate($this->excluded ?? []);
    }

    public function add(array | Closure | string | Arrayable | null $added = null): static
    {
        $this->added = $added;

        return $this;
    }

    public function getAdd(): array
    {
        return $this->evaluate($this->added ?? []);
    }

    public function only(array | Closure | string | Arrayable | null $only = null): static
    {
        $this->only = $only;

        return $this;
    }

    public function getOnly(): array
    {
        return $this->evaluate($this->only ?? []);
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

    protected function applyFiltersToCollection($collection)
    {
        return $collection
            ->when($this->only, function ($options) {
                $onlyCountries = $this->getOnly();

                if (empty($onlyCountries)) {
                    return $options;
                }

                $filtered = $options->filter(function ($country, $key) use ($onlyCountries) {
                    return in_array($key, $onlyCountries);
                });

                return $filtered->isEmpty() ? $options : $filtered;
            })
            ->when($this->mapped, function ($options) {
                return $options->mapWithKeys(function ($country, $key) {
                    if (in_array($key, array_keys($this->mapped))) {
                        return [$this->mapped[$key] => $country];
                    }

                    return [$key => $country];
                });
            })
            ->merge($this->getAdd())
            ->reject(function ($country, $key) {
                return in_array($key, $this->getExclude());
            })
            ->when($this->getDisplayFlag(), function ($options) {
                return $options->map(function ($country, $key) {
                    return $this->formatCountryLabelWithFlag($key, $country);
                });
            })
            ->sort();
    }
}
