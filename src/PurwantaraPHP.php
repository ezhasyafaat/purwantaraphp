<?php

namespace Ezha\PurwantaraPHP;

use GuzzleHttp\Client;

class PurwantaraPHP
{
    private const URL_DEVELOPMENT = 'https://api.ppndev.xyz/v1/';
    private const URL_PRODUCTTION = 'https://api.purwantara.id/v1/';

    public function getChannel()
    {
        try {
            $client = new Client();
            $request = $client->request('GET', self::URL_PRODUCTTION.'channel', [
                'headers' => [
                    'Authorization' => 'Bearer '.config('purwantaraphp.purwantara_token'),
                ],
            ]);

            return $request->getBody()->getContents();
        } catch (\Throwable $th) {
            return dd($th->getMessage());
        }
    }

    public function getVirtualAccount($params = [])
    {
        try {
            $client = new Client();
            $request = $client->request('POST', self::URL_PRODUCTTION.'virtual-account', [
                'headers' => [
                    'Authorization' => 'Bearer '.config('purwantaraphp.purwantara_token'),
                ],
                'form-params'    => [
                    'expected_amount'       => $params['amount'],
                    'name'                  => $params['name'],
                    'bank'                  => $params['channel'],
                    'description'           => $params['desc'],
                    'expired_at'            => $params['expired_at'],
                    'external_id'           => $params['unique_id'],
                    'payment_code'          => $params['payment_code'],
                ],
            ]);

            return $request->getBody()->getContents();
        } catch (\Throwable $th) {
            return dd($th->getMessage());
        }
    }
}
