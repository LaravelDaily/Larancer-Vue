<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Note
 *
 * @package App
 * @property string $project
 * @property text $note_text
*/
class Note extends Model
{
    use SoftDeletes;

    
    protected $fillable = ['note_text', 'project_id'];

    public static function boot()
    {
        parent::boot();

        Note::observe(new \App\Observers\UserActionsObserver);
    }

    public static function storeValidation($request)
    {
        return [
            'project_id' => 'integer|exists:projects,id|max:4294967295|nullable',
            'note_text' => 'max:65535|nullable'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'project_id' => 'integer|exists:projects,id|max:4294967295|nullable',
            'note_text' => 'max:65535|nullable'
        ];
    }

    

    
    
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id')->withTrashed();
    }
    
    
}
