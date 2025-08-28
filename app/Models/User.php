<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string> 
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'about',
        'thumbnail',
        'about_description'
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // public function canAccessFilament()
    // {
    //     return false;
    // }

    // public function canAccessPanel(Panel $panel):bool
    // {
    //     return $this->hasRole('test');
    // }
    
    // use App\Models\User;
    // use Illuminate\Support\Facades\Hash;
    
    // User::create([
    //     'name' => 'mosa',
    //     'email' => 'mosa@gmail.com',
    //     'password' => Hash::make('123456789')
    // ]);
}
