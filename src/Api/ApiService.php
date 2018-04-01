<?php

namespace Pushover\Api;

class ApiService
{
    /**
     * @param string $endpoint
     * @param array $payload
     *
     * @return mixed
     */
    public function call(string $endpoint, array $payload)
    {
        $url = 'https://api.pushover.net' . $endpoint;

        $payload['token'] = config('pushover.token');
        $payload['user'] = config('pushover.user');

        dd($payload);

        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $url);
        curl_setopt($c, CURLOPT_HEADER, false);
        curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $payload);
        $response = curl_exec($c);

        return json_decode($response);
    }
}
