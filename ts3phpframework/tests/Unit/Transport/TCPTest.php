<?php

namespace Tests\Unit\Transport;

use \PHPUnit\Framework\TestCase;
use \PHPUnit\Framework\Constraint\IsType as PHPUnit_IsType;

require_once 'libraries/TeamSpeak3/Transport/TCP.php';

class TCPTest extends TestCase
{
  
  public function testConstructorNoException() {
    $adapter = new \TeamSpeak3_Transport_TCP(
      ['host' => 'test', 'port' => 12345]
    );
    $this->assertInstanceOf(\TeamSpeak3_Transport_TCP::class, $adapter);
    
    $this->assertArrayHasKey('host', $adapter->getConfig());
    $this->assertEquals('test', $adapter->getConfig('host'));
    
    $this->assertArrayHasKey('port', $adapter->getConfig());
    $this->assertEquals(12345, $adapter->getConfig('port'));
    
    $this->assertArrayHasKey('timeout', $adapter->getConfig());
    $this->assertInternalType(
      PHPUnit_IsType::TYPE_INT,
      $adapter->getConfig('timeout')
    );
    
    $this->assertArrayHasKey('blocking', $adapter->getConfig());
    $this->assertInternalType(
      PHPUnit_IsType::TYPE_INT,
      $adapter->getConfig('blocking')
    );
  }
  
  public function testConstructorExceptionNoHost() {
    $this->expectException(\TeamSpeak3_Transport_Exception::class);
    $this->expectExceptionMessage("config must have a key for 'host'");
    
    $adapter = new \TeamSpeak3_Transport_TCP(['port' => 12345]);
  }
  
  public function testConstructorExceptionNoPort() {
    $this->expectException(\TeamSpeak3_Transport_Exception::class);
    $this->expectExceptionMessage("config must have a key for 'port'");
    
    $adapter = new \TeamSpeak3_Transport_TCP(['host' => 'test']);
  }
  
  public function testGetConfig() {
    $adapter = new \TeamSpeak3_Transport_TCP(
      ['host' => 'test', 'port' => 12345]
    );
    
    $this->assertInternalType(
      PHPUnit_IsType::TYPE_ARRAY,
      $adapter->getConfig()
    );
    $this->assertCount(4, $adapter->getConfig());
    $this->assertArrayHasKey('host', $adapter->getConfig());
    $this->assertEquals('test', $adapter->getConfig()['host']);
    $this->assertEquals('test', $adapter->getConfig('host'));
  }
  
  public function testSetGetAdapter() {
    $transport = new \TeamSpeak3_Transport_TCP(
      ['host' => 'test', 'port' => 12345]
    );
    // Mocking adaptor since `stream_socket_client()` depends on running server
    $adaptor = $this->createMock(\TeamSpeak3_Adapter_ServerQuery::class);
    $transport->setAdapter($adaptor);
    
    $this->assertSame($adaptor, $transport->getAdapter());
  }
  
  public function testGetStream() {
    $transport = new \TeamSpeak3_Transport_TCP(
      ['host' => 'test', 'port' => 12345]
    );
    $this->assertNull($transport->getStream());
  }
  
  public function testConnectBadHost() {
    $transport = new \TeamSpeak3_Transport_TCP(
      ['host' => 'test', 'port' => 12345]
    );
    $this->expectException(\TeamSpeak3_Transport_Exception::class);
    $this->expectExceptionMessage('getaddrinfo failed');
    $transport->connect();
  }
  
  public function testConnectHostRefuseConnection() {
    $transport = new \TeamSpeak3_Transport_TCP(
      ['host' => '127.0.0.1', 'port' => 12345]
    );
    $this->expectException(\TeamSpeak3_Transport_Exception::class);
    $this->expectExceptionMessage('Connection refused');
    $transport->connect();
  }
  
  public function testDisconnectNoConnection() {
    $transport = new \TeamSpeak3_Transport_TCP(
      ['host' => 'test', 'port' => 12345]
    );
    $this->assertNull($transport->disconnect());
  }
  
  public function testReadNoConnection() {
    $transport = new \TeamSpeak3_Transport_TCP(
      ['host' => 'test', 'port' => 12345]
    );
    $this->expectException(\TeamSpeak3_Transport_Exception::class);
    $this->expectExceptionMessage('getaddrinfo failed');
    $transport->read();
  }
  
  public function testReadLineNoConnection() {
    $transport = new \TeamSpeak3_Transport_TCP(
      ['host' => 'test', 'port' => 12345]
    );
    $this->expectException(\TeamSpeak3_Transport_Exception::class);
    $this->expectExceptionMessage('getaddrinfo failed');
    $transport->readLine();
  }
  
  public function testSendNoConnection() {
    $transport = new \TeamSpeak3_Transport_TCP(
      ['host' => 'test', 'port' => 12345]
    );
    $this->expectException(\TeamSpeak3_Transport_Exception::class);
    $this->expectExceptionMessage('getaddrinfo failed');
    $transport->send('testsend');
  }
  
  public function testSendLineNoConnection() {
    $transport = new \TeamSpeak3_Transport_TCP(
      ['host' => 'test', 'port' => 12345]
    );
    $this->expectException(\TeamSpeak3_Transport_Exception::class);
    $this->expectExceptionMessage('getaddrinfo failed');
    $transport->sendLine('test.sendLine');
  }
}