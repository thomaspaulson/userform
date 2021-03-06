<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserForm extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'userforms';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'content'
    ];

    public function fields()
    {
        return $this->hasMany(FormField::class, 'userform_id');
    }

    public function submission()
    {
        return $this->hasMany(SubmittedForm::class, 'userform_id');
    }


}
