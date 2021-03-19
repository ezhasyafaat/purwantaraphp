<?php

namespace Ezha\PurwantaraPHP;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class PurwantaraPHP
{
    private const URL_DEVELOPMENT = 'https://api.ppndev.xyz/v1/';
    private const URL_PRODUCTTION = 'https://api.purwantara.id/v1/';

    public function getChannel()
    {
        try {
            $request = Http::withHeaders([
                'Authorization' => 'Bearer '.config('purwantaraphp.purwantara_token'),
            ])->get(self::URL_PRODUCTTION.'channel');

            return $request->json();
        } catch (\Throwable $th) {
            return dd($th->getMessage());
        }
    }

    public function getVirtualAccount($params = [])  
    {
        try {
            $request = Http::withHeaders([
                'Authorization' => 'Bearer '.config('purwantaraphp.purwantara_token'),
            ])->post(self::URL_PRODUCTTION.'virtual-account', [
                    'expected_amount'       => $params['amount'],
                    'name'                  => $params['name'],
                    'bank'                  => $params['channel'],
                    'description'           => $params['desc'],
                    'expired_at'            => $params['expired_at'],
                    'external_id'           => $params['unique_id'],
                    'payment_code'          => isset($params['payment_code']) ? $params['payment_code'] : null,
            ]);

            return $request->json();
        } catch (\Throwable $th) {
            return dd($th->getMessage());
        }
    }
}
