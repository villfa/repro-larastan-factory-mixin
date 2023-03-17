<?php

namespace App;

use App\Models\User;


echo User::factory()->updateOrCreate([])->name;
