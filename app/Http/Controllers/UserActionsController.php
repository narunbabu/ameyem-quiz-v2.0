<?php

namespace AmeyemQuiz\Http\Controllers;

use AmeyemQuiz\UserAction;
use Illuminate\Http\Request;
use AmeyemQuiz\Http\Requests\StoreUserActionsRequest;
use AmeyemQuiz\Http\Requests\UpdateUserActionsRequest;

class UserActionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of UserAction.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_actions = UserAction::all();

        return view('user_actions.index', compact('user_actions'));
    }
}
