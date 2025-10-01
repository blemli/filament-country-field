<?php

namespace Parfaitementweb\FilamentCountryField\Tests;

use Parfaitementweb\FilamentCountryField\Data\CountryCodeMapping;
use Parfaitementweb\FilamentCountryField\Forms\Components\Country;
use Parfaitementweb\FilamentCountryField\Tables\Columns\CountryColumn;
use Parfaitementweb\FilamentCountryField\Infolists\Components\CountryEntry;

class Alpha3Test extends TestCase
{
    /** @test */
    public function it_can_convert_alpha2_to_alpha3()
    {
        $this->assertEquals('USA', CountryCodeMapping::alpha2ToAlpha3('US'));
        $this->assertEquals('GBR', CountryCodeMapping::alpha2ToAlpha3('GB'));
        $this->assertEquals('DEU', CountryCodeMapping::alpha2ToAlpha3('DE'));
        $this->assertEquals('FRA', CountryCodeMapping::alpha2ToAlpha3('FR'));
    }

    /** @test */
    public function it_can_convert_alpha3_to_alpha2()
    {
        $this->assertEquals('US', CountryCodeMapping::alpha3ToAlpha2('USA'));
        $this->assertEquals('GB', CountryCodeMapping::alpha3ToAlpha2('GBR'));
        $this->assertEquals('DE', CountryCodeMapping::alpha3ToAlpha2('DEU'));
        $this->assertEquals('FR', CountryCodeMapping::alpha3ToAlpha2('FRA'));
    }

    /** @test */
    public function it_returns_null_for_invalid_codes()
    {
        $this->assertNull(CountryCodeMapping::alpha2ToAlpha3('XX'));
        $this->assertNull(CountryCodeMapping::alpha3ToAlpha2('XXX'));
    }

    /** @test */
    public function forms_component_can_use_alpha3()
    {
        $country = Country::make('country')->alpha3();

        $countries = $country->getCountriesList();

        // Should have alpha-3 codes as keys
        $this->assertArrayHasKey('USA', $countries);
        $this->assertArrayHasKey('GBR', $countries);
        $this->assertArrayHasKey('DEU', $countries);

        // Should not have alpha-2 codes as keys
        $this->assertArrayNotHasKey('US', $countries);
        $this->assertArrayNotHasKey('GB', $countries);
        $this->assertArrayNotHasKey('DE', $countries);

        // Values should still be country names
        $this->assertEquals('United States', $countries['USA']);
        $this->assertEquals('United Kingdom', $countries['GBR']);
        $this->assertEquals('Germany', $countries['DEU']);
    }

    /** @test */
    public function tables_column_can_use_alpha3()
    {
        $column = CountryColumn::make('country')->alpha3();

        // Test formatting with alpha-3 code
        $formatted = $column->formatState('USA');
        $this->assertEquals('United States', $formatted);

        // Test formatting with alpha-2 code (should still work)
        $formatted = $column->formatState('US');
        $this->assertEquals('United States', $formatted);
    }

    /** @test */
    public function infolists_entry_can_use_alpha3()
    {
        $entry = CountryEntry::make('country')->alpha3();

        // Mock the state
        $entry->state('USA');

        $result = $entry->nativeCountry();
        $this->assertEquals('United States', $result);
    }

    /** @test */
    public function flag_emoji_works_with_alpha3_codes()
    {
        $country = Country::make('country')->alpha3();

        // Test that flag emoji generation works with alpha-3 codes
        $reflection = new \ReflectionClass($country);
        $method = $reflection->getMethod('getFlagEmoji');
        $method->setAccessible(true);

        // Should convert alpha-3 to alpha-2 internally for flag generation
        $flag = $method->invoke($country, 'USA');
        $this->assertNotEmpty($flag);

        $flag = $method->invoke($country, 'GBR');
        $this->assertNotEmpty($flag);
    }
}
