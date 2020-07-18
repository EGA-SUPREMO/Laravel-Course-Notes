<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /**
     * Turn off mass assignment protection
     *
     * @var array
     */
    protected $guarded = [];
    
    public function path()
    {
        return url('/books/'. $this->id);
    }

    public function setAuthorIdAttribute($author)
    {
        $this->attributes['author_id'] = Author::firstOrCreate([
            'name' => $author,
        ])->id;
    }

    public function checkout(User $user)
    {
        $this->reservations()->create([
            'user_id' => $user->id,
            'check_out_at' => now(),
        ]);
    }
    public function checkin(User $user)
    {
        Reservation::where([
            'user_id' => $user->id,
        ])->update([
            'check_in_at' => now(),
        ]);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
