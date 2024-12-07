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
final class NationsGenerator
{
    /**
     * @return array<string, string>
     */
    public static function generate(): array
    {
        return self::generateNameToCode('3.9.68');
    }

    /**
     * @return array<string, string>
     */
    public static function generateCodeToName(string $version): array
    {
        $nations = [];
        foreach (self::parse($version) as $data) {
            $nations[$data['code']] = $data['name'];
        }

        return $nations;
    }

    /**
     * @return array<int, string>
     */
    public static function generateIdToName(string $version): array
    {
        $nations = [];
        foreach (self::parse($version) as $data) {
            $nations[$data['id']] = $data['name'];
        }

        return $nations;
    }

    /**
     * @return array<string, string>
     */
    public static function generateNameToCode(string $version): array
    {
        $nations = [];
        foreach (self::parse($version) as $data) {
            $nations[$data['name']] = $data['code'];
        }
        \ksort($nations);

        return $nations;
    }

    /**
     * @return iterable<array{id: int, code: string, name: string}>
     */
    private static function parse(string $version): iterable
    {
        $content = \file_get_contents(__DIR__ . "/../../data/{$version}/nation.dat");
        \assert(\is_string($content));

        foreach (\str_split($content, 290) as $row) {
            $continentId = Converter::fromBinaryLong($row, 113);
            if ($continentId < 0) {
                continue;
            }

            yield [
                'id' => Converter::fromBinaryLong($row, 0),
                'code' => \trim(Converter::fromBinaryString($row, 83)),
                'name' => \trim(Converter::fromBinaryString($row, 4)),
            ];
        }
    }
}
