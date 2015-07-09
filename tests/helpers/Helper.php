<?php

class Helper {

    public static function getRandom($model, $attr = 'id') {
        $namespace = '\\App\\Models\\'.$model;
        if ($attr == 'all') {
            return self::getRandomModel(new $namespace());
        }
        return self::getRandomModel(new $namespace())[$attr];
    }

    private static function getRandomModel(\Eloquent $model) {
        $entities = $model::all()->toArray();
        if (empty($entities)) {
            throw new \Exception("Model doesn't contain data");
        }
        return $entities[array_rand($entities)];
    }
}