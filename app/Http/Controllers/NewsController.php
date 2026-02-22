<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    // News create karne ka page
        public function post_news(){
        $newsList = DB::select("
            SELECT n.*, e.event_name, e.event_date
            FROM news n
            LEFT JOIN events e ON n.event_id = e.event_id
            ORDER BY n.created_at DESC
        ");

        $events = DB::select("SELECT event_id, event_name, event_date FROM events ORDER BY event_date DESC");

        return view('alumni-admin.post-news', compact('newsList', 'events'));
        }

    public function storeNews(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'event_id' => 'nullable|exists:events,event_id',
        ]);

        DB::insert("INSERT INTO news (title, content, event_id, created_at, updated_at) VALUES (?, ?, ?, ?, ?)", [
            $request->title, $request->content, $request->event_id, now(), now()
        ]);

        return redirect()->back()->with('success', 'News posted successfully!');
    }

    //  to disaply Edit Page
    public function editNews($id)
    {
        // News fetch karein aur Events fetch karein dropdown ke liye
        $news = DB::selectOne("SELECT * FROM news WHERE news_id = ?", [$id]);
        $events = DB::select("SELECT event_id, event_name FROM events ORDER BY event_date DESC");

        if (!$news) { return redirect()->back()->with('error', 'News not found!'); }

        return view('alumni-admin.edit-news', compact('news', 'events'));
    }

//    for Updating  Data
public function updateNews(Request $request, $id)
{

    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'date'=> 'nullable|date' ,
        'event_id' => 'nullable|exists:events,event_id',
    ]);

DB::update("UPDATE news SET
    title = ?,
    content = ?,
    event_id = ?,
    created_at= ?,
    updated_at = ?
    WHERE news_id = ?",
    [
        $request->title,
        $request->content,
        $request->event_id,
        $request->date,
        now(),
        $id ]);

    return redirect()->back()->with('success', 'News updated successfully!');
}


}
