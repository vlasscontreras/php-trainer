<?php

/**
 * Matched Expressions (PHP ^8.0)
 *
 * These are expressions that assign the proper value to `$matched`
 * if the given `$value` matches, in an function + array-like syntax.
 *
 * Pretty much like a clean replacement for `switch`.
 */

namespace Trainer\General\MatchedExpressions;

use Trainer\Executable;

class MatchedExpressions extends Executable
{
    /**
     * @inheritdoc
     */
    public const SIGNATURE = 'matched-expressions';

    /**
     * @inheritdoc
     */
    public static function run(): void
    {
        $possibleValues = ['Conversation', 'Comment', 'Reply', 'Subcomment', 'Pageview', 'Attack'];
        $value = array_rand(array_flip($possibleValues), 1); // Pick a random value.

        // Instead of this.
        // switch ($value) {
        //     case 'Conversation':
        //         $matched = 'Started to conversation';
        //         break;

        //     case 'Comment':
        //         $matched = 'Added a new comment';
        //         break;

        //     case 'Subcomment':
        //     case 'Reply':
        //         $matched = 'Replied to conversation';
        //         break;
        //
        //     case 'Attack':
        //         $matched = self::test();
        //         break;
        //
        //     default:
        //         $matched = 'No action needed';
        //         break;
        // }

        // We can just do this.
        $matched = match ($value) {
            'Conversation'        => 'Started to conversation',
            'Comment'             => 'Added a new comment',
            'Reply', 'Subcomment' => 'Replied to conversation',
            'Attack'              => self::test(),
            default               => 'No action needed', // phpcs:ignore
        };

        echo $value . ' => ' . $matched . PHP_EOL; // phpcs:ignore
    }

    /**
     * Test value
     *
     * @return string
     */
    public static function test()
    {
        // Do something complex, like notify admins.

        // Return the desired value to assign to the match.
        return 'Mitigate vulnerability';
    }
}
