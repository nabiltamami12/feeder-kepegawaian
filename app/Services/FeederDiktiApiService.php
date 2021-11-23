<?php

namespace App\Services;

use GuzzleHttp\Client;

class FeederDiktiApiService {
    // url Feeder Dikti
    private $url;
    // Username Feeder Dikti
    private $username;
    // Password
    private $password;
    //data
    private $act;

    function __construct($act) {
        $this->url = env('feeder_url');
        $this->username = env('feeder_username');
        $this->password = env('feeder_password');
        $this->act = $act;
    }

   function getToken()
    {


        $client = new Client();
        $params = [
            "act" => "GetToken",
            "username" => $this->username,
            "password" => $this->password
        ];
        


        $req = $client->post( $this->url, [
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ],
            'body' => json_encode($params)
        ]);

        $response = $req->getBody();
        $result = json_decode($response,true);

        return $result;

    }
    public function runWS()
    {
        set_time_limit(5000);

        $client = new Client();
        $params = [
            "act" => "GetToken",
            "username" => $this->username,
            "password" => $this->password
        ];

        $req = $client->post( $this->url, [
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ],
            'body' => json_encode($params)
        ]);

        $response = $req->getBody();
        $result = json_decode($response,true);

        if($result['error_code'] == 0) {
            $token = $result['data']['token'];

            $params = [
                "token" => $token,
                "act" => $this->act,
            ];
            
            $req = $client->request('POST', $this->url, ['verify' => false, 
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                ],
                'body' => json_encode($params)
            ]);
            
            $response = $req->getBody();
            $result = json_decode($response,true);
        }
   // $params = [
   //          "token" => $token->token,
   //          "act" =>  $this->act,
   //          "username" => $this->username,
   //          "password" => $this->password
   //      ];
   //      $response = $client->request('POST', $this->url, ['verify' => false,
   //         'headers' => [
   //              'Content-Type' => 'application/json',
   //              'Accept' => 'application/json',
   //          ],
   //          'body' => json_encode($params)
   //     ]);
   //      $result = json_decode($response->getBody());
        // dd($result);
        return $result;
    }
}