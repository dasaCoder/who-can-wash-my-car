<div class="page-header page-header-light">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><i class="icon-arrow-right13 mr-2"></i> <span
                    class="font-weight-semibold">{{$page['mainTitle']}}</span>{{(isset($page['subTitle'])) ? ' - '.$page['subTitle'] : ''}}
            </h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>
    </div>

    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="#" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> {{$page['mainTitle']}}</a>
                @isset($page['subTitle'])
                    <span class="breadcrumb-item active">{{$page['subTitle']}}</span>
                @endisset
            </div>
        </div>
    </div>
</div>
