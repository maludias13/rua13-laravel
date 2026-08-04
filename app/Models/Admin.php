<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Admin extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'password', 'cpf', 'photo', 'phone', 'birth_date',
        'cep', 'number', 'street', 'neighborhood', 'city', 'state', 'complement',
        'created_by',
    ];

    protected $hidden = ['password'];

    public function creator(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }

    public function createdAdmins(): HasMany
    {
        return $this->hasMany(Admin::class, 'created_by');
    }
}