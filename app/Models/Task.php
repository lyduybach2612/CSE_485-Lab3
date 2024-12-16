<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['title', 'description', 'long_description', 'completed'];
    public function definition(){
        return [
            'title' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'long_description' => fake()->text(),
            'completed' => fake()->boolean(),
        ];

    }
}
