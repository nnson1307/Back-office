<div class="kt-pagination kt-pagination--brand kt-pagination--circle">
    <div class="m-datatable__pager-info">
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
                    <a title="First" class="m-datatable__pager-link m-datatable__pager-link--first"
                       href="javascript:void(0)" onclick="pageClick2(1)">
                        <i class="fa fa-angle-double-left kt-font-brand"></i>
                    </a>
                </li>
                <li class="kt-pagination__link--next">
                    <a title="Previous" class="m-datatable__pager-link m-datatable__pager-link--prev"
                       href="javascript:void(0)" onclick="pageClick2('{{$paginator->currentPage() - 1}}')">
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
                                <a href="javascript:void(0)" onclick="pageClick2({{"$page"}})" title="{{ $page }}">{{ $page }}
                                </a>
                            </li>
                        @else
                            <li>
                                <a href="javascript:void(0)" onclick="pageClick2({{"$page"}})">
                                    {{ $page }}
                                </a>
                            </li>
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
                    <a title="Next" class="m-datatable__pager-link m-datatable__pager-link--next"
                       href="javascript:void(0)" onclick="pageClick2('{{$paginator->currentPage() + 1}}')">
                        <i class="fa fa-angle-right kt-font-brand"></i>
                    </a>
                </li>
                <li class="kt-pagination__link--last">
                    <a title="Last" class="m-datatable__pager-link m-datatable__pager-link--last"
                       href="javascript:void(0)" onclick="pageClick2('{{$paginator->lastPage()}}')">
                        <i class="fa fa-angle-double-right kt-font-brand"></i>
                    </a>
                </li>
            @endif
        </ul>
    @endif
</div>