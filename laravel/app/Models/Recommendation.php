<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int|null $user_id
 * @property string|null $name
 * @property string|null $email
 * @property string $note
 * @property string|null $attachment_path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 */
class Recommendation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'note',
        'attachment_path',
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
