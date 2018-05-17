<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class EcosystemService extends Model
{
    use SoftDeletes;
    protected $guarded = ['id'];
    protected $table = 'lkp_ecosystem_services';
}
