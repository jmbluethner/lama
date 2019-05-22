<?php
	require __DIR__ . '/SourceQuery/bootstrap.php';

	use xPaw\SourceQuery\SourceQuery;

	session_start();

	// Edit this ->
	define( 'SQ_SERVER_ADDR', $_SESSION['ip'] );
	define( 'SQ_SERVER_PORT', $_SESSION['port'] );
	define( 'SQ_TIMEOUT',     1 );
	define( 'SQ_ENGINE',      SourceQuery::SOURCE );
	// Edit this <-

	$Query = new SourceQuery( );

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
?>
