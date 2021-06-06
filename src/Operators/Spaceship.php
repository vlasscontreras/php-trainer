<?php

/**
 * The spaceship operator (PHP ^7.0)
 *
 * It returns -1, 0 or 1 when $a is respectively less than, equal to,
 * or greater than $b. Comparisons are performed according to PHP's
 * usual type comparison rules.
 *
 * @link https://www.php.net/manual/en/migration70.new-features.php
 * @link https://www.php.net/manual/en/types.comparisons.php
 */

namespace Trainer\Operators;

use Trainer\Executable;

class Spaceship extends Executable
{
    /**
     * @inheritdoc
     */
    public const SIGNATURE = 'operator:spaceship';

    /**
     * @inheritdoc
     */
    public static function run(): void
    {
        $games = [
            'Super Mario Bros',
            'Zelda',
            'Mortal Kombat',
            'Need for Speed',
            'Kirby',
            'Mario Kart',
        ];

        usort($games, function ($a, $b) {
            return $a <=> $b;
        });

        print_r($games);
    }
}
