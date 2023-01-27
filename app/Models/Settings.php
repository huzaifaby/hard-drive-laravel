<?php
 
namespace App\Models;
  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
  
class Settings extends Model
{
    use HasFactory;
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    protected $fillable = [
        'logo', 'phone_no_1','phone_no_2', 'Address', 'meta_title', 'meta_description', 'email',
        'footer_description','facebook','twitter','instagram','linkedin'
    ];
}