<?php

namespace App\Http\Controllers\Modules\ReadingSession;

use App\Http\Controllers\Controller;
use App\Interfaces\Modules\ReadingSession\ReadingSessionServiceInterface;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ReadingSessionController extends Controller
{
    protected ReadingSessionServiceInterface $readingSessionService;

    public function __construct(ReadingSessionServiceInterface $readingSessionService)
    {
        $this->readingSessionService = $readingSessionService;
    }

    public function index()
    {
        return Inertia::render('ReadingSessions/Index');
    }

    public function create()
    {
        return Inertia::render('ReadingSessions/Create');
    }

    public function store(Request $request)
    {
    //
    }

    public function show(int $id)
    {
        return Inertia::render('ReadingSessions/Show');
    }

    public function edit(int $id)
    {
        return Inertia::render('ReadingSessions/Edit');
    }

    public function update(Request $request, int $id)
    {
    //
    }

    public function destroy(int $id)
    {
    //
    }
}
