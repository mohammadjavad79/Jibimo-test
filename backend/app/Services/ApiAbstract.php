<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

abstract class ApiAbstract
{
    /**
     * @var string
     */
    protected string $url;

    /**
     * @return array
     */
    abstract protected function getHeaders(): array;


    /**
     * @param string $path
     * @param array|null $data
     *
     * @return array
     * @throws \Exception
     */
    protected function get(string $path, array|null $data = null): array
    {
        if (!empty($data)) {
            $data = '?' . http_build_query($data);
        } else {
            $data = '';
        }
        try {
            $response = Http::withHeaders($this->getHeaders())->get($this->url . $path . $data);
            return $response->json();

        } catch (\Exception $exception) {
            Log::error('Error in Http Get function for ApiAbstract' . $exception->getMessage(),
                $exception->getTrace()
            );

            return [];
        }
    }

    /**
     * @param string     $path    Path.
     * @param array|null $data    Data.
     * @param array|null $headers Headers.
     * @return array
     * @throws \Exception         Exception.
     */
    protected function delete(string $path, array|null $data = [], array|null $headers = null): array
    {
        if (empty($headers)) {
            $headers = $this->getHeaders();
        }
        try {
            $response = Http::withHeaders($headers)->delete($this->url . $path, $data);
        } catch (\HttpException $exception) {
            Log::error('Http Exception Error: ' . $exception->getMessage(), $exception->getTrace());
            throw new \Exception(__('error.curl_exception_message'));
        }

        return $response->json();
    }

    /**
     * @param string     $path    Path.
     * @param array|null $data    Data.
     * @param array|null $headers Headers.
     * @return array
     * @throws \Exception         Exception.
     */
    protected function put(string $path, ?array $data = [], ?array $headers = []): array
    {
        if (empty($headers)) {
            $headers = $this->getHeaders();
        }
        try {
            $response = Http::withHeaders($headers)->put($this->url . $path, $data);
        } catch (\HttpException $exception) {
            Log::error('Http Exception Error: ' . $exception->getMessage(), $exception->getTrace());
            throw new \Exception(__('error.curl_exception_message'));
        }

        return $response->json();
    }

    /**
     * @param string     $path    Path.
     * @param array|null $data    Data.
     * @param array|null $headers Headers.
     *
     * @return array
     * @throws \Exception         Exception.
     */
    protected function post(string $path, ?array $data = [], ?array $headers = null): array
    {
        if (empty($headers)) {
            $headers = $this->getHeaders();
        }
        try {
            $response = Http::withHeaders($headers)->post($this->url . $path, $data);
        } catch (\HttpException $exception) {
            Log::error('Http Exception Error: ' . $exception->getMessage(), $exception->getTrace());
            throw new \Exception(__('error.curl_exception_message'));
        }

        return $response->json();
    }
}
