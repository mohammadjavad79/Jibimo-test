<?php

namespace App\Interfaces\Traits;

interface HasExportColumnsInterface
{
    /***
     * export columns.
     *
     * @return array
     */
    public function exportColumns(): array;
}
