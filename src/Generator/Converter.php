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
final class Converter
{
    public static function fromBinaryLong(string $string, int $offset): int
    {
        // @phpstan-ignore-next-line
        return \unpack('l', \substr($string, $offset, 4))[1];
    }

    public static function fromBinaryString(string $string, int $offset): string
    {
        $endOfString = \strpos($string, \chr(0), $offset);
        \assert(\is_int($endOfString));

        $string = \substr($string, $offset, $endOfString - $offset);

        // @phpstan-ignore-next-line
        return \iconv('ISO-8859-1', 'UTF-8', $string);
    }
}
