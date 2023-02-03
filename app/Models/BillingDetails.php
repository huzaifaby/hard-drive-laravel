<?php
 
namespace App\Models;
  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
  
class BillingDetails extends Model
{
    use HasFactory;
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    protected $fillable = [
        'order_id', 'full_name','phone_no','email','address','country','state','city','post_code','company_name',
        'payment_method','transaction_id'
    ];
}