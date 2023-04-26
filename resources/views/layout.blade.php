<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<!-- begin::Head -->
<head>
	<!--begin::Base Path (base relative path for assets of this page) -->
	<base href="../">

	<!--end::Base Path -->
	<meta charset="utf-8" />
	<title>@section('title')retailPRO.io - @show</title>
	<meta name="description" content="Latest updates and statistic charts">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!--begin::Fonts -->
	<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
	<script>
		WebFont.load({
			google: {
				"families": ["Roboto:300,400,500,600,700", "Roboto:300,400,500,600,700"]
			},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	<!--end::Fonts -->
	@yield('before_style')
	<!--begin::Layout Skins(used by all pages) -->

	@include('components.styles')
	<link href="{{asset('static/backend/css/customize.css?v='.time())}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('static/backend/css/custom.css?v='.time())}}" rel="stylesheet" type="text/css" />
	<!--end::Layout Skins -->

	<link rel="shortcut icon" href="{{asset('static/backend/images/icon-epoints.png')}}" />
	@yield('after_style')
	<script type="text/javascript">
		var sdkInstance="appInsightsSDK";window[sdkInstance]="appInsights";var aiName=window[sdkInstance],aisdk=window[aiName]||function(e){function n(e){t[e]=function(){var n=arguments;t.queue.push(function(){t[e].apply(t,n)})}}var t={config:e};t.initialize=!0;var i=document,a=window;setTimeout(function(){var n=i.createElement("script");n.src=e.url||"https://az416426.vo.msecnd.net/scripts/b/ai.2.min.js",i.getElementsByTagName("script")[0].parentNode.appendChild(n)});try{t.cookie=i.cookie}catch(e){}t.queue=[],t.version=2;for(var r=["Event","PageView","Exception","Trace","DependencyData","Metric","PageViewPerformance"];r.length;)n("track"+r.pop());n("startTrackPage"),n("stopTrackPage");var s="Track"+r[0];if(n("start"+s),n("stop"+s),n("setAuthenticatedUserContext"),n("clearAuthenticatedUserContext"),n("flush"),!(!0===e.disableExceptionTracking||e.extensionConfig&&e.extensionConfig.ApplicationInsightsAnalytics&&!0===e.extensionConfig.ApplicationInsightsAnalytics.disableExceptionTracking)){n("_"+(r="onerror"));var o=a[r];a[r]=function(e,n,i,a,s){var c=o&&o(e,n,i,a,s);return!0!==c&&t["_"+r]({message:e,url:n,lineNumber:i,columnNumber:a,error:s}),c},e.autoExceptionInstrumented=!0}return t}(
				{
					instrumentationKey:'{{env('MS_INSIGHT_KEY')}}'
				}
		);window[aiName]=aisdk,aisdk.queue&&0===aisdk.queue.length&&aisdk.trackPageView({});
	</script>
</head>
<!-- end::Head -->

<!-- begin::Body -->
<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed">

<div id="fade">
	<div class="spinner">
		<div class="rect1"></div>
		<div class="rect2"></div>
		<div class="rect3"></div>
		<div class="rect4"></div>
		<div class="rect5"></div>
	</div>
</div>


<!-- begin:: Page -->

<!-- begin:: Header Mobile -->
@include('components.header-mobile')
<!-- end:: Header Mobile -->
<div class="kt-grid kt-grid--hor kt-grid--root">
	<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
		<!-- begin:: Aside -->
		@include('components.aside')
		<!-- end:: Aside -->
		<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
			<!-- begin:: Header -->
			@yield('header')
			<!-- end:: Header -->
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
				<!-- begin:: Content -->
				@yield('content')
				<!-- end:: Content -->
			</div>
			<!-- begin:: Footer -->
			@include('components.footer')
			<!-- end:: Footer -->
		</div>
	</div>
</div>
<!-- end:: Page -->
<!-- begin::Scrolltop -->
@include('components.scroll-top')
<!-- end::Scrolltop -->
<!-- begin::Global Config(global config for global JS sciprts) -->
<script>
	var KTAppOptions = {
		"colors": {
			"state": {
				"brand": "#2c77f4",
				"light": "#ffffff",
				"dark": "#282a3c",
				"primary": "#5867dd",
				"success": "#34bfa3",
				"info": "#36a3f7",
				"warning": "#ffb822",
				"danger": "#fd3995"
			},
			"base": {
				"label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
				"shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
			}
		}
	};
</script>
<!-- end::Global Config -->

<!--begin:: Global Optional Vendors -->
<script src="{{asset('js/laroute.js?v='.time())}}" type="text/javascript"></script>
<!--end:: Global Optional Vendors -->

@include('components.scripts')


<!--end::Global Theme Bundle -->
<script type="text/javascript">
	$(document).ajaxStart(function(){
		$('#fade').show();
	});
	$(document).ajaxStop(function(){
		$('#fade').hide();
	});

	$(document).ajaxError(function(){
		$('#fade').hide();
	});
	// $(document).ajaxSuccess(function(){
	// 	$('#fade').hide();
	// });

	$(window).on('load', function() {
		$('body').removeClass('m-page--loading');
	});
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	$('.kt-menu__item a').each(function () {
		var href = this.href;
		if (href == window.location.href){
			$(this).parent().addClass('kt-menu__item--active');
		}
	});
	$('.ss-select-2').select2();
</script>

<!--begin::Page Scripts(used by this page) -->
{{--<script src="{{asset('static/backend/assets/js/demo12/pages/dashboard.js')}}" type="text/javascript"></script>--}}
<script type="text/template" id="notification-tpl">
	<div class="kt-notification__item">
		<div class="kt-notification__item-icon">
			<i class="flaticon2-box-1 kt-font-brand"></i>
		</div>
		<div class="kt-notification__item-details">
			<div class="kt-notification__item-title">
				{title}
			</div>
			<div class="kt-notification__item-time">
			</div>
		</div>
		<div class="kt-notification__item--read">
			<button type="button" class="btn btn-info btn-sm" onclick="notification.seen('{id_log}','{id_user}')">Seen</button>
		</div>
	</div>
</script>
<script type="text/template" id="footer-notification-tpl">
	<div class="kt-widget__footer ">
		<a href="{link}" class="btn btn-label-primary btn-sm btn-upper w-100">View All</a>
	</div>
</script>

@yield('after_script')
<!--end::Page Scripts -->
</body>
<!-- end::Body -->
</html>
