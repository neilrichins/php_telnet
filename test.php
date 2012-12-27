#!/usr/bin/php
<?PHP
##################
##  PHP Telnet ###
##################
#Config vars
$my_server	= 'localhost';	// Server we are goint to connect to
$my_user	= 'justme';		// Telnet login user
$my_pass	= '1234';		// Telnet login password
$command	= "show mac address-table \n";	// Command to be executed over telnet session
		
		
		
// error_reporting(0);
require("telnet.php");   //  Make sure we have php_telnet class loaded

$telnet = new Telnet();
$result = $telnet->Connect($my_server,$my_user,$my_pass);

  switch ($result) {
   case 0:
        echo" logged in \n";
        $telnet->DoCommand($command,$rslt);

		echo ">$command \n";
		echo "$rslt \n\n";

		$telnet->Disconnect(); // Disconnect(0); to break the connection without explicitly logging out
        break;
   case 1:
	echo " Telnet Connect failed Unable to open network connection \n";
        break;
   case 2:
        echo " Telnet Connect failed Unknown host \n";
        break;
   case 3:
        echo " Telnet Connect failed at Login \n";
        break;
   case 4:
        echo " PHP version problem with Telnet functions \n";
        break;
 }






