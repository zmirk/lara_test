<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) : \Illuminate\Http\Response
    {
        $onPage = $request->get('onpage');
        $sort = $request->get('sort') ?: 'id';
        $order = $request->get('order') ?: 'asc';

        $comments = Comment::orderBy($sort, $order)->paginate($onPage ?: 15);

        return response($comments, 200)
            ->header('Content-Type', 'application/json');
    }

}
