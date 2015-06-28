<?php
/**
 * Created by PhpStorm.
 * User: seyisulu
 * Date: 6/24/15
 * Time: 8:41 AM
 */

namespace App\Http\Middleware;
use Closure;

class ApiSession {
    /**
     * Prevents the Set-C
     *
     * @param $request
     * @param callable $next
     * @return mixed
     */
    public function handle($request, Closure $next){
        \Config::set('session.driver','array');
        \Config::set('cookie.driver','array');
        return $next($request);
    }
}