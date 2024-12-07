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

use CM0102Data\Nations;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 */
#[CoversClass(Nations::class)]
final class NationsTest extends TestCase
{
    public function testNationsAreCorrect(): void
    {
        /** @var array<string, string> $nations */
        $nations = new \ReflectionClass(Nations::class)->getConstant('NATIONS');

        foreach ($nations as $name => $code) {
            self::assertSame(3, \strlen($code));
            self::assertMatchesRegularExpression('/^[A-Z]{3}$/', $code);

            self::assertGreaterThan(3, \strlen($name));
            self::assertSame(\mb_trim($name), $name);
            self::assertFalse(\strpos($name, ','));
        }
    }

    public function testGettingCodeForNonExistingName(): void
    {
        self::expectException(\RuntimeException::class);
        self::expectExceptionMessage('Nation with name "Narnia" not found.');

        Nations::getCodeByName('Narnia');
    }

    public function testGettingCodeForExistingName(): void
    {
        self::assertSame('POL', Nations::getCodeByName('Poland'));
    }

    public function testGettingNameForNonExistingCode(): void
    {
        self::expectException(\RuntimeException::class);
        self::expectExceptionMessage('Nation with code "GBR" not found.');

        Nations::getNameForCode('GBR');
    }

    public function testGettingNameForExistingCode(): void
    {
        self::assertSame('England', Nations::getNameForCode('ENG'));
    }

    public function testGettingNameForDuplicatedCode(): void
    {
        self::assertSame('GUA', Nations::getCodeByName('Guam'));
        self::assertSame('GUA', Nations::getCodeByName('Guatemala'));

        self::expectException(\RuntimeException::class);
        self::expectExceptionMessage('Nation with code "GUA" not found.');

        Nations::getNameForCode('GUA');
    }
}
