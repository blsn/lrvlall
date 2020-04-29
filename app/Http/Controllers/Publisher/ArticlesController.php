<?php

namespace App\Http\Controllers\Publisher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Gate;

class ArticlesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        if (Gate::denies('create-posts')) {
            return redirect(route('dashboard'));
        }
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('publisher.articles.index')->with('posts', $user->posts);
    }
}
