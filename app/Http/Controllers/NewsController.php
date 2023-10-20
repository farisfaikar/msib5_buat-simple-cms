<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    protected $news;
    protected $user;
    public function __construct(News $news, User $user)
    {
        $this->news = $news;
        $this->user = $user;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = $this->news::with('media')->orderBy('created_at', 'desc')->get();
        return view('news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = $this->user->where('role', 'admin')->get();
        return view('news.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Calculate read time
        $words = str_word_count(strip_tags($request->content)); // Count words in the content
        $averageWordsPerMinute = 200;
        $read_time = ceil($words / $averageWordsPerMinute);
        
        $news = new News;
        $news->addMediaFromRequest('image')->toMediaCollection('news');
        $news->headline = $request->headline;
        $news->content = $request->content;
        $news->user_uuid = $request->user_uuid;
        $news->read_time = $read_time;
        $news->save();

        return redirect()->route("news.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        $users = $this->user->all();
        return view('news.show', compact('news', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        $users = $this->user->all();
        // $news = $news->with('media')->where('uuid', $news->uuid)->first();
        return view('news.edit', compact('news', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNewsRequest $request, News $news)
    {
        // Calculate read time
        $words = str_word_count(strip_tags($request->content)); // Count words in the content
        $averageWordsPerMinute = 200;
        $read_time = ceil($words / $averageWordsPerMinute);
        
        $news->headline = $request->headline;
        $news->content = $request->content;
        $news->user_uuid = $request->user_uuid;
        $news->read_time = $read_time;
        $news->save();
        $news->addMediaFromRequest('image')->toMediaCollection('news');
        
        return redirect()->route("news.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        $news = $this->news->find($news->uuid);
        $news->delete();

        return redirect()->route("news.index");
    }
}
