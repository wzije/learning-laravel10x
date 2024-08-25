<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Log::info("seeder insert data post");
        // $data = [];
        // for ($i = 0; $i < 10; $i++) {
        //     $title = "Lorem ipsum dolor sit amet" . $i;
        //     $data[$i]["title"] = $title;
        //     $data[$i]["slug"] = Str::slug($title);
        //     $data[$i]["body"] = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis non suscipit facilis hic corporis, officiis cumque iusto nulla. Quidem nam eius maiores doloribus nesciunt cum nobis facilis accusamus deserunt laudantium?";
        // }

        // $result = Post::insert($data);

        // if (!$result) {
        //     Log::error("error insert data");
        // }

        // Log::debug("ini log debug");
        // dd($result);

        \App\Models\Post::factory(30)->create();
    }
}
