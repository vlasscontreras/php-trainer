<?php

namespace Trainer\MagicConstants;

use Console_Table;
use Trainer\Executable;

class MagicConstants extends Executable
{
    /**
     * @inheritdoc
     */
    public const SIGNATURE = 'magic-constants';

    /**
     * @inheritdoc
     */
    public static function run(): void
    {
        $table = new Console_Table();
        $table->setHeaders(['Constant', 'Value']);

        $table->addRow(['__LINE__', __LINE__]);
        $table->addRow(['__DIR__', __DIR__]);
        $table->addRow(['__FILE__', __FILE__]);
        $table->addRow(['__CLASS__', __CLASS__]);
        $table->addRow(['__METHOD__', __METHOD__]);
        $table->addRow(['__FUNCTION__', __FUNCTION__]);
        $table->addRow(['__TRAIT__', __TRAIT__]);
        $table->addRow(['__NAMESPACE__', __NAMESPACE__]);

        echo $table->getTable();
    }
}
