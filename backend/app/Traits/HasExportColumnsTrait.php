<?php

namespace App\Traits;

use Illuminate\Support\Facades\Schema;

trait HasExportColumnsTrait
{
    /***
     * export columns.
     *
     * @return array
     */
    public function exportColumns(): array
    {
        return Schema::getColumnListing(static::TABLE ?? $this->table);
    }
}
