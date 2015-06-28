<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Vital extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['card_id', 'temp', 'bp', 'remark'];

    /**
     * Gets the card associated with the vital record.
     *
     * @return \App\Card
     */
    public function card() {
        return $this->belongsToOne('App\Card');
    }

}
