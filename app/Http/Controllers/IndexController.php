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
        $levels = Level::with(['options' => function ($query) {
            $query->where('is_active', true);
        }])->get();

        $options = Option::where('is_active', true)->get();
        $other_options_tags = Tag::with(['options' => function ($query) {
                                $query->where('is_active', true);
                            }])
                            ->whereIn('title_abbr', ['how-to-teach', 'enrichment', 'test', 'infrastructure'])
                            ->get();

        return view(
            'index',
            [
                'levels' => $levels,
                'options' => $options,
                'other_options_tags' => $other_options_tags,
            ]
        );
    }
}
