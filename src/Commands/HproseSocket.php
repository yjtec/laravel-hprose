<?php
namespace Yjtec\LaravelHprose\Commands;

class HproseSocket extends Base
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hprose:server';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'socket 服务';
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->outputInfo('tcp');
        $server = app('hprose.socket_server');
        //var_dump($server);
        $server->start();
    }    
}
