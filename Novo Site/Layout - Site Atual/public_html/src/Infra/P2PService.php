<?php

namespace App\Infra;

class P2PService
{
    private $socket;

    public static function userCount(): int
    {
        $userCount = 0;
        $p2p = new P2PService();

        foreach (PORTS as $port) {
            $p2p->connect($port);
            $p2p->send('USER_COUNT');
            $response = $p2p->response();

            $result = explode(' ', filter_var($response, FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH));

            $userCount += isset($result[1]) ? (int) $result[1] : 0;
        }

        return $userCount;
    }

    private function connect(int $port): mixed
    {
        return $this->socket = fsockopen(ADMINPAGE_IP, $port, $errno, $errstr, 5);
    }

    private function send(string $query): void
    {
        if ($this->socket === true) {
            fwrite($this->socket, "\x40{$query}\x0A");
        }
    }

    private function response(): string
    {
        if ($this->socket === false) {
            return '';
        }

        return fread($this->socket, 128);
    }

    public function __destruct()
    {
        if ($this->socket === true) {
            fclose($this->socket);
        }
    }
}

