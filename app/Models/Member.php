<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Member extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'first_name', 
        'last_name', 
        'email', 
        'birth_date'
    ];

    /**
     * Accessor for the created_at attribute.
     *
     * @param string $value The raw created_at value from the database.
     * 
     * @return string The formatted created_at date.
     */
    public function getCreatedAtAttribute(string $value): string
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
    public function getUpdatedAtAttribute(string $value): string
    {
        return Carbon::parse($value)->format('Y-m-d H:i:s'); 
    }

    /**
     * Get the tags associated with the member.
     *
     * @return BelongsToMany
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(MemberTag::class, 'member_member_tag');
    }
}
