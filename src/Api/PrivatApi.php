<?php

namespace Abyzs\PrivatCoolLib\Api;

use Exception;

class PrivatApi
{
    private string $url;

    public function __construct()
    {
        $this->url = (new PrivatUrl())->get();
    }

    public function getData(): array
    {
        try {
            $curl = curl_init();

            curl_setopt_array($curl, [
                    CURLOPT_URL => $this->url,
                    CURLOPT_CUSTOMREQUEST => "GET",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_HTTPHEADER => ['Content-Type:application/json'],
                ]
            );

            return json_decode(curl_exec($curl), true);
        } catch (Exception $e)
        {
            echo $e->getMessage();
        }
    }
}