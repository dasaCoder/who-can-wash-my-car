<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AboutUsRequest;
use App\Http\Requests\Admin\ContactDetailsRequest;
use App\Http\Requests\Admin\HomeRequest;
use App\Http\Requests\Admin\LinksRequest;
use App\Services\PageContentService;

class PageContentController extends Controller
{
    /**
     * @var PageContentService
     */
    private $pageContentService;

    function __construct(PageContentService $pageContentService)
    {
        $this->pageContentService = $pageContentService;
    }

    /**
     * @return \Illuminate\Contracts\View\View
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-21
     * Summary: Display a home update page
     */
    public function home()
    {
        $page = [
            'mainTitle' => 'Content Management',
            'subTitle' => 'Update Home'
        ];

        $data = $this->pageContentService->getUsingPage('Home');

        return view('admin.web_content_management.home', compact(['page', 'data']));
    }

    /**
     * @param  HomeRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-21
     * Summary: Update home page content
     */
    public function updateHome(HomeRequest $request)
    {
        $this->pageContentService->updateHome($request->validated(), 'Home');

        return redirect()->back()->with('success', __('messages.update_success', ['name' => 'Home']));
    }

    /**
     * @return \Illuminate\Contracts\View\View
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-21
     * Summary: Display an about us update page
     */
    public function aboutUs()
    {
        $page = [
            'mainTitle' => 'Content Management',
            'subTitle' => 'Update About Us'
        ];

        $data = $this->pageContentService->getUsingPage('AboutUs');

        return view('admin.web_content_management.about_us', compact(['page', 'data']));
    }

    /**
     * @param  AboutUsRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-21
     * Summary: Update about us page content
     */
    public function updateAboutUs(AboutUsRequest $request)
    {
        $this->pageContentService->updateAboutUs($request->validated(), 'AboutUs');

        return redirect()->back()->with('success', __('messages.update_success', ['name' => 'Home']));
    }

    /**
     * @return \Illuminate\Contracts\View\View
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-21
     * Summary: Display a links update page
     */
    public function links()
    {
        $page = [
            'mainTitle' => 'Content Management',
            'subTitle' => 'Update App Links & Social Media Links'
        ];

        $data = $this->pageContentService->getUsingPage('Links');

        return view('admin.web_content_management.links', compact(['page', 'data']));
    }

    /**
     * @param  LinksRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-21
     * Summary: Update links
     */
    public function updateLinks(LinksRequest $request)
    {
        $this->pageContentService->updateLinks($request->validated(), 'Links');

        return redirect()->back()->with('success', __('messages.update_success', ['name' => 'Manage links']));
    }

    /**
     * @return \Illuminate\Contracts\View\View
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-21
     * Summary: Display a contact details update page
     */
    public function contactDetails()
    {
        $page = [
            'mainTitle' => 'Content Management',
            'subTitle' => 'Update Contact Details'
        ];

        $data = $this->pageContentService->getUsingPage('ContactDetails');

        return view('admin.web_content_management.contact_details', compact(['page', 'data']));
    }

    /**
     * @param  ContactDetailsRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * Created by: Charith Gamage
     * Created at: 2022-06-21
     * Summary: Update contact details
     */
    public function updateContactDetails(ContactDetailsRequest $request)
    {
        $this->pageContentService->updateContactDetails($request->validated(), 'ContactDetails');

        return redirect()->back()->with('success', __('messages.update_success', ['name' => 'Contact details']));
    }
}
