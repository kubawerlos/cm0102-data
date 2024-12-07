<?php declare(strict_types=1);

/*
 * This file is part of CM0102: data.
 *
 * (c) 2024 Kuba Werłos
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

require __DIR__ . '/vendor/autoload.php';

use PhpCsFixer\Finder;
use PhpCsFixerConfig\Factory;

$config = Factory::createForLibrary('CM0102: data', 'Kuba Werłos', 2024)
    ->setFinder(
        Finder::create()
            ->files()
            ->ignoreDotFiles(false)
            ->in(__DIR__),
    );

$rules = $config->getRules();
$rules['mb_str_functions'] = false;

return $config->setRules($rules);
