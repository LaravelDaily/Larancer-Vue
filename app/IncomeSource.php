<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class IncomeSource
 *
 * @package App
 * @property string $title
 * @property double $fee_percent
*/
class IncomeSource extends Model
{
    use SoftDeletes;

    
    protected $fillable = ['title', 'fee_percent'];

    public static function boot()
    {
        parent::boot();

        IncomeSource::observe(new \App\Observers\UserActionsObserver);
    }

    public static function storeValidation($request)
    {
        return [
            'title' => 'max:191|required',
            'fee_percent' => 'numeric|nullable'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'title' => 'max:191|required',
            'fee_percent' => 'numeric|nullable'
        ];
    }

    

    
    
    
}
