<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
 
class Book extends Model
{
    use HasFactory;
 
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'author',
        'description',
        'isbn',
        'page_count',
        'created_by',
    ];
 
    /**
     * Get the user that created the book.
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
 
    /**
     * Get the user books for the book.
     */
    public function userBooks(): HasMany
    {
        return $this->hasMany(UserBook::class);
    }
 
    /**
     * Scope a query to find a book by title and author (case insensitive).
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string  $title
     * @param  string  $author
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFindByTitleAndAuthor($query, string $title, string $author)
    {
        return $query->whereRaw('LOWER(title) = ?', [strtolower($title)])
                     ->whereRaw('LOWER(author) = ?', [strtolower($author)]);
    }
}
