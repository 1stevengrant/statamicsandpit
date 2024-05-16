<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Statamic\Facades\Entry;

class DummyContent extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:dummy-content';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        for ($i = 0; $i < 10000; $i++) {
            $this->createDummyEntry();
        }
    }

    protected function createDummyEntry(): void
    {
        $entry = Entry::make()
            ->collection('books')
            ->published(true)
            ->slug(Str::random(10))
            ->data([
                'title' => Str::random(10),
                'author' => Str::random(10),
                'description' => Str::random(100),
            ]);

        $entry->save();
    }
}
