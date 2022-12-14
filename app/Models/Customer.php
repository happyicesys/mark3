<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'code',
        'created_by',
        'deactivated_at',
        'name',
        'first_transaction_id',
        'handled_by',
        'is_active',
        'parent_id',
        'pay_term_id',
        'profile_id',
        'price_template_id',
        'ops_note',
        'remarks',
        'status_id',
        'updated_by',
        'zone_id',
    ];

    // relationships
    public function attachments()
    {
        return $this->morphMany(Attachment::class, 'modelable')->orderBy('sequence');
    }

    public function billingAddress()
    {
        return $this->morphOne(Address::class, 'modelable')->ofMany('type', 'min');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function contact()
    {
        return $this->morphOne(Contact::class, 'modelable');
    }

    public function children()
    {
        return $this->hasMany(Customer::class, 'parent_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function deliveryAddress()
    {
        return $this->morphOne(Address::class, 'modelable')->ofMany('type', 'max');
    }

    public function handledBy()
    {
        return $this->belongsTo(User::class, 'handled_by');
    }

    public function firstTransaction()
    {
        return $this->belongsTo(Transaction::class, 'first_transaction_id');
    }

    public function payTerm()
    {
        return $this->belongsTo(PayTerm::class);
    }

    public function parent()
    {
        return $this->belongsTo(Customer::class, 'parent_id');
    }

    public function priceTemplate()
    {
        return $this->belongsTo(PriceTemplate::class);
    }

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function tagBindings()
    {
        return $this->hasMany(TagBinding::class);
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function zone()
    {
        return $this->belongsTo(Zone::class);
    }
}
