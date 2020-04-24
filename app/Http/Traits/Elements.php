<?php
namespace App\Traits;

use App\Page;
use App\Category;

trait Elements
{
    public function getPages($language_id)
    {
        $pages = Page::with('page_languages')->get();
        $result=[];

        foreach ($pages as $page){
            $pg=$page->page_languages->where('language_id',$language_id)->first();
            $result+=[
                $page->code=>(!$pg?'':$pg->value),
            ];
        }

        return $result;
    }
}