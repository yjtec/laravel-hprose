<?php

namespace Yjtec\LaravelHprose;

use stdClass;
use swoole_server;

class HproseSwooleSocketServer extends \Hprose\Swoole\Socket\Service
{
    protected $server;
    protected $settings = [];
    protected $ons      = [];
    protected $uris     = [];
    protected $mode     = SWOOLE_BASE;
    /**
     * 初始化
     *
     * @param string|null $uri
     */
    public function __construct($uri = null, $mode = SWOOLE_BASE)
    {
        parent::__construct();
        $this->uris[] = $uri;
        $this->mode   = $mode;
    }

    public function start()
    {
        $url          = $this->parseUrl(array_shift($this->uris));
        $this->server = new swoole_server($url->host, $url->port);
        foreach ($this->uris as $uri) {
            $url = $this->parseUrl($uri);
            $this->server->addListener($url->host, $url->port);
        }
        if (is_array($this->settings) && !empty($this->settings)) {
            $this->server->set($this->settings);
        }
        foreach ($this->ons as $on => $callback) {
            $this->server->on($on, $callback);
        }
        $this->socketHandle($this->server);
        $this->server->start();
    }
    public function set($settings)
    {
        $this->settings = array_replace($this->settings, $settings);
    }
    public function on($name, $callback)
    {
        $this->ons[$name] = $callback;
    }
    public function addListener($uri)
    {
        $this->uris[] = $uri;
    }
    public function listen($host, $port, $type)
    {
        return $this->server->listen($host, $port, $type);
    }
    private function parseUrl($uri)
    {
        $result = new stdClass();
        $p      = parse_url($uri);
        if ($p) {
            switch (strtolower($p['scheme'])) {
                case 'tcp':
                case 'tcp4':
                    $result->type = SWOOLE_SOCK_TCP;
                    $result->host = $p['host'];
                    $result->port = $p['port'];
                    break;
                case 'tcp6':
                    $result->type = SWOOLE_SOCK_TCP6;
                    $result->host = $p['host'];
                    $result->port = $p['port'];
                    break;
                default:
                    throw new Exception("Can't support this scheme: {$p['scheme']}");
            }
        } else {
            throw new Exception("Can't parse this uri: " . $uri);
        }
        return $result;
    }
}
