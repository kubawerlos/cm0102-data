<?php declare(strict_types=1);

/*
 * This file is part of CM0102: data.
 *
 * (c) 2024 Kuba Werłos
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

require_once __DIR__ . '/vendor/autoload.php';

use CM0102Data\Generator\ClubsGenerator;
use CM0102Data\Generator\FileDumper;
use CM0102Data\Generator\NationsGenerator;

FileDumper::dumpClubs(ClubsGenerator::generate());
FileDumper::dumpNations(NationsGenerator::generate());
