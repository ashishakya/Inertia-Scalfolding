<?php

namespace App\Console;

use Illuminate\Foundation\Console\ModelMakeCommand;

/**
 * Class MakeModel
 * @package App\Console
 */
class MakeModel extends ModelMakeCommand
{
    /**
     * Prefix default root namespace with a folder.
     *
     * @param string $rootNamespace
     *
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return "{$rootNamespace}\BDMS\Models";
    }
}

