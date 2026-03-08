<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
 
class UserBook extends Model
{
    use HasFactory;
 
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'book_id',
        'status',
        'progress_pages',
        'rating',
        'started_at',
        'finished_at',
    ];
 
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'started_at' => 'datetime',
        'finished_at' => 'datetime',
    ];
 
    /**
     * Get the user that owns the user book.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
 
    /**
     * Get the book associated with the user book.
     */
    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }
 
    /**
     * Get the reading sessions for the user book.
     */
    public function readingSessions(): HasMany
    {
        return $this->hasMany(ReadingSession::class);
    }
 
    /**
     * Automatically update status if progress_pages reaches page_count.
     *
     * @param  int  $value
     * @return void
     */
    public function setProgressPagesAttribute(int $value): void
    {
        $this->attributes['progress_pages'] = $value;
 
        if ($this->book && $value >= $this->book->page_count && $this->status !== 'lido') {
            $this->attributes['status'] = 'lido';
            $this->attributes['finished_at'] = now();
        }
    }
}
