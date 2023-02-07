# php-ocpp-1.6J
Ready php script for WS server operation with OCPP 1.6J protocol for charging electric vehicles, tested on php version 7.1 - 8.0

1. Install php library WebSocket Ratchet (http://socketo.me/docs/install) on your server
2. For OCPP 1.6J to work correctly, you need to change the standard headers in the /vendor/ratchet/rfc6455/src/Handshake/ServerNegotiator.php file. The contents of the “handshake” function are changed to
```
public function handshake(RequestInterface $request)
{
   $headers = [];
   $response = new Response(101, array_merge($headers, [
       'Upgrade'              => 'websocket'
       , 'Connection'           => 'Upgrade'
       , 'Sec-WebSocket-Version' => '13'
       , 'Sec-WebSocket-Protocol' => 'ocpp1.6'
       , 'Sec-WebSocket-Accept' => $this->sign((string)$request->getHeader('Sec-WebSocket-Key')[0])
   ]));
   return $response;
}
```
3. Use my files that I uploaded to the repository
