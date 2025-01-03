<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MemberTag;


class MemberTagSeeder extends Seeder
{
    /**
     * Seed the MemberTag DB.
     */
    public function run()
    {
        MemberTag::factory()->count(10)->create();
    }
}