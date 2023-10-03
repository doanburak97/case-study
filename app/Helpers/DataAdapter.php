<?php

namespace App\Helpers;

class DataAdapter
{
    /**
     * @param $data
     * @return array
     */
    public function adaptType1Data($data): array
    {
        $adaptedData = [];

        foreach ($data as $item) {
            $adaptedItem = [
                'task_ismi'       => $item['id'],
                'sure'            => $item['sure'],
                'zorluk_derecesi' => $item['zorluk'],
            ];

            $adaptedData[] = $adaptedItem;
        }

        return $adaptedData;
    }

    /**
     * @param $data
     * @return array
     */
    public function adaptType2Data($data): array
    {
        $adaptedData = [];

        foreach ($data as $item) {
            $taskName = key($item);
            $type2Data = $item[$taskName];

            $adaptedItem = [
                'task_ismi'       => $taskName,
                'sure'            => $type2Data['estimated_duration'],
                'zorluk_derecesi' => $type2Data['level'],
            ];

            $adaptedData[] = $adaptedItem;
        }

        return $adaptedData;
    }
}
