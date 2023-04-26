@php
    $listOption = [10, 50, 75, 100];
    $selected = (isset($_GET['perpage'])) ? $_GET['perpage'] : 10;
    $frm = isset($frm) ? $frm : 'form-filter';
    $displaySelect = isset($display) ? $display : true;
@endphp
<div class="kt-pagination kt-pagination--brand kt-pagination--circle">
    <div class="kt-pagination__toolbar">
        <select class="form-control kt-font-brand"
                name="perpage" onchange="register.listModel()" style="width: 60px">
            @foreach ($listOption as $option)
                <option value="{{ $option }}" {{$paginator->perPage() == $option ? "selected" :""}}>{{ $option }}</option>
            @endforeach
        </select>
        <span class="m-datatable__pager-detail">Hiển thị {{ $paginator->firstItem() }} - {{ $paginator->lastItem() }} của {{ $paginator->total() }}</span>
    </div>
    @if ($paginator->hasPages())
        <ul class="kt-pagination__links">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="kt-pagination__link--first">
                    <a title="First"
                       class="m-datatable__pager-link m-datatable__pager-link--first m-datatable__pager-link--disabled"
                       disabled="disabled">
                        <i class="fa fa-angle-double-left"></i>
                    </a>
                </li>
                <li class="kt-pagination__link--next">
                    <a title="Previous"
                       class="m-datatable__pager-link m-datatable__pager-link--prev m-datatable__pager-link--disabled"
                       disabled="disabled">
                        <i class="fa fa-angle-left"></i>
                    </a>
                </li>
            @else
                <li class="kt-pagination__link--next">
                    <a data-page="1" title="First" class="m-datatable__pager-link m-datatable__pager-link--first"
{{--                       href="{{$paginator->url(1)}}">--}}
                       href="javascript:void(0)" onclick="register.paging(1)">
                        <i class="fa fa-angle-double-left kt-font-brand"></i>
                    </a>
                </li>
                <li class="kt-pagination__link--next">
                    <a data-page="{{$paginator->currentPage() - 1}}" title="Previous" class="m-datatable__pager-link m-datatable__pager-link--prev"
                       href="javascript:void(0)" onclick="register.paging({{$paginator->currentPage() - 1}})">
                        <i class="fa fa-angle-left kt-font-brand"></i>
                    </a>
                </li>
            @endif

            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li><a disabled="disabled" title="More pages"
                           class="m-datatable__pager-link m-datatable__pager-link--more-next m-datatable__pager-link--disabled"><i
                                    class="la la-ellipsis-h"></i></a></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="kt-pagination__link--active">
                                <a data-page="{{$page}}" onclick="register.paging({{$page}})" href="javascript:void(0)" title="{{ $page }}">{{ $page }}</a></li>
                        @else
                            <li><a data-page="{{$page}}" onclick="register.paging({{$page}})" href="javascript:void(0)">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach
            {{-- Next Page Link --}}
            @if ($paginator->currentPage() == $paginator->lastPage())
                <li class="kt-pagination__link--prev">
                    <a title="Next"
                       class="m-datatable__pager-link m-datatable__pager-link--next m-datatable__pager-link--disabled"
                       disabled="disabled">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </li>
                <li class="kt-pagination__link--last">
                    <a title="Last"
                       class="m-datatable__pager-link m-datatable__pager-link--last m-datatable__pager-link--disabled"
                       disabled="disabled">
                        <i class="fa fa-angle-double-right"></i>
                    </a>
                </li>
            @else
                <li class="kt-pagination__link--prev">
                    <a data-page="{{$paginator->currentPage() + 1}}" title="Next" class="m-datatable__pager-link m-datatable__pager-link--next"
                       href="javascript:void(0)" onclick="register.paging({{$paginator->currentPage() + 1}})">
                        <i class="fa fa-angle-right kt-font-brand"></i>
                    </a>
                </li>
                <li class="kt-pagination__link--last">
                    <a data-page="{{$paginator->lastPage()}}" onclick="register.paging({{$paginator->lastPage()}})" title="Last" class="m-datatable__pager-link m-datatable__pager-link--last"
                       href="javascript:void(0)">
                        <i class="fa fa-angle-double-right kt-font-brand"></i>
                    </a>
                </li>
            @endif
        </ul>
    @endif

</div>
<script type="text/javascript">
    function filterDisplay(idForm = 'form-filter') {
        $('#'+idForm).submit();
    }
</script>
