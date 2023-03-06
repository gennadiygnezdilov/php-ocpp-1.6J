<?

use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use MyApp\Desc;
use MyApp\MySQL;
use MyApp\Init;

require 'vendor/autoload.php';

//Initializing the WebSocket Server
$socket = new Desc();
$server = IoServer::factory(new HttpServer(new WsServer($socket)), 2346);
//Initializing the WebSocket Server

//When the WebSocket Server connection is active, start a timer to check and send commands to the stations
$server->loop->addPeriodicTimer(5, function () use ($socket)
{
  foreach($socket->clients as $client)
  {
    $init = new Init();
    $send = $init->SetCommand($socket->ReturnidTag($client)); //Checking if the commands are from the user
    if($send)
    {
        if ($send['idTag'] === $socket->ReturnidTag($client))
        {
          $init->UpUserCommand($socket->ReturnidTag($client), $send['user_id']); //If the command exists, write down the user id
          echo 'CS - user_id - '.$send['user_id'].' - '.$socket->ReturnidTag($client).' '.date('H:i:s').' '.$send['text'].PHP_EOL.PHP_EOL; //We write the log
          $client->send($send['text']); //We send a command to the required charging station
          $init->up_command($send['text'], $socket->ReturnidTag($client)); //Writing a log to the SQL database
        }
    }
  }
});
//When the WebSocket Server connection is active, start a timer to check and send commands to the stations

//Start WebSocket Server
$server->run();
//Start WebSocket Server
