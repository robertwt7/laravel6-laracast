<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    //render a list
    public function index()
    {
        if (request('tag')) {
            $articles = Tag::where('name', request('tag'))->firstOrFail()->articles;
        } else {
            $articles = Article::latest()->get();
        }

        return view('articles.all', compact('articles'));
    }

    //show a single resource
    public function show(Article $article)
    {
        //Use findorfail to give a security if user put unmatched ID at query
        // Now Instead, we can just ask for Article object from the URI
        // Laravel understands from the wildcard of URL, happens behind the scene without us using the query by ourself
        // The name of the wildcard {article} must match up with $article variable
        // $article = Article::findOrFail($id);

        return view('articles.show', ['article' => $article]);
    }

    //shows a view to create a resource
    public function create()
    {
        return view('articles.create', [
            'tags' => Tag::all(),
        ]);
    }

    //Persist the new resource / handle the create resource form
    public function store()
    {
        // If validation fails, it will go back to the previous page + error variables

        // request()->validate([
        //     'title' => 'required',
        //     'excerpt' => 'required',
        //     'body' => 'required'
        // ]);

        // $article = new Article();

        // $article->title = request('title');
        // $article->excerpt = request('excerpt');
        // $article->body = request('body');

        // $article->save();

        // Change to this, don't forget to put fillable in the model
        // With model::create we need to fix the fillable to be able to save

        // Article::create([
        //     'title' => request('title'),
        //     'excerpt' => request('excerpt'),
        //     'body' => request('body')
        // ]);

        /*
         * Further we can change it to 1 line because validatedAttributes from validation
         * WIll return all of the value
         */

        // Article::create($this->validateArticle());

        // We can't use validate article anymore because tags are being validated
        // Tags is not in the table column of articles, so it will be confused

        $this->validateArticle();

        $article = new Article(request(['title', 'excerpt', 'body']));
        $article->user_id = 2;
        $article->save();

        if (request()->has('tags')) {
            $article->tags()->attach(request('tags'));
        }

        return redirect(route('articles.index'));
    }

    // Show a view to edit an existing resource
    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    // Persist the edited resource
    public function update(Article $article)
    {
        // request()->validate([
        //     'title' => 'required',
        //     'excerpt' => 'required',
        //     'body' => 'required'
        // ]);

        // $article->title = request('title');
        // $article->excerpt = request('excerpt');
        // $article->body = request('body');

        // $article->save();

        $article->update($this->validateArticle());

        // either use this with the route name, or use the path from the articles method
        // return redirect(route('articles.show', $article));
        return redirect($article->path());
    }

    private function validateArticle()
    {
        //tags is checking if the tags are exists at tags table with the given id
        return request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'tags' => 'exists:tags,id',
        ]);
    }

    // Delete the resource
    public function destroy()
    {
    }
}
