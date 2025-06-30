<?php

namespace App\Services\Dashboard;

use App\Utils\ImageManger;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Dashboard\PageRepository;

class PageService
{
    protected $pageRepository , $imageManager;
    public function __construct(PageRepository $pageRepository, ImageManger $imageManager)
    {
        $this->pageRepository = $pageRepository;
        $this->imageManager = $imageManager;
    }
    public function getPages()
    {
        return $this->pageRepository->getPages();
    }
    public function getAllPagesForDatatable()
    {
        $pages = $this->getPages();
        return DataTables::of($pages)
            ->addIndexColumn()
            ->addColumn('title', function ($item) {
                return $item->getTranslation('title', app()->getLocale());
            })
            ->addColumn('image', function ($item) {
                return $item->image != null ? view('dashboard.pages.dataTable.images', compact('item')) : __('dashboard.no_image');
            })
            ->addColumn('content', function ($item) {
                return view('dashboard.pages.dataTable.content', compact('item'));
            })
            ->addColumn('status', function ($item) {
                return $item->getStatusTranslated();
            })
            ->addColumn('action', function ($item) {
                return view('dashboard.pages.dataTable.actions', compact('item'));
            })
            ->rawColumns(['content','image','action'])
            ->make(true);
    }
    public function getPage($id)
    {
        $page = $this->pageRepository->getPageById($id);
        return $page ?? false;
    }
    public function createPage($data)
    {
        if (array_key_exists('image', $data) && $data['image'] != null) {
            $data['image'] = $this->imageManager->uploadSingleImage('/', $data['image'], 'pages');
        }
        $data['slug'] = Str::slug($data['title']['en']);
        $page = $this->pageRepository->storePage($data);
        $this->pagesCache();
        return $page ?? false;
    }
    public function updatePage($id, $data)
    {
        $page = $this->getPage($id);
        if (!$page) {
            return false;
        }
        
        if (array_key_exists('image', $data) && $data['image'] != null) {
            if ($page->image != null) {
                $this->imageManager->deleteImageFromLocal('assets/img/uploads/pages/'.$page->image);
            }
            $data['image'] = $this->imageManager->uploadSingleImage('/', $data['image'], 'pages');
        }
        $data['slug'] = Str::slug($data['title']['en']);
        return $this->pageRepository->updatePage($page, $data);
    }
    public function deletePage($id)
    {
        $page = $this->getPage($id);
        if (!$page) {
            return false;
        }
        if (isset($page->image) && $page->image != null) {
            $this->imageManager->deleteImageFromLocal('assets/img/uploads/pages/'.$page->image);
        }
        $this->pagesCache();
        return $this->pageRepository->destroyPage($page);
    }
    public function changeStatus($id)
    {
        $pages = $this->getPage($id);
        if ($pages->status == 0) {
            $this->pageRepository->changeStatus($pages, 1);
            return 1;
        } elseif ($pages->status == 1) {
            $this->pageRepository->changeStatus($pages, 0);
            return 2;
        }
    }
    public function deleteImage($id)
    {
        $page = $this->getPage($id);
        if (!$page) {
            return false;
        }
        if ($page->image != null) {
            $this->imageManager->deleteImageFromLocal('assets/img/uploads/pages/'.$page->image);
            $page->image = null;
            $this->pageRepository->updatePage($page, ['image' => null]);
            return true;
        }
        return false;
    }
    public function pagesCache()
    {
        Cache::forget('pages_count');
    }


}
