<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Comment;

class DeleteEmptyComments extends Command
{
    protected $signature = 'comments:delete-empty';
    protected $description = 'Delete comments with empty content';

    public function handle(): void
    {
        Comment::whereNull('content')->orWhere('content', '')->delete();
        $this->info('Deleted empty comments.');
    }
}
