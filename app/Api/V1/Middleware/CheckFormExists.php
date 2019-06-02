<?php

namespace App\Api\V1\Middleware;

use Closure;
use App\Form;

class CheckFormExists extends BaseMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Form::where('id', $request->form)->doesntExist()) {
            return $this->sendError(__('messages.missing_record', ['model' => Form::$name, 'id' => $request->form]),
                [], 404);
        }

        return $next($request);
    }
}
