<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    public function run(): void
    {
        $subjects = [
            ['name' => 'Tilawah', 'slug' => 'tilawah'],
            ['name' => 'Murottal', 'slug' => 'murottal'],
            ['name' => 'Tahsin', 'slug' => 'tahsin'],
            ['name' => 'Tahfidz', 'slug' => 'tahfidz'],
        ];

        foreach ($subjects as $subject) {
            Subject::firstOrCreate(
                ['slug' => $subject['slug']],
                $subject
            );
        }
    }
}
