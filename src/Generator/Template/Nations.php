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

/**
 * @internal
 */
final readonly class Nations
{
    private const array NATIONS = ‹NATIONS›;

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
