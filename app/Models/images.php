<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class images extends Model
{
    use HasFactory;

    protected $fillable = ['name','url'];
    public $timestamps = false;

    public function up() : void {
        Schema::create('images',function(Blueprint $table){
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('url');

        });

    }
}
