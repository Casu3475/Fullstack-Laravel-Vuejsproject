<?php

namespace Database\Seeders;


use App\Models\Comment;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comment::factory()
            ->count(5)
            ->hasResponses(3)
            ->hasLikes(2)
            ->hasReports(1)
            ->create();

            Comment::factory()
            ->count(5)
            ->hasResponses(5)
            ->hasLikes(10)
            ->hasReports(2)
            ->create();

            Comment::factory()
            ->count(5)
            ->hasResponses(6)
            ->hasLikes(12)
            ->hasReports(3)
            ->create();

            Comment::factory()
            ->count(5)
            ->hasResponses(2)
            ->hasLikes(1)
            ->hasReports(2)
            ->create();
    }
}
