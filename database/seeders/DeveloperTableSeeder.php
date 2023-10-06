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
                'haftalik_calisma_saatleri' => 0,
                'haftalik_is_yuku' => 45,
            ],
            [
                'developer' => 'DEV2',
                'sure' => 1,
                'zorluk' => 2,
                'haftalik_calisma_saatleri' => 0,
                'haftalik_is_yuku' => 90,
            ],
            [
                'developer' => 'DEV3',
                'sure' => 1,
                'zorluk' => 3,
                'haftalik_calisma_saatleri' => 0,
                'haftalik_is_yuku' => 135,
            ],
            [
                'developer' => 'DEV4',
                'sure' => 1,
                'zorluk' => 4,
                'haftalik_calisma_saatleri' => 0,
                'haftalik_is_yuku' => 180,
            ],
            [
                'developer' => 'DEV5',
                'sure' => 1,
                'zorluk' => 5,
                'haftalik_calisma_saatleri' => 0,
                'haftalik_is_yuku' => 225,
            ],
        ];

        foreach ($data as $item) {
            $existingRecord = Developers::where('developer', $item['developer'])->first();

            if ($existingRecord) {
                $existingRecord->update([
                    'sure' => $item['sure'],
                    'zorluk' => $item['zorluk'],
                    'haftalik_calisma_saatleri' => $item['haftalik_calisma_saatleri'],
                    'haftalik_is_yuku' => $item['haftalik_is_yuku']
                ]);
            } else {
                Developers::create($item);
            }
        }
    }
}
