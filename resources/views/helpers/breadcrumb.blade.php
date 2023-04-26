<div class="kt-subheader__breadcrumbs">
    <a href="{{route('admin.dashboard')}}" class="kt-subheader__breadcrumbs-link">
        @lang('shared.HOME') </a>
    @if (isset($route))
        <span class="kt-subheader__breadcrumbs-separator"></span>
        <a href="{{ route($route) }}" class="kt-subheader__breadcrumbs-link">
            {{ $menuName ?? '' }} </a>
    @endif
    <span class="kt-subheader__breadcrumbs-separator"></span>
    <span> {{ $pageName ?? '' }} </span>
</div>
