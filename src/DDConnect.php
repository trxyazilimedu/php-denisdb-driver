<?php
namespace Trxyazilim\Denisdb;
class DDConnect
{
    private $socket;
    private $host;
    private $port;
    private $debug;

    public function __construct($host = '127.0.0.1', $port = 5142,$debug = false)
    {
        $this->host = $host;
        $this->port = $port;
        $this->debug = $debug;

        $this->connect();
    }

    private function connect()
    {
        $address = "tcp://{$this->host}:{$this->port}";
        $this->socket = @stream_socket_client($address, $errno, $errstr, 5);

        if (!$this->socket) {
            throw new \Exception("Could not connect to DenisDB: [$errno] $errstr");
        }

        echo "Connected to DenisDB on {$this->host}:{$this->port}\n";
    }

    public function sendCommand($command)
    {
        if (!$this->socket) {
            throw new \Exception("No connection to DenisDB.");
        }

        // Komut gönderme
        $writeResult = fwrite($this->socket, $command . "\n");
        if ($writeResult === false) {
            throw new \Exception("Error writing command to DenisDB.");
        }

        // Yanıt alma
        $response = fgets($this->socket, 1024);

        // Yanıtı debug etmek için yazdıralım
        if ($response === false) {
            throw new \Exception("Error reading response from DenisDB.");
        } else {
            if($this->debug){
                echo "Response from DenisDB: " . $response . "\n"; // Yanıtı gör
            }

        }

        return trim($response);
    }


    public function close()
    {
        if ($this->socket) {
            fclose($this->socket);
            $this->socket = null;
            if($this->debug){
                echo "Connection to DenisDB closed.\n";
            }

        }
    }

    public function __destruct()
    {
        $this->close();
    }
}
