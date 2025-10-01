<?php

namespace Parfaitementweb\FilamentCountryField\Data;

class CountryCodeMapping
{
    /**
     * Mapping from ISO 3166-1 alpha-2 to alpha-3 country codes
     */
    public static function getAlpha2ToAlpha3Mapping(): array
    {
        return [
            'AF' => 'AFG', // Afghanistan
            'AX' => 'ALA', // Åland Islands
            'AL' => 'ALB', // Albania
            'DZ' => 'DZA', // Algeria
            'AS' => 'ASM', // American Samoa
            'AD' => 'AND', // Andorra
            'AO' => 'AGO', // Angola
            'AI' => 'AIA', // Anguilla
            'AQ' => 'ATA', // Antarctica
            'AG' => 'ATG', // Antigua & Barbuda
            'AR' => 'ARG', // Argentina
            'AM' => 'ARM', // Armenia
            'AW' => 'ABW', // Aruba
            'AU' => 'AUS', // Australia
            'AT' => 'AUT', // Austria
            'AZ' => 'AZE', // Azerbaijan
            'BS' => 'BHS', // Bahamas
            'BH' => 'BHR', // Bahrain
            'BD' => 'BGD', // Bangladesh
            'BB' => 'BRB', // Barbados
            'BY' => 'BLR', // Belarus
            'BE' => 'BEL', // Belgium
            'BZ' => 'BLZ', // Belize
            'BJ' => 'BEN', // Benin
            'BM' => 'BMU', // Bermuda
            'BT' => 'BTN', // Bhutan
            'BO' => 'BOL', // Bolivia
            'BA' => 'BIH', // Bosnia & Herzegovina
            'BW' => 'BWA', // Botswana
            'BV' => 'BVT', // Bouvet Island
            'BR' => 'BRA', // Brazil
            'IO' => 'IOT', // British Indian Ocean Territory
            'VG' => 'VGB', // British Virgin Islands
            'BN' => 'BRN', // Brunei
            'BG' => 'BGR', // Bulgaria
            'BF' => 'BFA', // Burkina Faso
            'BI' => 'BDI', // Burundi
            'KH' => 'KHM', // Cambodia
            'CM' => 'CMR', // Cameroon
            'CA' => 'CAN', // Canada
            'CV' => 'CPV', // Cape Verde
            'BQ' => 'BES', // Caribbean Netherlands
            'KY' => 'CYM', // Cayman Islands
            'CF' => 'CAF', // Central African Republic
            'TD' => 'TCD', // Chad
            'CL' => 'CHL', // Chile
            'CN' => 'CHN', // China
            'CX' => 'CXR', // Christmas Island
            'CC' => 'CCK', // Cocos (Keeling) Islands
            'CO' => 'COL', // Colombia
            'KM' => 'COM', // Comoros
            'CG' => 'COG', // Congo - Brazzaville
            'CD' => 'COD', // Congo - Kinshasa
            'CK' => 'COK', // Cook Islands
            'CR' => 'CRI', // Costa Rica
            'CI' => 'CIV', // Côte d'Ivoire
            'HR' => 'HRV', // Croatia
            'CU' => 'CUB', // Cuba
            'CW' => 'CUW', // Curaçao
            'CY' => 'CYP', // Cyprus
            'CZ' => 'CZE', // Czechia
            'DK' => 'DNK', // Denmark
            'DJ' => 'DJI', // Djibouti
            'DM' => 'DMA', // Dominica
            'DO' => 'DOM', // Dominican Republic
            'EC' => 'ECU', // Ecuador
            'EG' => 'EGY', // Egypt
            'SV' => 'SLV', // El Salvador
            'GQ' => 'GNQ', // Equatorial Guinea
            'ER' => 'ERI', // Eritrea
            'EE' => 'EST', // Estonia
            'SZ' => 'SWZ', // Eswatini
            'ET' => 'ETH', // Ethiopia
            'FK' => 'FLK', // Falkland Islands
            'FO' => 'FRO', // Faroe Islands
            'FJ' => 'FJI', // Fiji
            'FI' => 'FIN', // Finland
            'FR' => 'FRA', // France
            'GF' => 'GUF', // French Guiana
            'PF' => 'PYF', // French Polynesia
            'TF' => 'ATF', // French Southern Territories
            'GA' => 'GAB', // Gabon
            'GM' => 'GMB', // Gambia
            'GE' => 'GEO', // Georgia
            'DE' => 'DEU', // Germany
            'GH' => 'GHA', // Ghana
            'GI' => 'GIB', // Gibraltar
            'GR' => 'GRC', // Greece
            'GL' => 'GRL', // Greenland
            'GD' => 'GRD', // Grenada
            'GP' => 'GLP', // Guadeloupe
            'GU' => 'GUM', // Guam
            'GT' => 'GTM', // Guatemala
            'GG' => 'GGY', // Guernsey
            'GN' => 'GIN', // Guinea
            'GW' => 'GNB', // Guinea-Bissau
            'GY' => 'GUY', // Guyana
            'HT' => 'HTI', // Haiti
            'HM' => 'HMD', // Heard & McDonald Islands
            'HN' => 'HND', // Honduras
            'HK' => 'HKG', // Hong Kong SAR China
            'HU' => 'HUN', // Hungary
            'IS' => 'ISL', // Iceland
            'IN' => 'IND', // India
            'ID' => 'IDN', // Indonesia
            'IR' => 'IRN', // Iran
            'IQ' => 'IRQ', // Iraq
            'IE' => 'IRL', // Ireland
            'IM' => 'IMN', // Isle of Man
            'IL' => 'ISR', // Israel
            'IT' => 'ITA', // Italy
            'JM' => 'JAM', // Jamaica
            'JP' => 'JPN', // Japan
            'JE' => 'JEY', // Jersey
            'JO' => 'JOR', // Jordan
            'KZ' => 'KAZ', // Kazakhstan
            'KE' => 'KEN', // Kenya
            'KI' => 'KIR', // Kiribati
            'KW' => 'KWT', // Kuwait
            'KG' => 'KGZ', // Kyrgyzstan
            'LA' => 'LAO', // Laos
            'LV' => 'LVA', // Latvia
            'LB' => 'LBN', // Lebanon
            'LS' => 'LSO', // Lesotho
            'LR' => 'LBR', // Liberia
            'LY' => 'LBY', // Libya
            'LI' => 'LIE', // Liechtenstein
            'LT' => 'LTU', // Lithuania
            'LU' => 'LUX', // Luxembourg
            'MO' => 'MAC', // Macao SAR China
            'MG' => 'MDG', // Madagascar
            'MW' => 'MWI', // Malawi
            'MY' => 'MYS', // Malaysia
            'MV' => 'MDV', // Maldives
            'ML' => 'MLI', // Mali
            'MT' => 'MLT', // Malta
            'MH' => 'MHL', // Marshall Islands
            'MQ' => 'MTQ', // Martinique
            'MR' => 'MRT', // Mauritania
            'MU' => 'MUS', // Mauritius
            'YT' => 'MYT', // Mayotte
            'MX' => 'MEX', // Mexico
            'FM' => 'FSM', // Micronesia
            'MD' => 'MDA', // Moldova
            'MC' => 'MCO', // Monaco
            'MN' => 'MNG', // Mongolia
            'ME' => 'MNE', // Montenegro
            'MS' => 'MSR', // Montserrat
            'MA' => 'MAR', // Morocco
            'MZ' => 'MOZ', // Mozambique
            'MM' => 'MMR', // Myanmar (Burma)
            'NA' => 'NAM', // Namibia
            'NR' => 'NRU', // Nauru
            'NP' => 'NPL', // Nepal
            'NL' => 'NLD', // Netherlands
            'NC' => 'NCL', // New Caledonia
            'NZ' => 'NZL', // New Zealand
            'NI' => 'NIC', // Nicaragua
            'NE' => 'NER', // Niger
            'NG' => 'NGA', // Nigeria
            'NU' => 'NIU', // Niue
            'NF' => 'NFK', // Norfolk Island
            'KP' => 'PRK', // North Korea
            'MK' => 'MKD', // North Macedonia
            'MP' => 'MNP', // Northern Mariana Islands
            'NO' => 'NOR', // Norway
            'OM' => 'OMN', // Oman
            'PK' => 'PAK', // Pakistan
            'PW' => 'PLW', // Palau
            'PS' => 'PSE', // Palestinian Territories
            'PA' => 'PAN', // Panama
            'PG' => 'PNG', // Papua New Guinea
            'PY' => 'PRY', // Paraguay
            'PE' => 'PER', // Peru
            'PH' => 'PHL', // Philippines
            'PN' => 'PCN', // Pitcairn Islands
            'PL' => 'POL', // Poland
            'PT' => 'PRT', // Portugal
            'PR' => 'PRI', // Puerto Rico
            'QA' => 'QAT', // Qatar
            'RE' => 'REU', // Réunion
            'RO' => 'ROU', // Romania
            'RU' => 'RUS', // Russia
            'RW' => 'RWA', // Rwanda
            'WS' => 'WSM', // Samoa
            'SM' => 'SMR', // San Marino
            'ST' => 'STP', // São Tomé & Príncipe
            'SA' => 'SAU', // Saudi Arabia
            'SN' => 'SEN', // Senegal
            'RS' => 'SRB', // Serbia
            'SC' => 'SYC', // Seychelles
            'SL' => 'SLE', // Sierra Leone
            'SG' => 'SGP', // Singapore
            'SX' => 'SXM', // Sint Maarten
            'SK' => 'SVK', // Slovakia
            'SI' => 'SVN', // Slovenia
            'SB' => 'SLB', // Solomon Islands
            'SO' => 'SOM', // Somalia
            'ZA' => 'ZAF', // South Africa
            'GS' => 'SGS', // South Georgia & South Sandwich Islands
            'KR' => 'KOR', // South Korea
            'SS' => 'SSD', // South Sudan
            'ES' => 'ESP', // Spain
            'LK' => 'LKA', // Sri Lanka
            'BL' => 'BLM', // St. Barthélemy
            'SH' => 'SHN', // St. Helena
            'KN' => 'KNA', // St. Kitts & Nevis
            'LC' => 'LCA', // St. Lucia
            'MF' => 'MAF', // St. Martin
            'PM' => 'SPM', // St. Pierre & Miquelon
            'VC' => 'VCT', // St. Vincent & Grenadines
            'SD' => 'SDN', // Sudan
            'SR' => 'SUR', // Suriname
            'SJ' => 'SJM', // Svalbard & Jan Mayen
            'SE' => 'SWE', // Sweden
            'CH' => 'CHE', // Switzerland
            'SY' => 'SYR', // Syria
            'TW' => 'TWN', // Taiwan
            'TJ' => 'TJK', // Tajikistan
            'TZ' => 'TZA', // Tanzania
            'TH' => 'THA', // Thailand
            'TL' => 'TLS', // Timor-Leste
            'TG' => 'TGO', // Togo
            'TK' => 'TKL', // Tokelau
            'TO' => 'TON', // Tonga
            'TT' => 'TTO', // Trinidad & Tobago
            'TN' => 'TUN', // Tunisia
            'TR' => 'TUR', // Turkey
            'TM' => 'TKM', // Turkmenistan
            'TC' => 'TCA', // Turks & Caicos Islands
            'TV' => 'TUV', // Tuvalu
            'UM' => 'UMI', // U.S. Outlying Islands
            'VI' => 'VIR', // U.S. Virgin Islands
            'UG' => 'UGA', // Uganda
            'UA' => 'UKR', // Ukraine
            'AE' => 'ARE', // United Arab Emirates
            'GB' => 'GBR', // United Kingdom
            'US' => 'USA', // United States
            'UY' => 'URY', // Uruguay
            'UZ' => 'UZB', // Uzbekistan
            'VU' => 'VUT', // Vanuatu
            'VA' => 'VAT', // Vatican City
            'VE' => 'VEN', // Venezuela
            'VN' => 'VNM', // Vietnam
            'WF' => 'WLF', // Wallis & Futuna
            'EH' => 'ESH', // Western Sahara
            'YE' => 'YEM', // Yemen
            'ZM' => 'ZMB', // Zambia
            'ZW' => 'ZWE', // Zimbabwe
        ];
    }

    /**
     * Mapping from ISO 3166-1 alpha-3 to alpha-2 country codes
     */
    public static function getAlpha3ToAlpha2Mapping(): array
    {
        return array_flip(self::getAlpha2ToAlpha3Mapping());
    }

    /**
     * Convert alpha-2 code to alpha-3 code
     */
    public static function alpha2ToAlpha3(string $alpha2Code): ?string
    {
        $mapping = self::getAlpha2ToAlpha3Mapping();
        return $mapping[strtoupper($alpha2Code)] ?? null;
    }

    /**
     * Convert alpha-3 code to alpha-2 code
     */
    public static function alpha3ToAlpha2(string $alpha3Code): ?string
    {
        $mapping = self::getAlpha3ToAlpha2Mapping();
        return $mapping[strtoupper($alpha3Code)] ?? null;
    }
}
