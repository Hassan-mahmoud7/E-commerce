<?php

namespace App\Repositories\Dashboard;

use App\Models\Page;

class PageRepository
{
    public function getPages() 
    {
        $pages = Page::latest()->get();
        return $pages;
    }
    public function getPageById($id) 
    {
        $page = Page::find($id);
        return $page;
    }
    public function storePage($data) 
    {
        $page = Page::create($data);
        return $page;
    }
    public function updatePage($page, $data) 
    {
        $page->update($data);
        return $page;
    }
    public function destroyPage($page) 
    {
        return $page->delete();
    }
    public function changeStatus($page) 
    {
        $page = $page->status == 1 ? $page->update(['status' => 0]) : $page->update(['status' => 1]);
        return $page;
    }
}
