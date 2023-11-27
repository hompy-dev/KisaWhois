<?php

/**
 * 한국인터넷진흥원 KISA-WHOIS-OPEN-API : PHP-Client
 * https://www.data.go.kr/data/15094277/openapi.do
 * https://github.com/hompy-dev/KisaWhois
 * @license https://github.com/hompy-dev/KisaWhois/blob/main/LICENSE (MIT License)
 * @author <contact@hompy.dev>
 */

declare(strict_types=1);

class KisaWhois
{
    // 인증키
    private const SERVICE_KEY = '';

    // 서비스 URL
    private const SERVICE_URL = 'https://apis.data.go.kr/B551505/whois';

    // 응답형식 (json|xml)
    protected static string $answer = 'json';

    // 요청주소
    private static array $endPoint = [
        'domain'  => KisaWhois::SERVICE_URL . '/domain_name',
        'ip'      => KisaWhois::SERVICE_URL . '/ip_address',
        'asn'     => KisaWhois::SERVICE_URL . '/as_number',
        'country' => KisaWhois::SERVICE_URL . '/ipas_country_code'
    ];

    public function __construct()
    {

    }

    public static function lookup(string $query, string $mode = 'ip')
    {
        $params = [
            'serviceKey' => KisaWhois::SERVICE_KEY,
            'query' => $query,
            'answer' => self::$answer
        ];
        $url = self::$endPoint[$mode] . '?' . http_build_query($params);
        return self::request($url);
    }

    protected static function request($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }
}
