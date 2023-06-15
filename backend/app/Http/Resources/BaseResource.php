<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

abstract class BaseResource extends JsonResource
{
    /**
     * @param $resource
     * @param int|null $status Status.
     */
    public function __construct($resource, public ?int $status = null)
    {
        parent::__construct($resource);
    }

    /**
     * @param $request
     * @param $response
     * @return \Illuminate\Http\JsonResponse|void
     */
    public function withResponse($request, $response)
    {
        if (!is_null($this->status)) {
            return $response->setStatusCode($this->status);
        }
    }
}
