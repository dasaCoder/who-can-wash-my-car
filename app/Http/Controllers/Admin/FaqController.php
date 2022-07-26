<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\DataTables\Admin\FaqDataTable;
use App\Http\Requests\Admin\FaqRequest;
use App\Services\FaqService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;

class FaqController extends Controller
{
    private $page = [
        'mainTitle' => 'Web Content Management',
        'subTitle' => 'Faqs'
    ];

    private $name = 'Faq';

    /**
     * @var FaqService
     */
    private $faqService;

    function __construct(FaqService $faqService)
    {
        $this->faqService = $faqService;
    }

    /**
     * @param  FaqDataTable  $dataTable
     * @return mixed
     * @throws Exception
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-20
     * Summary: Display a listing of the resource.
     */
    public function index(FaqDataTable $dataTable)
    {
        $filters = View::make('admin.web_content_management.faqs.filters')->render();

        return $dataTable->render('admin.common.datatable', ['page' => $this->page, 'filters' => $filters]);
    }

    /**
     * @return JsonResponse
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-20
     * Summary: Show the form for creating a new resource.
     */
    public function create(): JsonResponse
    {
        DB::beginTransaction();
        try {

            $view = View::make('admin.web_content_management.faqs.create')->render();

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
     * @param  FaqRequest  $request
     * @return JsonResponse
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-20
     * Summary: Store a newly created resource in storage.
     */
    public function store(FaqRequest $request): JsonResponse
    {
        DB::beginTransaction();
        try {

            $this->faqService->create($request->validated());

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
     * Created at: 2022-06-20
     * Summary: Show the form for editing the specified resource.
     */
    public function edit(int $id): JsonResponse
    {
        DB::beginTransaction();
        try {

            $faq = $this->faqService->find($id);
            $view = View::make('admin.web_content_management.faqs.edit', compact(['faq']))->render();

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
     * @param  FaqRequest  $request
     * @param  int  $id
     * @return JsonResponse
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-20
     * Summary: Update the specified resource in storage.
     */
    public function update(FaqRequest $request, int $id): JsonResponse
    {
        DB::beginTransaction();
        try {

            $this->faqService->update($request->validated(), $id);

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
     * Created at: 2022-06-20
     * Summary: Remove the specified resource from storage.
     */
    public function destroy(int $id): JsonResponse
    {
        DB::beginTransaction();
        try {

            $this->faqService->delete($id);

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
     * Created at: 2022-06-20
     * Summary: Change the specified resource status in storage.
     */
    public function changeStatus(Request $request): JsonResponse
    {
        DB::beginTransaction();
        try {

            $this->faqService->changeStatus($request);

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
