<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    use HasFactory;
    protected $guarded =[];

    protected $casts = [
        'file' => 'array'
    ];

    public function setFilesAttribute($value)
	{
	    $file = [];

	    foreach ($value as $array_item) {
	        if (!is_null($array_item['key'])) {
	            $file[] = $array_item;
	        }
	    }

	    $this->attributes['file'] = json_encode($file);
	}
}
