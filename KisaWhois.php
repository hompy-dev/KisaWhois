<?php

/**
 * 한국인터넷진흥원 KISA-WHOIS-OPEN-API : PHP-Client
 * https://www.data.go.kr/data/15094277/openapi.do
 * https://github.com/hompy-dev/KisaWhois
 * @license https://github.com/hompy-dev/KisaWhois/blob/main/LICENSE (MIT License)
 * @author <contact@hompy.dev>
 */

declare(strict_types=1);

namespace HompyDev\OpenApi;

class KisaWhois
{
    // 인증키
    private const SERVICE_KEY = ''; // 유효한 인증키로 변경

    // 서비스 URL
    private const SERVICE_URL = 'https://apis.data.go.kr/B551505/whois';

    // 응답형식 (json|xml)
    private const ANSWER = 'json';

    // 요청주소
    private const ENDPOINTS = [
        'domain'  => self::SERVICE_URL . '/domain_name',
        'ip'      => self::SERVICE_URL . '/ip_address',
        'asn'     => self::SERVICE_URL . '/as_number',
        'country' => self::SERVICE_URL . '/ipas_country_code'
    ];

    public function lookup(string $query, string $mode = 'ip')
    {
        $params = [
            'serviceKey' => self::SERVICE_KEY,
            'query' => $query,
            'answer' => self::ANSWER
        ];
        $url = self::ENDPOINTS[$mode] . '?' . http_build_query($params);
        return $this->request($url);
    }

    protected function request($url)
    {
        try {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HEADER, false);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
            $response = curl_exec($ch);

            if ($response === false) {
                throw new \Exception('cURL request failed: ' . curl_error($ch));
            }
            curl_close($ch);
            return $response;
        }
        catch (\Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}
