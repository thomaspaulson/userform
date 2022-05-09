<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubmittedForm extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'submitted_form';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'userform_id'
    ];

    public function fields()
    {
        return $this->hasMany(SubmittedFormField::class, 'submitted_form_id');
    }

    public function userform()
    {
        return $this->belongsTo(UserForm::class, 'userform_id');
    }
}
