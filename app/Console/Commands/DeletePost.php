<?php

namespace App\Console\Commands;

use App\Posts;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class DeletePost extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */

    protected $signature = 'DeletePost:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This  cronjob is used to delete post yearly';

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
        $dayToCheck = date('Y-m-d H:s:i');
        $posts = DB::table('posts')->select('id')->where(DB::raw('DATE_ADD(created_at, INTERVAL 1 YEAR)'), '=', $dayToCheck)->get();
            foreach ($posts as $post){
                $model = Posts::find($post->id)->delete();
                return $model;
            }
//        dd($posts,$dayToCheck);
    }
}
