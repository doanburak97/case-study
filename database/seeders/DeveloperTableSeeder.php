<?php

namespace Database\Seeders;

use App\Models\Developers;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeveloperTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'developer' => 'DEV1',
                'sure' => 1,
                'zorluk' => 1,
            ],
            [
                'developer' => 'DEV2',
                'sure' => 1,
                'zorluk' => 2,
            ],
            [
                'developer' => 'DEV3',
                'sure' => 1,
                'zorluk' => 3,
            ],
            [
                'developer' => 'DEV4',
                'sure' => 1,
                'zorluk' => 4,
            ],
            [
                'developer' => 'DEV5',
                'sure' => 1,
                'zorluk' => 5,
            ],
        ];

        foreach ($data as $item) {
            $existingRecord = Developers::where('developer', $item['developer'])->first();

            if ($existingRecord) {
                $existingRecord->update([
                    'sure' => $item['sure'],
                    'zorluk' => $item['zorluk'],
                ]);
            } else {
                Developers::create($item);
            }
        }
    }
}
