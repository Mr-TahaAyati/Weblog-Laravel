<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        for ($i = 0; $i < 100; $i++) {
            DB::table('categories')->insert([
                'name' => 'تست' . '' . $i,
                'description' => 'این تست است' . ' ' . $i,
                'cat_id' => 1,
                'created_at' => Carbon::now()

            ]);
        }
    }
}
