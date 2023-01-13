<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;


class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {   
        $user = Auth::user();
        if ($request->route('question')){
            if ($user->id != 1 && $user->id != Question::find($request->route('question'))->quiz()->first()->user_id){
                return redirect('/');
            }
        } 
        if ($user->id != 1 && $user->id != Quiz::find($request->route("quiz"))->first()->user_id){
            return redirect('/');
        }
        
        return $next($request);
    }
}
