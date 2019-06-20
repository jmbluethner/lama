<?php
	require __DIR__ . '../../../scq/SourceQuery/bootstrap.php';

	use xPaw\SourceQuery\SourceQuery;

	// For the sake of this example
	Header( 'Content-Type: text/plain' );
	Header( 'X-Content-Type-Options: nosniff' );

	// Edit this ->
	define( 'SQ_SERVER_ADDR', $_GET['serverip'] );
	define( 'SQ_SERVER_PORT', $_GET['serverport'] );
	define( 'SQ_TIMEOUT',     1 );
	define( 'SQ_ENGINE',      SourceQuery::SOURCE );
	// Edit this <-

	$Query = new SourceQuery( );

	try
	{
		$Query->Connect( SQ_SERVER_ADDR, SQ_SERVER_PORT, SQ_TIMEOUT, SQ_ENGINE );

		$Query->SetRconPassword( $_GET['serverrcon'] );

		var_dump( $Query->Rcon( $_GET['servercommand'] ) );
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
