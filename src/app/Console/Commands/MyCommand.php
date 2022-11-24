<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:hello';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'テストコマンド';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->comment('This is MyCommand');
        echo 'ここが出力';
        return 0;
    }
}
