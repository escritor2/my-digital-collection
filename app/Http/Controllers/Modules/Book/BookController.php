<?php
 
namespace App\Http\Controllers\Modules\Book;
 
use App\Http\Controllers\Controller;
use App\Interfaces\Modules\Book\BookServiceInterface;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
 
class BookController extends Controller
{
    protected BookServiceInterface $bookService;
 
    public function __construct(BookServiceInterface $bookService)
    {
        $this->bookService = $bookService;
    }
 
    /**
     * Display a listing of the books.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        $books = $this->bookService->getAllBooks();
        return Inertia::render('Books/Index', [
            'books' => $books,
        ]);
    }
 
    /**
     * Show the form for creating a new book.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        return Inertia::render('Books/Create');
    }
 
    /**
     * Store a newly created book in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'title' => ['required', 'string', 'max:255'],
                'author' => ['required', 'string', 'max:255'],
                'description' => ['nullable', 'string'],
                'isbn' => ['nullable', 'string', 'max:20', 'unique:books'],
                'page_count' => ['nullable', 'integer', 'min:1'],
            ]);
 
            $book = $this->bookService->createBook(array_merge($validatedData, ['created_by' => Auth::id()]));
 
            return redirect()->route('books.index')->with('success', 'Livro adicionado ao catálogo com sucesso!');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }
 
    /**
     * Display the specified book.
     *
     * @param  int  $id
     * @return \Inertia\Response
     */
    public function show(int $id)
    {
        $book = $this->bookService->getBookById($id);
 
        if (!$book) {
            abort(404);
        }
 
        return Inertia::render('Books/Show', [
            'book' => $book,
        ]);
    }
 
    /**
     * Show the form for editing the specified book.
     *
     * @param  int  $id
     * @return \Inertia\Response
     */
    public function edit(int $id)
    {
        $book = $this->bookService->getBookById($id);
 
        if (!$book) {
            abort(404);
        }
 
        return Inertia::render('Books/Edit', [
            'book' => $book,
        ]);
    }
 
    /**
     * Update the specified book in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, int $id)
    {
        try {
            $validatedData = $request->validate([
                'title' => ['required', 'string', 'max:255'],
                'author' => ['required', 'string', 'max:255'],
                'description' => ['nullable', 'string'],
                'isbn' => ['nullable', 'string', 'max:20', 'unique:books,isbn,' . $id], // Ignora o próprio ID na validação unique
                'page_count' => ['nullable', 'integer', 'min:1'],
            ]);
 
            $book = $this->bookService->updateBook($id, $validatedData);
 
            return redirect()->route('books.index')->with('success', 'Livro atualizado com sucesso!');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }
 
    /**
     * Remove the specified book from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(int $id)
    {
        $this->bookService->deleteBook($id);
        return redirect()->route('books.index')->with('success', 'Livro removido do catálogo com sucesso!');
    }
}
