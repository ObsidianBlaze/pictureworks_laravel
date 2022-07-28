<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class AppendComment extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:comment {id} {comment}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Appends a comment to a previous user comment';

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
     * @return int
     */
    public function handle()
    {
        $user = User::find($this->argument('id'));
        if ($user) {

            //updating the user comment using implode to separate with white space
            $user->comment = implode(" ", [$user->comment, $this->argument('comment')]);

            $user->save();

            $this->info($user);

        } else {
            $this->error('User not found');
            return 1;
        }
        return 0;
    }
}
