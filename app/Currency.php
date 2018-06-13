<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Currency
 *
 * @package App
 * @property string $title
 * @property string $code
 * @property tinyInteger $main_currency
*/
class Currency extends Model
{
    use SoftDeletes;

    
    protected $fillable = ['title', 'code', 'main_currency'];

    public static function boot()
    {
        parent::boot();

        Currency::observe(new \App\Observers\UserActionsObserver);
    }

    public static function storeValidation($request)
    {
        return [
            'title' => 'max:191|nullable',
            'code' => 'max:191|nullable',
            'main_currency' => 'boolean|nullable'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'title' => 'max:191|nullable',
            'code' => 'max:191|nullable',
            'main_currency' => 'boolean|nullable'
        ];
    }

    

    
    
    
}
