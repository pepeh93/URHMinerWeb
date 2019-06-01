<?php

namespace App\Console\Commands;

use App\Pool;
use Illuminate\Console\Command;

class CheckedPools extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'checked:pools';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check pools';

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
        $pools = Pool::all();

        foreach ($pools as $pool) {
            exec("ping -c 1 $pool->host", $output, $retval);
            if ($retval != 0) {
                $pool->is_alive = false;
            } else {
                $pool->is_alive = true;
            }
            $pool->last_checked_at = now();
            $pool->save();
        }
    }
}
