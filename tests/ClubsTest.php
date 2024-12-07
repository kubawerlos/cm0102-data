<?php declare(strict_types=1);

/*
 * This file is part of CM0102: data.
 *
 * (c) 2024 Kuba Werłos
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests;

use CM0102Data\Clubs;
use CM0102Data\Nations;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 */
#[CoversClass(Clubs::class)]
final class ClubsTest extends TestCase
{
    public function testTruncatedNamesAreCorrect(): void
    {
        /** @var array<string, string> $truncatedNames */
        $truncatedNames = new \ReflectionClass(Clubs::class)->getConstant('TRUNCATED_NAMES');

        foreach ($truncatedNames as $truncatedName => $name) {
            self::assertSame(20, \mb_strlen($truncatedName));
            self::assertGreaterThan(20, \mb_strlen($name));
        }
    }

    public function testClubsAreCorrect(): void
    {
        /** @var array<string, string> $nations */
        $nations = new \ReflectionClass(Nations::class)->getConstant('NATIONS');

        /** @var array<string, array<string, string>> $clubs */
        $clubs = new \ReflectionClass(Clubs::class)->getConstant('CLUBS');

        foreach ($clubs as $shortName => $longNames) {
            self::assertGreaterThanOrEqual(2, \strlen($shortName));

            $sortedLongNames = $longNames;
            \ksort($longNames);
            self::assertSame($sortedLongNames, $longNames);
            foreach ($longNames as $nation => $longName) {
                self::assertArrayHasKey($nation, $nations);

                self::assertGreaterThanOrEqual(2, \strlen($longName));
                self::assertSame(\mb_trim($longName), $longName);
            }
        }
    }

    public function testGettingLongNameAndNationForNonExistingShortName(): void
    {
        self::expectException(\RuntimeException::class);
        self::expectExceptionMessage('Club with name "Chicago Bulls" not found.');

        Clubs::getLongNameAndNationForShortName('Chicago Bulls');
    }

    public function testGettingLongNameAndNationForExistingShortName(): void
    {
        self::assertSame(
            ['Slask Wroclaw', 'Poland'],
            Clubs::getLongNameAndNationForShortName('Slask'),
        );
    }

    public function testGettingLongNameAndNationForTruncatedShortName(): void
    {
        self::assertSame(
            ['Pontlottyn Blast Furnace', 'Wales'],
            Clubs::getLongNameAndNationForShortName('Pontlottyn Blast Fur'),
        );
    }

    public function testGettingLongNameAndNationForShortNameHavingMultipleNations(): void
    {
        self::expectException(\RuntimeException::class);
        self::expectExceptionMessage('Club "Dynamos" has multiple nations.');

        Clubs::getLongNameAndNationForShortName('Dynamos');
    }

    public function testGettingLongNameForNonExistingShortName(): void
    {
        self::expectException(\RuntimeException::class);
        self::expectExceptionMessage('Club with short name "Pittsburgh Penguins" not found.');

        Clubs::getLongNameForShortNameAndNation('Pittsburgh Penguins', 'Canada');
    }

    public function testGettingLongNameForDifferentNation(): void
    {
        self::expectException(\RuntimeException::class);
        self::expectExceptionMessage('Club with short name "Cosmos" not found for nation "Luxembourg"! Available nations: San Marino, Slovenia.');

        Clubs::getLongNameForShortNameAndNation('Cosmos', 'Luxembourg');
    }

    public function testGettingLongNameForExistingShortNameAndCorrectNation(): void
    {
        self::assertSame(
            'Fortuna Sittard',
            Clubs::getLongNameForShortNameAndNation('Fortuna', 'Holland'),
        );
    }

    public function testGettingLongNameForTruncatedShortNameAndCorrectNation(): void
    {
        self::assertSame(
            'Estudiantes de Mérida Fútbol Club',
            Clubs::getLongNameForShortNameAndNation('Estudiantes de Mérid', 'Venezuela'),
        );
    }
}
