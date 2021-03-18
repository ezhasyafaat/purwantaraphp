<?php

namespace Ezha\PurwantaraPHP;

use GuzzleHttp\Client;

class PurwantaraPHP
{
    public function getChannel()
    {
        try {
            $client     = new Client();
            $request    = $client->request('POST','https://api.purwantara.id/v1/get-channel', [
                'headers' => [
                    'Token' => config('purwantaraphp.purwantara_token'),
                    'content-type' => 'application/json',
                ],
            ]);

            return $request->getBody()->getContents();
        } catch (\Throwable $th) {
            return response()->json([
                'code' => 500,
                'message' => $th->getMessage(),
            ]);
        }
    }

    public function getVirtualAccount($params = [])
    {
        try {
            $client     = new Client();
            $request    = $client->request('POST', 'https://api.purwantara.id/v1/virtual-account', [
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
            dd($th->getMessage());
        }
    }
}