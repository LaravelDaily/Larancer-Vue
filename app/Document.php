<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

/**
 * Class Document
 *
 * @package App
 * @property string $project
 * @property string $title
 * @property text $description
 * @property string $file
*/
class Document extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    
    protected $fillable = ['title', 'description', 'project_id'];
    protected $appends = ['file', 'file_link'];
    protected $with = ['media'];

    public static function boot()
    {
        parent::boot();

        Document::observe(new \App\Observers\UserActionsObserver);
    }

    public static function storeValidation($request)
    {
        return [
            'project_id' => 'integer|exists:projects,id|max:4294967295|nullable',
            'title' => 'max:191|nullable',
            'description' => 'max:65535|nullable',
            'file' => 'file|nullable'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'project_id' => 'integer|exists:projects,id|max:4294967295|nullable',
            'title' => 'max:191|nullable',
            'description' => 'max:65535|nullable',
            'file' => 'nullable'
        ];
    }

    

    public function getFileAttribute()
    {
        return $this->getFirstMedia('file');
    }

    /**
     * @return string
     */
    public function getFileLinkAttribute()
    {
        $file = $this->getFirstMedia('file');
        if (! $file) {
            return null;
        }

        return '<a href="' . $file->getUrl() . '" target="_blank">' . $file->file_name . '</a>';
    }
    
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id')->withTrashed();
    }
    
    
}
