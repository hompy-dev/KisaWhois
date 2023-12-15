# KisaWhois
한국인터넷진흥원 KISA-WHOIS-OPEN-API : PHP-Client

# Usage
```php
$whois = new HompyDev\OpenApi\KisaWhois();

$json = $whois->lookup('202.30.50.51'); // IP (default)

// $json = $whois->lookup('sir.kr', 'domain');
// $json = $whois->lookup('AS9455', 'asn');
// $json = $whois->lookup('211.220.157.121', 'country');
```
