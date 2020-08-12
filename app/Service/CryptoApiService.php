<?php
namespace App\Service;

class CryptoApiService
{
    /**
     * @author Ashot Gharakeshishyan
     */
    public function getDataFromApi()
    {
        $endpoint = "https://api.coindesk.com/v1/bpi/historical/close.json";
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $endpoint);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_close($ch);

        $data = json_decode($result, true);
        return $data;
    }

}
