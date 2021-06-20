<?php

namespace Trainer\Superglobals;

use Console_Table;
use Trainer\Executable;

class Superglobals extends Executable
{
    /**
     * @inheritdoc
     */
    public const SIGNATURE = 'superglobals';

    /**
     * @inheritdoc
     */
    public static function run(): void
    {
        $table = new Console_Table();
        $table->setHeaders(['Key', 'Value']);

        foreach ($_SERVER as $key => $value) {
            $display = is_array($value) ? implode(', ', $value) : $value;
            $table->addRow([$key, $display]);
        }

        echo $table->getTable();
    }
}
