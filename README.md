# KisaWhois
한국인터넷진흥원 KISA-WHOIS-OPEN-API : PHP-Client

# Usage
```php
$json = KisaWhois::lookup('202.30.50.51'); // IP (default)

$json = KisaWhois::lookup('sir.kr', 'domain');

$json = KisaWhois::lookup('AS9455', 'asn');

$json = KisaWhois::lookup('211.220.157.121', 'country');
```
