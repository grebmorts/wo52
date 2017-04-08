<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;



class Post extends Model
{
  protected $fillable = ['id', 'title', 'body'];

  public function comments()
  {

    return $this->hasMany(Comment::class);

  }

  public function user()
  {

    return $this->belongsTo(User::class);

  }

  public function addComment($body)
  {

    //$this->comments()->create($comment);

  }

  public function scopeFilter($query, $filters)
  {

    if ($month = $filters['month']) {
      $query->whereMonth('created_at', Carbon::parse($month)->month);
    }

    if ($year = $filters['year']) {
      $query->whereYear('created_at', Carbon::parse($year)->year);
    }
  }

  public static function archives()
  {

    return static::selectRaw('year(created_at) year, monthname(created_at) month,
    count(*) published')
    ->groupBy('month')
    ->orderByRaw('min(created_at) desc')
    ->get()
    ->toArray();

  }

  public function tags()
  {

    return $this->belongsToMany(Tag::class);

  }
}
