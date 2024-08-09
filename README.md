# php-ocpp-1.6J
A demo php script for the WebSocket WS/WSS server with the OCPP 1.6J protocol for charging electric vehicles, supports php versions 8.0 - 8.3.

1. Install the WebSocket Ratchet php library on your server (http://socketo.me/docs/install)
2. For OCPP 1.6J to work correctly, you need to change the standard headers of the ratchet library
**/vendor/ratchet/rfc6455/src/Handshake/ServerNegotiator.php**. The contents of the "handshake" function change to
```
public function handshake(RequestInterface $request)
{
    $headers = [];
    $secWebSocketKeyHeaders = $request->getHeader('Sec-WebSocket-Key');
    $secWebSocketKey = !empty($secWebSocketKeyHeaders) ? (string)$secWebSocketKeyHeaders[0] : '';
    $userAgent = $request->getHeader('User-Agent')[0] ?? 'Unknown';
    $protocol = $request->getHeader('Sec-WebSocket-Protocol')[0] ?? 'None';
    $host = $request->getHeader('Host')[0] ?? 'Unknown';
    error_log("New WebSocket connection:");
    error_log("User-Agent: $userAgent");
    error_log("WebSocket Protocol: $protocol");
    error_log("Host: $host".PHP_EOL);
    $response = new Response(101, array_merge($headers, [ 'Upgrade' => 'websocket', 'Connection' => 'Upgrade', 'Sec-WebSocket-Version' => '13', 'Sec-WebSocket-Protocol' => 'ocpp1.6', 'Sec-WebSocket-Accept' => $this->sign($secWebSocketKey) ]));
    return $response;
 }

```
3. Use my files that I uploaded to the repository
```
/startWS.php or /startWSS.php is responsible for starting the WS/WSS server
/src/Desc.php main methods for running the WS/WSS server
/src/Init.php main methods for running OCPP 1.6J
/src/config/define.php connecting to the Mysql database
/src/MySQL.php file for running the database
```
----------
[php-ocpp-1.6J](https://github.com/gennadiygnezdilov/php-ocpp-1.6J) - My PHP code controls hundreds of charging stations around the world on a commercial basis since 2020 (Turkey, India, Norway, Kazakhstan, Brazil, South Africa, Russia). The PHP script successfully works with charging stations from manufacturers Schneider, ABB, Siemens, Wallbox, Teltonika, Grasen, Beny and many others. If you have questions or need help with the implementation of the OCPP server, write to me on Instagram:[Gennady Gnezdilov](https://www.instagram.com/gennadiy.gnezdilov/). I am always ready to help. And it is also possible to use this extension for Laravel.