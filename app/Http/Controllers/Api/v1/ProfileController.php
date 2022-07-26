<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Requests\Api\ProfileRequest;
use App\Services\BusinessProfileService;
use App\Services\PersonalProfileService;
use App\Services\UserService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProfileController extends ApiController
{
    /**
     * @var UserService
     */
    private $userService;
    /**
     * @var PersonalProfileService
     */
    private $personalProfileService;
    /**
     * @var BusinessProfileService
     */
    private $businessProfileService;

    function __construct(UserService $userService, PersonalProfileService $personalProfileService, BusinessProfileService $businessProfileService)
    {
        $this->userService = $userService;
        $this->personalProfileService = $personalProfileService;
        $this->businessProfileService = $businessProfileService;
    }

    /**
     * @param  ProfileRequest  $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-18
     * Summary: User update
     */
    public function update(ProfileRequest $request)
    {
        DB::beginTransaction();
        try {

            $user = auth()->user();
            $this->userService->update($request->validated(), $user->id);

            if($user->account_type == "Personal") {
                $this->personalProfileService->updateAndAssign($request->validated(), $user); //Update personal profile and assign to user
            } elseif($user->account_type == "Business") {
                $this->businessProfileService->updateAndAssign($request->validated(), $user); //Update business profile and assign to user
            }

            DB::commit();
            return $this->sendResponse('success', __('messages.update_success', ['name' => 'Profile']), [], 200);

        } catch (\Exception $ex) {
            DB::rollback();
            Log::error($ex);
            return $this->sendResponse('error', $ex->getMessage(), [], 500);
        }
    }
}
