@extends('web.layouts.app')

@section('content')



<section class="page-header py-3">
    <div class="container">
        <h2>FAQ</h2>
        <ul class="list-unstyled thm-breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li><span>FAQ</span></li>
        </ul><!-- /.list-unstyled -->
    </div><!-- /.container -->
</section><!-- /.page-header -->

<!-- FAQ Section -->
<section class="faq-section custom-thm-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="m-0 f-28 fw-600 text-base-100">Frequently Asked Questions</h2>
                <!-- <p class="mt-2 f-16 fw-400 tex\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci laborum maiores maxime nostrum. Amet at consequuntur est hic nisi quae, quo rerum similique voluptatibus?</p> -->
            </div>

            <div class="col-12 mt-3">
                <div class="accordion faq-accrodion" id="accordionExample">

                    @foreach ($faqs as $faq)
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <button class="btn btn-link faq-accrodion-btn" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    {{$faq->question}}
                                </button>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    <p class="m-0 f-16 text-black-100 fw-400">
                                        {{$faq->answer}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>


@endsection
