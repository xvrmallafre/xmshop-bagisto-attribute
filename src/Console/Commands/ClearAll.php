<?php

namespace XMShop\Attribute\Console\Commands;


use Illuminate\Console\Command;

class ClearAll extends Command
{
    protected $signature = 'xmshop:clearall';

    public function handle(): void
    {
        $this->call('clear-compiled');
        $this->call('cache:clear');
        $this->call('route:clear');
        $this->call('view:clear');
        $this->call('responsecache:clear');
        $this->call('event:clear');
        $this->call('debugbar:clear');
        $this->call('config:clear');
        $this->call('optimize:clear');
    }
}