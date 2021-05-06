<?php

namespace App\ModelScholarship;

use Illuminate\Database\Eloquent\Model;
use App\ModelScholarship\ApplicationDetails;

class ApplicationSession extends Model
{
    protected $table = 'applicationSession';
    public $primarykey = 'id';
    public $timestamp = true;

    public function get_applicationDetails()
    {
        return $this->hasMany(ApplicationDetails::class);
    }

    public function get_applicationSchedule()
    {
        return $this->hasMany(ApplicationScheduleTable::class);
    }
}
