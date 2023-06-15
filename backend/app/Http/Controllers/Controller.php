<?php

namespace App\Http\Controllers;

use Habibi\Interfaces\FiltersInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Collection;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;


    const MESSAGE = 'message';
    const DEFAULT_PAGE_SIZE = 15;
    const PER_PAGE = 'per_page';
    const STATUS = 'status';
    const MODEL = 'model';
    const RESPONSE = 'response';
    const DATA = 'data';
    const ERROR = 'error';

    /**
     * @param array $parameter Parameter.
     *
     * @return int
     */
    protected function getResponseStatus(array &$parameter): int
    {
        $status = $parameter[self::STATUS];
        unset($parameter[self::STATUS]);

        return $status;
    }

    /**
     * @param array $parameter Paramter.
     *
     * @return void
     */
    protected function checkIfThereIsError(array &$parameter): void
    {
        if (isset($parameter[self::ERROR]) && empty($parameter[self::ERROR])) {
            unset($parameter[self::ERROR]);
        }
    }
}
