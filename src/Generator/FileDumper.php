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
final readonly class FileDumper
{
    /**
     * @param array<string, array<string, string>> $clubs
     */
    public static function dumpClubs(array $clubs): void
    {
        $truncatedNames = [];
        foreach (\array_keys($clubs) as $name) {
            if (\mb_strlen($name) <= 20) {
                continue;
            }
            $truncatedNames[\mb_substr($name, 0, 20)] = $name;
        }

        $php = self::getTemplateCode('Clubs');

        $truncatedNamesCode = '[';
        foreach (self::sortByKey($truncatedNames) as $truncatedName => $name) {
            $truncatedNamesCode .= \sprintf("\n        '%s' => '%s',", \str_replace("'", "\\'", $truncatedName), \str_replace("'", "\\'", $name));
        }
        $truncatedNamesCode .= "\n    ]";

        $clubsCode = '[';
        foreach (self::sortByKey($clubs) as $name => $nationToLongName) {
            $longNames = [];
            foreach (self::sortByKey($nationToLongName) as $nation => $longName) {
                $longNames[] = \sprintf("'%s' => '%s'", $nation, \str_replace("'", "\\'", $longName));
            }
            $clubsCode .= \sprintf("\n        '%s' => [%s],", \str_replace("'", "\\'", $name), \implode(', ', $longNames));
        }
        $clubsCode .= "\n    ]";

        $php = \str_replace('‹TRUNCATED_NAMES›', $truncatedNamesCode, $php);
        $php = \str_replace('‹CLUBS›', $clubsCode, $php);
        \file_put_contents(__DIR__ . '/../Clubs.php', $php);
    }

    /**
     * @param array<string, string> $nations
     */
    public static function dumpNations(array $nations): void
    {
        $php = self::getTemplateCode('Nations');

        $nationsArray = '[';
        foreach (self::sortByKey($nations) as $name => $code) {
            $nationsArray .= \sprintf("\n        '%s' => '%s',", $name, $code);
        }
        $nationsArray .= "\n    ]";

        $php = \str_replace('‹NATIONS›', $nationsArray, $php);
        \file_put_contents(__DIR__ . '/../Nations.php', $php);
    }

    private static function getTemplateCode(string $path): string
    {
        $php = \file_get_contents(__DIR__ . '/Template/' . $path . '.php');
        \assert(\is_string($php));

        $replaces = [
            "/**\n * @internal\n */\n" => '',
            'namespace CM0102Data\\Generator\\Template;' => 'namespace CM0102Data;',
        ];

        return \str_replace(\array_keys($replaces), \array_values($replaces), $php);
    }

    /**
     * @template T
     *
     * @param array<string, T> $array
     *
     * @return array<string, T>
     */
    private static function sortByKey(array $array): array
    {
        $keys = \array_keys($array);
        (new \Collator('UTF-8'))->sort($keys, \Collator::SORT_STRING);
        $sorted = [];
        foreach ($keys as $key) {
            $sorted[$key] = $array[$key];
        }

        return $sorted;
    }
}
