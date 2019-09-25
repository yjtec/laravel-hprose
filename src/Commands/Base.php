<?php
namespace Yjtec\LaravelHprose\Commands;

use Illuminate\Console\Command;

class Base extends Command
{
    public function __construct(){
        parent::__construct();
    }

    protected function outputInfo($scheme='tcp'){
        $this->comment('版本:');
        $this->output->writeln(sprintf(' - laravel=<info>%s</>', app()->version()), $this->parseVerbosity(null));
        $this->output->writeln(sprintf(' - Hprose-php=<info>2.0.0</>'), $this->parseVerbosity(null));
        $this->output->newLine();

        $this->comment('监听:');

        if($scheme == 'tcp'){
            foreach(config('hprose.tcp_uris') as $uri){
                $this->line(sprintf('-<info>%s</>',$uri));
            }
        }elseif($scheme == 'http'){
            $this->line(sprintf('-<info>%s</>',config('hprose.http_uri')));
        }
        $this->comment('可调用远程方法:');
        $methods = app('hprose.router')->getMethods();
        if ($methods) {
            foreach ($methods as $method) {
                $this->line(sprintf(' - <info>%s</>', $method));
            }
            $this->output->newLine();
        } else {
            $this->line(sprintf(' - <info>无可调用方法</>'));
        }
    }
}
