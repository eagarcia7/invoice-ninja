<?php

class Helper {

    public static function getRandom($model, $attr = 'id', array $where = null) {
        $namespace = '\\App\\Models\\'.$model;

        $entity = self::getRandomModel(new $namespace(), $where);

        if (!$entity) return false;

        return($attr == 'all')? $entity : $entity[$attr];
    }

    private static function getRandomModel($model, array $where = null) {
        $entities = $model::all();

        if ($where) {
            foreach ($where as $key => $value) {
                $entities = $entities->where($key, $value);
            }
        }

        $entities = $entities->toArray();

        return empty($entities) ? false : $entities[array_rand($entities)];
    }
}