<?php

	require __DIR__ . '/SourceQuery/bootstrap.php';

	use xPaw\SourceQuery\SourceQuery;

	// Edit this ->
	define( 'SQ_SERVER_ADDR', $_GET['ip'] );
	define( 'SQ_SERVER_PORT', $_GET['port'] );
	define( 'SQ_TIMEOUT',     1 );
	define( 'SQ_ENGINE',      SourceQuery::SOURCE );
	// Edit this <-

	$Query = new SourceQuery( );

	$Query->Connect( SQ_SERVER_ADDR, SQ_SERVER_PORT, SQ_TIMEOUT, SQ_ENGINE );

	$queryServerinfo =  $Query->GetInfo( );

	/*
	try
	{
		$Query->Connect( SQ_SERVER_ADDR, SQ_SERVER_PORT, SQ_TIMEOUT, SQ_ENGINE );

		$queryServerinfo =  $Query->GetInfo( );
		//print_r( $Query->GetPlayers( ));
		//print_r( $Query->GetRules( ));

	}
	catch( Exception $e )
	{
		echo $e->getMessage( );
	}
	finally
	{
		$Query->Disconnect( );
	}
	*/

?>
