<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;


class Fakultas extends Model
{
	use Sortable;

    protected $table = 'fakultas';
    protected $fillable = ['nama_fakultas'];
    public $sortable = ['id','nama_fakultas'];
}
