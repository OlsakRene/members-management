<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Member;

class MemberSeeder extends Seeder
{
    /**
     * Seed the Members DB.
     */
    public function run()
    {
        Member::factory()->count(10)->create();
    }
}