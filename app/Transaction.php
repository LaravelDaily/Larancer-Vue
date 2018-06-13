<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Transaction
 *
 * @package App
 * @property string $project
 * @property string $transaction_type
 * @property string $income_source
 * @property string $title
 * @property text $description
 * @property double $amount
 * @property string $currency
 * @property string $transaction_date
*/
class Transaction extends Model
{
    use SoftDeletes;

    
    protected $fillable = ['title', 'description', 'amount', 'transaction_date', 'project_id', 'transaction_type_id', 'income_source_id', 'currency_id'];

    public static function boot()
    {
        parent::boot();

        Transaction::observe(new \App\Observers\UserActionsObserver);
    }

    public static function storeValidation($request)
    {
        return [
            'project_id' => 'integer|exists:projects,id|max:4294967295|nullable',
            'transaction_type_id' => 'integer|exists:transaction_types,id|max:4294967295|nullable',
            'income_source_id' => 'integer|exists:income_sources,id|max:4294967295|nullable',
            'title' => 'max:191|nullable',
            'description' => 'max:65535|nullable',
            'amount' => 'numeric|nullable',
            'currency_id' => 'integer|exists:currencies,id|max:4294967295|nullable',
            'transaction_date' => 'date_format:' . config('app.date_format') . '|max:191|nullable'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'project_id' => 'integer|exists:projects,id|max:4294967295|nullable',
            'transaction_type_id' => 'integer|exists:transaction_types,id|max:4294967295|nullable',
            'income_source_id' => 'integer|exists:income_sources,id|max:4294967295|nullable',
            'title' => 'max:191|nullable',
            'description' => 'max:65535|nullable',
            'amount' => 'numeric|nullable',
            'currency_id' => 'integer|exists:currencies,id|max:4294967295|nullable',
            'transaction_date' => 'date_format:' . config('app.date_format') . '|max:191|nullable'
        ];
    }

    

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setTransactionDateAttribute($input)
    {
        if ($input) {
            $this->attributes['transaction_date'] = Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d');
        }
    }

    /**
     * Get attribute from date format
     * @param $output
     *
     * @return string
     */
    public function getTransactionDateAttribute($output)
    {
        if ($output) {
            return Carbon::createFromFormat('Y-m-d', $output)->format(config('app.date_format'));
        }
    }
    
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id')->withTrashed();
    }
    
    public function transaction_type()
    {
        return $this->belongsTo(TransactionType::class, 'transaction_type_id')->withTrashed();
    }
    
    public function income_source()
    {
        return $this->belongsTo(IncomeSource::class, 'income_source_id')->withTrashed();
    }
    
    public function currency()
    {
        return $this->belongsTo(Currency::class, 'currency_id')->withTrashed();
    }
    
    
}
