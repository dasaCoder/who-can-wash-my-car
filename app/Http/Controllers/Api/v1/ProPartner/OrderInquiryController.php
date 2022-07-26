<?php

namespace App\Http\Controllers\Api\v1\ProPartner;

use App\Http\Controllers\Api\v1\ApiController;
use App\Http\Requests\Api\InquiryRequest;
use App\Services\OrderInquiryService;
use Illuminate\Support\Facades\Log;

class OrderInquiryController extends ApiController
{
    /**
     * @var OrderInquiryService
     */
    private $orderInquiryService;

    function __construct(OrderInquiryService $orderInquiryService)
    {
        $this->orderInquiryService = $orderInquiryService;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-20
     * Summary: Get Order Inquiries
     */
    public function getOrderInquiries()
    {
        try {

            $data = $this->orderInquiryService->getOrderInquiries();

            return $this->sendResponse('success', 'Record get successfully', $data, 200);

        } catch (\Exception $ex) {
            Log::error($ex);
            return $this->sendResponse('error', $ex->getMessage(), [], 500);
        }
    }

    /**
     * @param  InquiryRequest  $request
     * @return \Illuminate\Http\JsonResponse
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-19
     * Summary: Store Inquiry
     */
    public function store(InquiryRequest $request)
    {
        try {

            $data = $this->locationService->store($request);

            return $this->sendResponse('success', 'Record create successfully', $data, 200);

        } catch (\Exception $ex) {
            Log::error($ex);
            return $this->sendResponse('error', $ex->getMessage(), [], 500);
        }
    }

    /**
     * @param  LocationRequest  $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-19
     * Summary: Update Location
     */
    public function update(LocationRequest $request, $id)
    {
        try {

            $data = $this->locationService->update($request, $id);

            return $this->sendResponse('success', 'Record update successfully', $data, 200);

        } catch (\Exception $ex) {
            Log::error($ex);
            return $this->sendResponse('error', $ex->getMessage(), [], 500);
        }
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-19
     * Summary: Destroy Location
     */
    public function destroy(int $id)
    {
        try {

            $this->locationService->destroy($id);

            return $this->sendResponse('success', 'Record delete successfully', [], 200);

        } catch (\Exception $ex) {
            Log::error($ex);
            return $this->sendResponse('error', $ex->getMessage(), [], 500);
        }
    }
}
