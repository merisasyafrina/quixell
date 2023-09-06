<?php

namespace App\Http\Controllers;

use App\Models\Collections;

class CollectionsController extends Controller
{
    public function index()
    {
        $collections = Collections::paginate(8);

        return view('collections.index', [
            'title' => 'Collections',
            'collections' => $collections,
        ]);
    }

    public function show($id)
    {
        $collection = Collections::findOrFail($id);

        return view('collections.detail', [
            'title' => 'Collection Details',
            'collection' => $collection,
        ]);
    }
}
