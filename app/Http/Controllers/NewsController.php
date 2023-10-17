<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
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
        $news = $this->news->paginate(10);
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
    public function store(StoreNewsRequest $request)
    {
        $input = $request->all();
        $news = new News();
        $news->uuid = Str::uuid();
        $news->image = $input["image"];
        $news->headline = $input["headline"];
        $news->content = $input["content"];
        $news->user_uuid = $input["user_uuid"];

        // Calculate read time
        $words = str_word_count(strip_tags($input["content"])); // Count words in the content
        $averageWordsPerMinute = 200;
        $read_time = ceil($words / $averageWordsPerMinute);
        $news->read_time = $read_time;
        
        $news->save();

        return redirect()->route("news.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNewsRequest $request, News $news)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        //
    }
}
