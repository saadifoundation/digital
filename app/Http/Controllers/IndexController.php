<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Option;
use App\Models\User;
use App\Models\Tag;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $levels = Level::all();
        $options = Option::all();
        $users = User::all();
        $other_options_tags = Tag::all()->whereIn('title_abbr', ['how-to-teach', 'enrichment', 'test', 'infrastructure']);

        return view(
            'index',
            [
                'levels' => $levels,
                'options' => $options,
                'users' => $users,
                'other_options_tags' => $other_options_tags,
            ]
        );
    }
}
