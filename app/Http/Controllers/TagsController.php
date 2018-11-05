<?php

namespace App\Http\Controllers;

use App\Models\Tag;

class TagsController extends Controller
{
    public function getAllTags()
    {
        $tags = Tag::all();
        return response()->json(['tags' => $tags]);
    }
}
