<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value',
    ];

    public function getValueImageAttribute() { 
        return $this->value; 
    }
    public function setValueImageAttribute($val) { 
        if ($val !== null) $this->attributes['value'] = $val; 
    }

    public function getValueDateAttribute() { 
        return $this->value; 
    }
    public function setValueDateAttribute($val) { 
        if ($val !== null) $this->attributes['value'] = $val; 
    }

    public function getValueTextAttribute() { 
        return $this->value; 
    }
    public function setValueTextAttribute($val) { 
        if ($val !== null) $this->attributes['value'] = $val; 
    }
}