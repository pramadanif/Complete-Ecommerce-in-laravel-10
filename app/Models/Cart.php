<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable=['user_id','product_id','order_id','quantity','amount','price','status','product_title','product_photo','product_summary','product_size'];
    
    // public function product(){
    //     return $this->hasOne('App\Models\Product','id','product_id');
    // }
    // public static function getAllProductFromCart(){
    //     return Cart::with('product')->where('user_id',auth()->user()->id)->get();
    // }
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    public function order(){
        return $this->belongsTo(Order::class,'order_id');
    }

    /**
     * Get product title from snapshot or relation
     */
    public function getProductTitle()
    {
        return $this->product_title ?? ($this->product ? $this->product->title : 'Product Deleted');
    }

    /**
     * Get product photo from snapshot or relation
     */
    public function getProductPhoto()
    {
        return $this->product_photo ?? ($this->product ? $this->product->photo : null);
    }

    /**
     * Get product summary from snapshot or relation
     */
    public function getProductSummary()
    {
        return $this->product_summary ?? ($this->product ? $this->product->summary : null);
    }

    /**
     * Get product size from snapshot or relation
     */
    public function getProductSize()
    {
        return $this->product_size ?? ($this->product ? $this->product->size : null);
    }
}
