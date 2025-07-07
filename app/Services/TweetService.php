<?php

namespace App\Services;

use App\Models\Tweet;
use App\Models\Type;

class TweetService
{
    public function getTypes(): array
    {
        return Type::all()->pluck('label', 'key')->toArray();
    }

    public function getTweetCountsByType(): array
    {
        $types = $this->getTypes();

        $counts = [];
        foreach ($types as $key => $label) {
            $counts[$key] = Tweet::where('type', $key)->count();
        }

        return $counts;
    }
}
