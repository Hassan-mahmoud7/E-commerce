<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\PageRequest;
use App\Services\Dashboard\PageService;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isNull;

class PageController extends Controller
{
    protected $pageService;
    public function __construct(PageService $pageService)
    {
        $this->pageService = $pageService;
    }
    public function index()
    {
        return view('dashboard.pages.index');
    }
    public function getAllPagesForDatatable()
    {
      return $this->pageService->getAllPagesForDatatable();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PageRequest $request)
    {
        $data = $request->only(['title', 'content', 'status','image']);
        $page = $this->pageService->createPage($data);
        if (!$page) {
            return redirect()->back()->with('error', __('dashboard.error_message'));
        }
        return redirect()->route('dashboard.pages.index')->with('success', __('dashboard.create_page_successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $page = $this->pageService->getPage($id);
        if (!$page) {
            return redirect()->back()->with('error', __('dashboard.error_message'));
        }
        return view('dashboard.pages.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PageRequest $request, string $id)
    {
         $data = $request->only(['title', 'content', 'status', 'image']);
        $page = $this->pageService->updatePage($id, $data);
        if (!$page) {
            return redirect()->back()->with('error', __('dashboard.error_message'));
        }
        
        return redirect()->route('dashboard.pages.index')->with('success', __('dashboard.edit_page_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $page = $this->pageService->deletePage($id);
        if (!$page) {
            return response()->json(['status' => 'error', 'message' => __('dashboard.error_message')], 500);
        }
        return response()->json(['status' => 'success', 'message' => __('dashboard.delete_page_successfully')], 200);
    }
    public function changeStatus($id)
    {
        $data = $this->pageService->changeStatus($id);
        $user = $this->pageService->getPage($id);
       if ($user->status == 1) {
            return response()->json([
                'status' => 'success',
                'message' =>  __('dashboard.status_active_updated_successfully'),
                'data' =>  $user,

            ], 200);
        } elseif ($user->status == 0) {
            return response()->json([
                'status' => 'success_not_active',
                'message' =>  __('dashboard.status_not_active_updated_successfully'),
                'data' =>  $user,

            ], 200);
        }
        if (isNull($data)) {
            return response()->json(['status' => false, 'message' =>  __('dashboard.error_message')], 404);
        }
    }
    public function deleteImage($id)
    {
        $data = $this->pageService->deleteImage($id);
        if (!$data) {
            return response()->json(['status' => 'error', 'message' => __('dashboard.error_message')], 500);
        }
        return response()->json(['status' => 'success', 'message' => __('dashboard.delete_success')], 200);
    }
}
