<?php
 
namespace App\Repositories\Modules\Book;
 
use App\Interfaces\Modules\Book\BookRepositoryInterface;
use App\Models\Book;
use Illuminate\Database\Eloquent\Collection;
 
class BookRepository implements BookRepositoryInterface
{
    /**
     * Get all books.
     *
     * @return \Illuminate\Database\Eloquent\Collection<int, Book>
     */
    public function getAll(): Collection
    {
        return Book::all();
    }
 
    /**
     * Find a book by its ID.
     *
     * @param  int  $id
     * @return \App\Models\Book|null
     */
    public function findById(int $id): ?Book
    {
        return Book::find($id);
    }
 
    /**
     * Create a new book.
     *
     * @param  array  $data
     * @return \App\Models\Book
     */
    public function create(array $data): Book
    {
        return Book::create($data);
    }
 
    /**
     * Update an existing book.
     *
     * @param  int  $id
     * @param  array  $data
     * @return \App\Models\Book
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function update(int $id, array $data): Book
    {
        $book = Book::findOrFail($id);
        $book->update($data);
        return $book;
    }
 
    /**
     * Delete a book.
     *
     * @param  int  $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        return Book::destroy($id) > 0;
    }
 
    /**
     * Find a book by title and author (case insensitive).
     *
     * @param  string  $title
     * @param  string  $author
     * @return \App\Models\Book|null
     */
    public function findByTitleAndAuthor(string $title, string $author): ?Book
    {
        return Book::findByTitleAndAuthor($title, $author)->first();
    }
}
