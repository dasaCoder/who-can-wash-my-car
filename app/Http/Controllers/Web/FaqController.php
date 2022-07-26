<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;

class FaqController extends Controller
{
    public function getFaq()
    {
        $faqs = Faq::all();
        //dd($faqs);
        return view('web.faq', ['faqs' => $faqs]);
    }
}
