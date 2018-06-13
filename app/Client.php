<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Client
 *
 * @package App
 * @property string $first_name
 * @property string $last_name
 * @property string $company_name
 * @property string $email
 * @property string $phone
 * @property string $website
 * @property string $skype
 * @property string $country
 * @property string $client_status
*/
class Client extends Model
{
    use SoftDeletes;

    
    protected $fillable = ['first_name', 'last_name', 'company_name', 'email', 'phone', 'website', 'skype', 'country', 'client_status_id'];

    public static function boot()
    {
        parent::boot();

        Client::observe(new \App\Observers\UserActionsObserver);
    }

    public static function storeValidation($request)
    {
        return [
            'first_name' => 'max:191|nullable',
            'last_name' => 'max:191|nullable',
            'company_name' => 'max:191|nullable',
            'email' => 'email|max:191|nullable',
            'phone' => 'max:191|nullable',
            'website' => 'max:191|nullable',
            'skype' => 'max:191|nullable',
            'country' => 'max:191|nullable',
            'client_status_id' => 'integer|exists:client_statuses,id|max:4294967295|nullable'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'first_name' => 'max:191|nullable',
            'last_name' => 'max:191|nullable',
            'company_name' => 'max:191|nullable',
            'email' => 'email|max:191|nullable',
            'phone' => 'max:191|nullable',
            'website' => 'max:191|nullable',
            'skype' => 'max:191|nullable',
            'country' => 'max:191|nullable',
            'client_status_id' => 'integer|exists:client_statuses,id|max:4294967295|nullable'
        ];
    }

    

    
    
    public function client_status()
    {
        return $this->belongsTo(ClientStatus::class, 'client_status_id')->withTrashed();
    }
    
    
}
