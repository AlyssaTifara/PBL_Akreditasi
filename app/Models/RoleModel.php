<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleModel extends Model
{
    use HasFactory;
    protected $table = 'role';
    protected $primaryKey = 'role_id';
    protected $fillable = [
        'role_id',
        'role_kode',
        'role_nama',
        'created_at',
        'updated_at',
    ];
    public function User()
    {
        return $this->hasMany(UserModel::class, 'role_id', 'role_id');
    }
}
