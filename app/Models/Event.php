<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'start_time',
        'end_time',
        'location',
        
    ];
    public $timestamps = false;

    public function attendances()
{
    return $this->hasMany(Attendance::class);
}

public function sessions()
{
    return $this->hasMany(Session::class);
}
public function delete()
    {
        // Xác minh và xóa
        parent::delete();
    }

}
