# KisaWhois
한국인터넷진흥원 KISA-WHOIS-OPEN-API : PHP-Client

# Usage
```php
$json = KisaWhoisApi::lookup('202.30.50.51'); // IP (default)

$json = KisaWhoisApi::lookup('sir.kr', 'domain');

$json = KisaWhoisApi::lookup('AS9455', 'asn');

$json = KisaWhoisApi::lookup('211.220.157.121', 'country');
```
