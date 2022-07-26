<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\DataTables\Admin\BlogDataTable;
use App\Http\Requests\Admin\BlogRequest;
use App\Services\BlogService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;

class BlogController extends Controller
{
    private $page = [
        'mainTitle' => 'Web Content Management',
        'subTitle' => 'Blogs'
    ];

    private $name = 'Blog';

    /**
     * @var BlogService
     */
    private $blogService;

    function __construct(BlogService $blogService)
    {
        $this->blogService = $blogService;
    }

    /**
     * @param  BlogDataTable  $dataTable
     * @return mixed
     * @throws Exception
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-19
     * Summary: Display a listing of the resource.
     */
    public function index(BlogDataTable $dataTable)
    {
        $filters = View::make('admin.web_content_management.blogs.filters')->render();

        return $dataTable->render('admin.common.datatable', ['page' => $this->page, 'filters' => $filters]);
    }

    /**
     * @return JsonResponse
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-19
     * Summary: Show the form for creating a new resource.
     */
    public function create(): JsonResponse
    {
        DB::beginTransaction();
        try {

            $view = View::make('admin.web_content_management.blogs.create')->render();

            DB::commit();
            return Response::json([
                'status' => 'success', 'data' => $view, 'popupType' => 'modal', 'modalSize' => 'md'
            ]);

        } catch (Exception $e) {
            DB::rollback();
            return Response::json(['status' => 'error', 'data' => $e->getMessage(), 'popupType' => 'notification']);
        }
    }

    /**
     * @param  BlogRequest  $request
     * @return JsonResponse
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-19
     * Summary: Store a newly created resource in storage.
     */
    public function store(BlogRequest $request): JsonResponse
    {
        DB::beginTransaction();
        try {

            $this->blogService->create($request->validated());

            DB::commit();
            return Response::json([
                'status' => 'success', 'data' => __('messages.store_success', ['name' => $this->name]), 'popupType' => 'notification'
            ]);

        } catch (Exception $e) {
            DB::rollback();
            return Response::json(['status' => 'error', 'data' => $e->getMessage(), 'popupType' => 'notification']);
        }
    }

    /**
     * @param  int  $id
     * @return JsonResponse
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-19
     * Summary: Show the form for editing the specified resource.
     */
    public function edit(int $id): JsonResponse
    {
        DB::beginTransaction();
        try {

            $blog = $this->blogService->find($id);
            $view = View::make('admin.web_content_management.blogs.edit', compact(['blog']))->render();

            DB::commit();
            return Response::json([
                'status' => 'success', 'data' => $view, 'popupType' => 'modal', 'modalSize' => 'md'
            ]);

        } catch (Exception $e) {
            DB::rollback();
            return Response::json(['status' => 'error', 'data' => $e->getMessage(), 'popupType' => 'notification']);
        }
    }

    /**
     * @param  BlogRequest  $request
     * @param  int  $id
     * @return JsonResponse
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-19
     * Summary: Update the specified resource in storage.
     */
    public function update(BlogRequest $request, int $id): JsonResponse
    {
        DB::beginTransaction();
        try {

            $this->blogService->update($request->validated(), $id);

            DB::commit();
            return Response::json([
                'status' => 'success', 'data' => __('messages.update_success', ['name' => $this->name]), 'popupType' => 'notification'
            ]);

        } catch (Exception $e) {
            DB::rollback();
            return Response::json(['status' => 'error', 'data' => $e->getMessage(), 'popupType' => 'notification']);
        }
    }

    /**
     * @param  int  $id
     * @return JsonResponse
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-19
     * Summary: Remove the specified resource from storage.
     */
    public function destroy(int $id): JsonResponse
    {
        DB::beginTransaction();
        try {

            $this->blogService->delete($id);

            DB::commit();
            return Response::json([
                'status' => 'success', 'data' => __('messages.destroy_success', ['name' => $this->name]), 'popupType' => 'notification'
            ]);

        } catch (Exception $e) {
            DB::rollback();
            return Response::json(['status' => 'error', 'data' => $e->getMessage(), 'popupType' => 'notification']);
        }
    }

    /**
     * @param  Request  $request
     * @return JsonResponse
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-19
     * Summary: Change the specified resource status in storage.
     */
    public function changeStatus(Request $request): JsonResponse
    {
        DB::beginTransaction();
        try {

            $this->blogService->changeStatus($request);

            DB::commit();
            return Response::json([
                'status' => 'success', 'data' => __('messages.status_change_success'), 'popupType' => 'notification'
            ]);

        } catch (Exception $e) {
            DB::rollback();
            return Response::json(['status' => 'error', 'data' => $e->getMessage(), 'popupType' => 'notification']);
        }
    }
}
