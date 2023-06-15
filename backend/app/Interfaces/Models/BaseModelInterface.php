<?php

namespace App\Interfaces\Models;

use App\Interfaces\Traits\HasExportColumnsInterface;
use App\Interfaces\Traits\HasIdInterface;


/** IDE Helpers
 *  @method mixed getId() Get Id
 *  @method $this setId(mixed $value) Set Id
END IDE Helpers */
interface BaseModelInterface extends HasIdInterface, HasExportColumnsInterface
{
}
