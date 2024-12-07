<?php declare(strict_types=1);

/*
 * This file is part of CM0102: data.
 *
 * (c) 2024 Kuba Werłos
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace CM0102Data\Generator;

/**
 * @internal
 */
final class ClubsGenerator
{
    /**
     * @return array<string, array<string, string>>
     */
    public static function generate(): array
    {
        $nationsNameToCode60 = NationsGenerator::generateNameToCode('3.9.60');
        $nationsNameToCode68 = NationsGenerator::generateNameToCode('3.9.68');
        $nationsCodeToName68 = NationsGenerator::generateCodeToName('3.9.68');

        $clubs = self::generateShortNameToNationAndLongName('3.9.68');
        $clubs60 = self::generateShortNameToNationAndLongName('3.9.60');
        foreach ($clubs60 as $shortName => $nationToLongName) {
            if (!isset($clubs[$shortName])) {
                $clubs[$shortName] = [];
            }
            foreach ($nationToLongName as $nation => $longName) {
                if (!isset($nationsNameToCode68[$nation])) {
                    $nation = $nationsCodeToName68[$nationsNameToCode60[$nation]];
                }
                if (\mb_strlen($clubs[$shortName][$nation] ?? '') >= \mb_strlen($longName)) {
                    $longName = $clubs[$shortName][$nation];
                }
                $clubs[$shortName][$nation] = $longName;
            }
        }

        return \array_filter(
            $clubs,
            static fn (array $nations): bool => $nations !== [],
        );
    }

    /**
     * @return array<string, array<string, string>>
     */
    public static function generateShortNameToNationAndLongName(string $version): array
    {
        $clubs = [];
        foreach (self::parse($version) as $data) {
            if (!isset($clubs[$data['short_name']])) {
                $clubs[$data['short_name']] = [];
            }
            if ($data['nation'] === null) {
                continue;
            }
            $clubs[$data['short_name']][$data['nation']] = $data['long_name'];
        }

        return $clubs;
    }

    /**
     * @return iterable<array{short_name: string, long_name: string, nation: null|string}>
     */
    private static function parse(string $version): iterable
    {
        $nations = NationsGenerator::generateIdToName($version);

        $content = \file_get_contents(__DIR__ . "/../../data/{$version}/club.dat");
        \assert(\is_string($content));

        foreach (\str_split($content, 581) as $row) {
            $longName = Converter::fromBinaryString($row, 4);
            $lineEndingPosition = \strpos($longName, "\n");
            if (\is_int($lineEndingPosition)) {
                $longName = \substr($longName, 0, $lineEndingPosition - 1);
            }
            yield [
                'short_name' => \mb_trim(Converter::fromBinaryString($row, 56)),
                'long_name' => \mb_trim($longName),
                'nation' => $nations[Converter::fromBinaryLong($row, 83)] ?? null,
            ];
        }
    }
}
