<?php declare(strict_types=1);

/*
 * This file is part of CM0102: data.
 *
 * (c) 2024 Kuba Werłos
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace CM0102Data\Generator\Template;

final readonly class Clubs
{
    private const array TRUNCATED_NAMES = ‹TRUNCATED_NAMES›;
    private const array CLUBS = ‹CLUBS›;

    /**
     * @return array{string, string}
     */
    public static function getLongNameAndNationForShortName(string $shortName): array
    {
        if (isset(self::TRUNCATED_NAMES[$shortName])) {
            $shortName = self::TRUNCATED_NAMES[$shortName];
        }

        if (!isset(self::CLUBS[$shortName])) {
            throw new \RuntimeException("Club with name \"{$shortName}\" not found.");
        }

        if (\count(self::CLUBS[$shortName]) > 1) {
            throw new \RuntimeException("Club \"{$shortName}\" has multiple nations.");
        }

        $firstKey = \array_key_first(self::CLUBS[$shortName]);
        \assert(\is_string($firstKey));

        return [self::CLUBS[$shortName][$firstKey], $firstKey];
    }

    public static function getLongNameForShortNameAndNation(string $shortName, string $nation): string
    {
        if (isset(self::TRUNCATED_NAMES[$shortName])) {
            $shortName = self::TRUNCATED_NAMES[$shortName];
        }

        if (!isset(self::CLUBS[$shortName])) {
            throw new \RuntimeException("Club with short name \"{$shortName}\" not found.");
        }

        if (!isset(self::CLUBS[$shortName][$nation])) {
            $availableNations = \implode(', ', \array_keys(self::CLUBS[$shortName]));
            throw new \RuntimeException("Club with short name \"{$shortName}\" not found for nation \"{$nation}\"! Available nations: {$availableNations}.");
        }

        return self::CLUBS[$shortName][$nation];
    }
}
