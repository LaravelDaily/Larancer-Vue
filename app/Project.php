<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Project
 *
 * @package App
 * @property string $title
 * @property string $client
 * @property string $description
 * @property string $start_date
 * @property string $budget
 * @property string $project_status
*/
class Project extends Model
{
    use SoftDeletes;

    
    protected $fillable = ['title', 'description', 'start_date', 'budget', 'client_id', 'project_status_id'];

    public static function boot()
    {
        parent::boot();

        Project::observe(new \App\Observers\UserActionsObserver);
    }

    public static function storeValidation($request)
    {
        return [
            'title' => 'max:191|nullable',
            'client_id' => 'integer|exists:clients,id|max:4294967295|required',
            'description' => 'max:191|nullable',
            'start_date' => 'date_format:' . config('app.date_format') . '|max:191|nullable',
            'budget' => 'max:191|nullable',
            'project_status_id' => 'integer|exists:project_statuses,id|max:4294967295|nullable'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'title' => 'max:191|nullable',
            'client_id' => 'integer|exists:clients,id|max:4294967295|required',
            'description' => 'max:191|nullable',
            'start_date' => 'date_format:' . config('app.date_format') . '|max:191|nullable',
            'budget' => 'max:191|nullable',
            'project_status_id' => 'integer|exists:project_statuses,id|max:4294967295|nullable'
        ];
    }

    

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setStartDateAttribute($input)
    {
        if ($input) {
            $this->attributes['start_date'] = Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d');
        }
    }

    /**
     * Get attribute from date format
     * @param $output
     *
     * @return string
     */
    public function getStartDateAttribute($output)
    {
        if ($output) {
            return Carbon::createFromFormat('Y-m-d', $output)->format(config('app.date_format'));
        }
    }
    
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id')->withTrashed();
    }
    
    public function project_status()
    {
        return $this->belongsTo(ProjectStatus::class, 'project_status_id')->withTrashed();
    }
    
    
}
