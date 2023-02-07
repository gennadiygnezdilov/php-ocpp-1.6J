<?
//Forgive me my friend, but I can't make part of this file publicly available. 
//This is a part of my life on which I spent a lot of time. 
//If you want to get the source file or my advice, write to me in direct https://www.instagram.com/gennadiy.gnezdilov/

namespace MyApp;

include('config/define.php');

class Init
{
  private $db;
  private $idTag;
  private $name;
  private $connectorIdS = 0;
  private $type;
  private $user_id = 1;

  function __construct()
	{
      $this->db = new MySQL(DB_HOST, DB_PORT, DB_USER, DB_PASS, DB_NAME);
	}

  //Check if there are permissions for the charging station to connect to our server
  public function SelectConected($idTag)
	{
  }
  //Check if there are permissions for the charging station to connect to our server

  //Ping the my_set_command database and if there is a command, send the command to the charging station, then delete the command and the database
  public function SetCommand($idTag)
	{
  }
  //Ping the my_set_command database and if there is a command, send the command to the charging station, then delete the command and the database

  //We write to the temporary base which connector was launched
  public function UpConnectorCommand($idTag, $connector_id = 0)
	{
  }
  //We write to the temporary base which connector was launched

  //Write to the temporary base who launched the command
  public function UpUserCommand($idTag, $user_id = 0)
	{
  }
  //Write to the temporary base who launched the command

  //Get the user id who last ran the command on the current station
  public function UserID($idTag)
	{
  }
  //Get the user id who last ran the command on the current station

  //Get the connector id who last ran the command on the current station
  public function ConnectorSID($idTag)
	{
  }
  //Get the connector id who last ran the command on the current station

  //Write to the database, the history of commands sent manually
  public function up_command($data, $idTag)
	{
  }
  //Write to the database, the history of commands sent manually

  //We receive some data from the station and process it through the switch - we answer
  public function Status($data, $idTag = '')
	{
  }
  //We receive some data from the station and process it through the switch - we answer

  public function StartTransactionStatus($idTag, $data)
	{
  }

  public function AuthorizeStatus($idTag, $data)
	{
  }

  //Write the firmware version
  public function SetBootNotification($data)
	{
  }
  //Write the firmware version

  //Record the heartbeat time in the Heartbeat method
  public function SetHeartbeat($idTag, $data)
	{
  }
  //Record the heartbeat time in the Heartbeat method

  //Write the status of the stations in the StatusNotification method
  public function SetStatus($data)
	{
  }
  //Write the status of the stations in the StatusNotification method

  //Write a fake 0, MeterValues
  public function SetFalseMeterValues($idTag, $user_id, $rand)
  {
  }

  ///Updating connector information
  public function connectorId($data)
  {
  }
  //Updating connector information

  //Get the user id who started the transaction
  public function UserTransactionId($transaction = 0)
  {
  }
  //Get the user id who started the transaction

  //Determinations through which algorithm to write off money
  public function MeterStartZero($idTag, $transactionId)
  {
  }
  //Determinations through which algorithm to write off money

  //Write data from counters
  public function MeterValues($idTag, $data)
  {
  }
  //Write data from counters

  public function NotStandardAlgorithm($data, $idTag, $zero)
  {
  }

  public function StandardAlgorithm($data, $idTag)
  {
  }

  //Ticketing
  public function SetMoney($parent_id)
	{
  }

  // Special price for some users
  public function SpecialMoney($idTag, $connectorId, $user_id)
	{
  }
  // Special price for some users

  //What type is this number
  public function SetType($type)
	{
  }
  //What type is this number

  //Search for the Energy.Active.Import.Register value in the array
  public function searchForId($id, $array)
	{
  }
  
}
