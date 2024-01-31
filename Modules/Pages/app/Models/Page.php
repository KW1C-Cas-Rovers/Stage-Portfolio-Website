<?php

namespace Modules\Pages\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

//use Modules\Pages\Database\factories\PageFactory;
use Illuminate\View\View;
use Modules\Users\app\Models\User;

class Page extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'content',
        'slug',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'content' => 'json',
    ];

    /**
     * Get the user that owns the page.
     *
     * @return belongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the category associated with the page.
     *
     * @return BelongsToMany
     */
    public function category(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    /**
     * Get the appropriate view for the page based on category.
     *
     * @param Category $category
     * @return string
     */
    public function getIndexViewPath(Category $category): string
    {
        return 'articles.' . $category->name . '.index.index';
    }

    /**
     * Get the appropriate view for the page based on category.
     *
     * @param Category $category
     * @return string
     */
    public function getShowViewPath(Category $category): string
    {
        return $category->name . '.show.show';
    }

    /**
     * Render the index page content using the appropriate view.
     *
     * @return View
     */
    public function renderIndex(): View
    {
        $category = $this->category()->firstOrFail();

        if (!($category instanceof Category)) {
            throw new \RuntimeException('Invalid category');
        }

        return View::make($this->getIndexViewPath($category), ['page' => $this]);
    }

    /**
     * Render the show page content using the appropriate view.
     *
     * @return View
     */
    public function renderShow(): View
    {
        $category = $this->category()->firstOrFail();

        if (!($category instanceof Category)) {
            throw new \RuntimeException('Invalid category');
        }

        return View::make($this->getShowViewPath($category), ['page' => $this]);
    }

//    protected static function newFactory(): PageFactory
//    {
//        //return PageFactory::new();
//    }
}
