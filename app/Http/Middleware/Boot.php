<?php

namespace App\Http\Middleware;

use App\NavLink;
use App\Footer;
use App\Page;
use App;
use Closure;

class Boot
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if(\Session::get('lang') === null){
            \Session::put('lang', 'nl');
        }
        
        $lang = \Session::get('lang');

        App::setLocale($lang);

        $navLinks = NavLink::where('lang', $lang)
                            ->orderBy('index')
                            ->get();

        $pages = Page::where('lang', $lang)->get();
        $footer = Footer::all();
        
        view()->share('pages', $pages);
        view()->share('navLinks', $navLinks);
        view()->share('footer', $footer);

        return $next($request);
    }
}
