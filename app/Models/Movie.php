<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Movie
 *
 * @property int $id
 * @property string $title
 * @property string $year
 * @property int $running_time_min
 * @property string $storyline
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Movie newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Movie newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Movie query()
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereRunningTimeMin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereStoryline($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereYear($value)
 * @mixin \Eloquent
 */
class Movie extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'movies';
    protected $guarded = [];
}
