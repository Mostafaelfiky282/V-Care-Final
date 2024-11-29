<?php

use App\Http\Controllers\Api\v1\MajorController;

Route::get('api/v1/majors',[MajorController::class,'index']);