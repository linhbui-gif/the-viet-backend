<?php
namespace App\Services;

use App\Helpers\Api;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ApiRequestService
{

    public function get($url, $param)
    {
        $response = Http::get($url, $param);

        $data = !is_null(json_decode($response->body(), true)) ?
            json_decode($response->body(), true) : [];

        return $data;
    }

    public function post($url, $param)
    {
        $response = Http::post($url, $param);

        $data = !is_null(json_decode($response->body(), true)) ?
            json_decode($response->body(), true) : [];

        return $data;
    }

    public function loginWithUserPass($user, $pass){
        try {
            $expectedAuthString = base64_encode( "WTV:".$user.":" . $pass);
            $client = new \GuzzleHttp\Client();
            $response = $client->request('GET', 'http://acs.12c.vn/api/Token/Login', [
                'headers' => [
                    'Authorization' => 'Basic ' . $expectedAuthString,
                    'Accept' => 'application/json',
                ],

            ]);
            return json_decode($response->getBody(), true);
        } catch (GuzzleException $exception) {
            return [];
        }
    }
    public function getInfoUser($cmnd, $token){
        try {

            $data = [
                'ApiData' => $cmnd
            ];
            $data_json = json_encode($data);

            $client = new \GuzzleHttp\Client();
            $response = $client->request('GET', 'http://cos.12c.vn/api/CosPeople/GetByBasicInfo', [
                'headers' => [
                    'TokenCode' => $token,
                    'ApplicationCode' => 'WTV',
                ],
                'query' => [
                    'param' => base64_encode($data_json)
                ]
            ]);
            return json_decode($response->getBody(), true);
        } catch (GuzzleException $exception) {
            return [];
        }
    }

}
