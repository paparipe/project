<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\View;

use Spatie\Menu\Laravel\Menu;

class MenuMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response {

        View::share('main_menu', self::menu($request));

        return $next($request);

    }


    /**
        * Creates Menus For all Pages
        *
        * @return Spatie\Menu\Laravel\Menu
    **/
    protected function menu(
        Request $request,
        $obj = [
            'id' => 'main_menu',
            'open' => true,
            'items' => [
                [
                    'label' => 'CV',
                    'route' => 'cv',
                    'sub' => [
                        'id' => 'sub',
                        'open' => false,
                        'items' => [
                            [
                                'route' => 'cv.experience',
                                'label' => 'Experience'
                            ],
                        ]
                    ],
                ],
                [
                    'label' => 'Projects',
                    'sub' => [
                        'id' => 'sub',
                        'open' => false,
                        'items' => [
                            [
                                'route' => 'projects.games',
                                'label' => 'Games'
                            ],
                            [
                                'route' => 'projects.websites',
                                'label' => 'Websites'
                            ],
                        ]
                    ],
                ],
                [
                    'route' => 'https://github.com/paparipe',
                    'label' => 'My Git',
                    'external' => true
                ],
            ]
        ]
    ) {

        // if (cache()->has('menu')) return cache('menu'); # Get Cached Menu

        $menu = (object) [
            'id' => $obj['id'],
            'open' => $obj['open'],
            'items' => []
        ];

        $current = $request->route()->getName();

        foreach ($obj['items'] as $key => $i) {

            if(!isset($i['route'])) $i['route'] = false;
            
            $menu->items[$key] = (object) [
                'route' => (isset($i['external']) ? ($i['external'] ? $i['route'] : ($i['route'] ? route($i['route']) : false)) : ($i['route'] ? route($i['route']) : false)),
                'label' => isset($i['label']) ? $i['label'] : ucfirst($i['route']),
                'active' => $i['route'] == $current,
                'external' => isset($i['external']) ? $i['external'] : false,
                'sub' => null,
            ];

            if (isset($i['sub'])) {
                $menu->items[$key]->sub = self::menu(
                    $request,
                    $i['sub'],
                );
            }

            if ($menu->items[$key]->active) $menu->open = true;

        }

        if($obj['id'] === 'main_menu') cache(['menu' => $menu], now()->addHours(24)); # Cache Menu

        return $menu;

    }

}


