<?php

namespace App\Transformers;

use League\Fractal\Serializer\ArraySerializer;

class ArrayWithoutDataAndReturnNullSerializer extends ArraySerializer
{
    public function collection($resourceKey, array $data)
    {
        if ($resourceKey) {
            return [$resourceKey => $data];
        }

        return count($data) ? $data : null;
    }

    public function item($resourceKey, array $data)
    {
        if ($resourceKey) {
            return [$resourceKey => $data];
        }

        return $data;
    }

    public function null()
    {
        return null;
    }
}
