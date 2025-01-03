<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberTag extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = ['name'];

    /**
     * Accessor for the created_at attribute.
     *
     * @param string $value The raw created_at value from the database.
     * 
     * @return string The formatted created_at date.
     */
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d H:i:s'); 
    }

    /**
     * Accessor for the updated_at attribute.
     *
     * @param string $value The raw updated_at value from the database.
     * 
     * @return string The formatted updated_at date.
     */
    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d H:i:s'); 
    }

    /**
     * Define a many-to-many relationship with the Member model.
     *
     * @return BelongsToMany
     */
    public function members()
    {
        return $this->belongsToMany(Member::class, 'member_member_tag');
    }
}
