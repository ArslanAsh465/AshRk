<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class PostDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 50; $i++) {
            $user_id = rand(1, 10);
            $title = $this->generateRandomTitle();
            $content = $this->generateRandomContent();

            Post::create([
                'title' => $title,
                'content' => $content,
                'user_id' => $user_id,
            ]);
        }
    }

    private function generateRandomTitle()
    {
        $length = rand(1, 10);
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $title = '';

        for ($i = 0; $i < $length; $i++) {
            $title .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $title;
    }

    private function generateRandomContent()
    {
        $length = rand(20, 300);
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $content = '';

        for ($i = 0; $i < $length; $i++) {
            $content .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $content;
    }
}
