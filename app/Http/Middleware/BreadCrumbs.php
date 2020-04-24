<?php

namespace App\Http\Middleware;

use Closure;

class BreadCrumbs
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
        $url = $_SERVER['REQUEST_URI'];
        $urls = explode('/', $url);

        //Хлебные крошки
        $crumbs = array();

        //На главной не показываем
        if (!empty($urls) && $url != '/')
        {
            foreach ($urls as $key => $value)
            {
                //Собираем url для каждого пункта цепочки
                $prev_urls = array();
                for ($i = 0; $i <= $key; $i++)
                {
                    $prev_urls[] = $urls[$i];
                }

                //собираем url для всех, кроме текущей страницы
                if ($key == count($urls) - 1) $crumbs[$key]['url'] = '';
                elseif (!empty($prev_urls)) $crumbs[$key]['url'] = count($prev_urls) > 1 ? implode('/', $prev_urls) : '/';

                  switch ($value)
                {
                    case 'start' :
                          $crumbs[$key]['text'] = 'Start';
                          break;
                    case 'kunden' :
                          $crumbs[$key]['text'] = 'Kunden';
                          break;
                    case 'kreditanfragen' :
                        $crumbs[$key]['text'] = 'Kreditanfragen';
                    break;
                      case 'credit' :
                          $crumbs[$key]['text'] = 'Kreditanfragen';
                          break;
                      case 'superadmin' :
                          $crumbs[$key]['text'] = 'Startseite';
                    break;
                      case 'admin' :
                          $crumbs[$key]['text'] = 'admin';
                    break;

                      case 'users' :
                          $crumbs[$key]['text'] = 'Benutzer';
                      break;
                      case 'user' :
                          $crumbs[$key]['text'] = 'Benutzer';
                          break;
                      case is_numeric($value) :
                          $crumbs[$key]['text'] = null;
                          break;
                      case 'edit' :
                      $crumbs[$key]['text'] = null;
                      break;
                    default :

                    $crumbs[$key]['text'] = 'Hauptseite';
                    break;
                }

                if ($key > 0) $crumbs[$key]['text'] = $crumbs[$key]['text'];
            }
        }
        $request->attributes->Add(['breadcrumbs' => $crumbs]);
        return $next($request);
    }
}