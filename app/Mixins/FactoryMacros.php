<?php

namespace App\Mixins;

/**
 * Mixin class for Laravel's Model Factory.
 *
 * @template TModel of \Illuminate\Database\Eloquent\Model
 * @mixin \Illuminate\Database\Eloquent\Factories\Factory<TModel>
 * @property TModel $model
 */
class FactoryMacros
{
    /**
     * Get the first record matching the attributes and update it or create it.
     * @return \Closure(array<string, mixed>, array<mixed>):TModel
     */
    public function updateOrCreate(): \Closure
    {
        return function (array $attributes = [], array $values = []) {
            if (!is_null($instance = $this->model::where($attributes)->first())) {
                $instance->update($values);

                return $instance;
            }

            return $this->create(array_merge($attributes, $values));
        };
    }
}
