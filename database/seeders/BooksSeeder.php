<?php

namespace Database\Seeders;
 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Carbon\Carbon;


class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

    for($i = 0; $i<=10; $i++){
     DB::table('books')->insert(
            [
                'name' => Str::random(10),
                'author' => Str::random(10),
                'isbn' => $this->randomNumber(13),
                'publish_date' => Carbon::parse(now()->format('Y-m-d')),
                'created_at' => Carbon::parse(now()->format('Y-m-d H:i:s')),
                'updated_at' => Carbon::parse(now()->format('Y-m-d H:i:s')),

            ]
        );
    }

    }
protected function randomNumber($length){
    $result = '';
    for($i=0; $i<$length;$i++){
        $result .= mt_rand(0,9);
    }
    return $result;
}   
}
