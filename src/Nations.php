<?php declare(strict_types=1);

/*
 * This file is part of CM0102: data.
 *
 * (c) 2024 Kuba Werłos
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace CM0102Data;

final readonly class Nations
{
    private const array NATIONS = [
        'Afghanistan' => 'AFG',
        'Albania' => 'ALB',
        'Algeria' => 'ALG',
        'American Samoa' => 'ASM',
        'Andorra' => 'AND',
        'Angola' => 'AGO',
        'Anguilla' => 'AGL',
        'Antigua & Barbuda' => 'ATG',
        'Argentina' => 'ARG',
        'Armenia' => 'ARM',
        'Aruba' => 'ARU',
        'Australia' => 'AUS',
        'Austria' => 'AUT',
        'Azerbaijan' => 'AZE',
        'Bahamas' => 'BHM',
        'Bahrain' => 'BHR',
        'Bangladesh' => 'BGD',
        'Barbados' => 'BRB',
        'Belarus' => 'BLR',
        'Belgium' => 'BEL',
        'Belize' => 'BLZ',
        'Benin' => 'BEN',
        'Bermuda' => 'BER',
        'Bhutan' => 'BHU',
        'Bolivia' => 'BOL',
        'Bosnia-Herzegovina' => 'BOS',
        'Botswana' => 'BWA',
        'Brazil' => 'BRA',
        'British Virgin Islands' => 'BVI',
        'Brunei Darussalam' => 'BRU',
        'Bulgaria' => 'BGR',
        'Burkina Faso' => 'BFA',
        'Burundi' => 'BSI',
        'Cambodia' => 'CAM',
        'Cameroon' => 'CMR',
        'Canada' => 'CAN',
        'Cape Verde Islands' => 'CPV',
        'Cayman Islands' => 'CYM',
        'Central African Republic' => 'CTA',
        'Chad' => 'CHD',
        'Chile' => 'CHI',
        'China PR' => 'CHN',
        'Chinese Taipei' => 'TPE',
        'Colombia' => 'COL',
        'Cook Islands' => 'COK',
        'Costa Rica' => 'CRC',
        'Croatia' => 'HRV',
        'Cuba' => 'CUB',
        'Cyprus' => 'CYP',
        'Czech Republic' => 'CZE',
        'Democratic Republic of Congo' => 'DRC',
        'Denmark' => 'DEN',
        'Djibouti' => 'DJI',
        'Dominica' => 'DMA',
        'Dominican Republic' => 'DOM',
        'Ecuador' => 'ECU',
        'Egypt' => 'EGY',
        'El Salvador' => 'SLV',
        'England' => 'ENG',
        'Equatorial Guinea' => 'EQG',
        'Eritrea' => 'ERI',
        'Estonia' => 'EST',
        'Ethiopia' => 'ETH',
        'Faroe Islands' => 'FRO',
        'Fiji' => 'FIJ',
        'Finland' => 'FIN',
        'France' => 'FRA',
        'FYR of Macedonia' => 'MKD',
        'Gabon' => 'GAB',
        'Georgia' => 'GEO',
        'Germany' => 'GER',
        'Ghana' => 'GHA',
        'Greece' => 'GRE',
        'Grenada' => 'GRD',
        'Guam' => 'GUA',
        'Guatemala' => 'GUA',
        'Guinea' => 'GUI',
        'Guinea-Bissau' => 'GNB',
        'Guyana' => 'GUY',
        'Haiti' => 'HTI',
        'Holland' => 'HOL',
        'Honduras' => 'HND',
        'Hong Kong' => 'HKG',
        'Hungary' => 'HUN',
        'Iceland' => 'ISL',
        'India' => 'IND',
        'Indonesia' => 'IDN',
        'Iran' => 'IRN',
        'Iraq' => 'IRQ',
        'Israel' => 'ISR',
        'Italy' => 'ITA',
        'Ivory Coast' => 'CIV',
        'Jamaica' => 'JAM',
        'Japan' => 'JPN',
        'Jordan' => 'JOR',
        'Kazakhstan' => 'KAZ',
        'Kenya' => 'KEN',
        'Kuwait' => 'KUW',
        'Kyrgyzstan' => 'KGZ',
        'Laos' => 'LAO',
        'Latvia' => 'LVA',
        'Lebanon' => 'LIB',
        'Lesotho' => 'LSO',
        'Liberia' => 'LBR',
        'Libya' => 'LBY',
        'Liechtenstein' => 'LIE',
        'Lithuania' => 'LTU',
        'Luxembourg' => 'LUX',
        'Macau' => 'MAC',
        'Madagascar' => 'MDG',
        'Malawi' => 'MWI',
        'Malaysia' => 'MYS',
        'Maldives' => 'MDV',
        'Mali' => 'MLI',
        'Malta' => 'MLT',
        'Mauritania' => 'MTN',
        'Mauritius' => 'MUS',
        'Mexico' => 'MEX',
        'Moldova' => 'MOL',
        'Mongolia' => 'MGL',
        'Montserrat' => 'MST',
        'Morocco' => 'MOR',
        'Mozambique' => 'MOZ',
        'Myanmar' => 'MMR',
        'Namibia' => 'NAM',
        'Nepal' => 'NPL',
        'Netherlands Antilles' => 'ANT',
        'New Caledonia' => 'NCD',
        'New Zealand' => 'NZL',
        'Nicaragua' => 'NIC',
        'Niger' => 'NIG',
        'Nigeria' => 'NGA',
        'North Korea' => 'PRK',
        'Northern Ireland' => 'NIR',
        'Norway' => 'NOR',
        'Oman' => 'OMN',
        'Pakistan' => 'PAK',
        'Palestine' => 'PAL',
        'Panama' => 'PAN',
        'Papua New Guinea' => 'PNG',
        'Paraguay' => 'PAR',
        'Peru' => 'PER',
        'Poland' => 'POL',
        'Portugal' => 'POR',
        'Puerto Rico' => 'PUR',
        'Qatar' => 'QAT',
        'Republic of Ireland' => 'IRL',
        'Romania' => 'ROM',
        'Russia' => 'RUS',
        'Rwanda' => 'RWA',
        'Saint Lucia' => 'LUC',
        'Samoa' => 'WSM',
        'San Marino' => 'SMR',
        'São Tomé & Principe' => 'STP',
        'Saudi Arabia' => 'KSA',
        'Scotland' => 'SCO',
        'Senegal' => 'SEN',
        'Seychelles' => 'SYC',
        'Sierra Leone' => 'SLE',
        'Singapore' => 'SIN',
        'Slovakia' => 'SVK',
        'Slovenia' => 'SVN',
        'Solomon Islands' => 'SOL',
        'Somalia' => 'SOM',
        'South Africa' => 'RSA',
        'South Korea' => 'KOR',
        'Spain' => 'ESP',
        'Sri Lanka' => 'SRI',
        'St Kitts & Nevis' => 'KNA',
        'St Vincent & The Grenadines' => 'VCT',
        'Sudan' => 'SDN',
        'Surinam' => 'SUR',
        'Swaziland' => 'SWZ',
        'Sweden' => 'SWE',
        'Switzerland' => 'SUI',
        'Syria' => 'SYR',
        'Tahiti' => 'TAH',
        'Tajikistan' => 'TJK',
        'Tanzania' => 'TAN',
        'Thailand' => 'THA',
        'The Congo' => 'COG',
        'The Gambia' => 'GMB',
        'The Philippines' => 'PHI',
        'Togo' => 'TGO',
        'Tonga' => 'TON',
        'Trinidad & Tobago' => 'TTO',
        'Tunisia' => 'TUN',
        'Turkey' => 'TUR',
        'Turkmenistan' => 'TKM',
        'Turks and Caicos Islands' => 'TCI',
        'Uganda' => 'UGA',
        'Ukraine' => 'UKR',
        'United Arab Emirates' => 'UAE',
        'United States' => 'USA',
        'Uruguay' => 'URU',
        'US Virgin Islands' => 'USV',
        'Uzbekistan' => 'UZB',
        'Vanuatu' => 'VAN',
        'Venezuela' => 'VEN',
        'Vietnam' => 'VNM',
        'Wales' => 'WAL',
        'Yemen' => 'YEM',
        'Yugoslavia' => 'YUG',
        'Zambia' => 'ZAM',
        'Zimbabwe' => 'ZIM',
    ];

    public static function getCodeByName(string $name): string
    {
        if (!isset(self::NATIONS[$name])) {
            throw new \RuntimeException("Nation with name \"{$name}\" not found.");
        }

        return self::NATIONS[$name];
    }

    public static function getNameForCode(string $code): string
    {
        $nationsByCode = self::getNationsByCode();

        if (!isset($nationsByCode[$code])) {
            throw new \RuntimeException("Nation with code \"{$code}\" not found.");
        }

        return $nationsByCode[$code];
    }

    /**
     * @return array<string, string>
     */
    private static function getNationsByCode(): array
    {
        static $nationsByCode = null;

        if ($nationsByCode === null) {
            $nationsByCode = [];
            foreach (self::NATIONS as $name => $code) {
                if (!isset($nationsByCode[$code])) {
                    $nationsByCode[$code] = [];
                }
                $nationsByCode[$code][] = $name;
            }

            $nationsByCode = \array_map(
                static fn (array $names) => $names[0],
                \array_filter(
                    $nationsByCode,
                    static fn (array $names): bool => \count($names) === 1,
                ),
            );
        }

        return $nationsByCode;
    }
}
