@extends('layouts.master')
@section('subtitle', $profile->name)
@section('description', $profile->bio)
@section('og-image', $profile->avatar_url)
@push('body-class', "theme--{$profile->theme->key}")
@push('head')
	<style>
		html,
		body {
			height: 100%;
			width: 100%;
		}

		.crisp-client {
			display: none;
		}
	</style>
@endpush

@section('body')
	<section class="d-flex align-items-start align-items-md-center justify-content-center mh-93vh">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-5 col-md-6 col-sm-12">

					<div class="card text-center pt-4 pb-2 border-0 bg-transparent">
						<img src="{{$profile->avatar_url}}" alt="{{$profile->name}}"
						     class="rounded-circle mx-auto" width="90px" height="90px">

						<div class="card-body">
							<h1 class="h4 card-title font-weight-600 mb-2" dir="auto">{{ $profile->name }}</h1>
							<small class="text-muted d-block" dir="ltr">{{ '@'.$profile->username }}</small>

							@if($profile->location)
								<p class="card-text mb-1 font-weight-500">
									<span class="d-block mb-2" dir="auto">
										<i class="fas fa-map-marker-alt"></i>
										{{ $profile->location }}
									</span>
								</p>
							@endif

							<p class="card-text mb-0 {{ empty($profile->bio) ? 'd-none' : '' }}"
							   dir="auto">{{ $profile->bio }}</p>
						</div>

						<ul class="nav flex-column p-0">
							@foreach($profile->links as $link)
								<li class="nav-item mb-3">
									<a href="{{$link->external_link}}" title="{{ $link->name }}"
									   class="w-100 btn-lg text-right {{ $profile->theme->settings['button'] }}"
									   rel="nofollow noopener noreferrer">
										<i class="mr-2 {{ $link->icon}}"></i>
										{{ $link->name }}
									</a>
								</li>
							@endforeach
						</ul>
					</div><!-- /.card -->
				</div>
			</div>
		</div>
	</section>

	<footer class="profile-footer text-center position-static">
		<a class="m-auto logo-text"
		   href="{{ url('/') }}?&utm_source=profile_{{$profile->id}}&utm_medium=LinkatiLogo&utm_campaign=Profile"
		   title="{{ config('app.name') }}">
			<svg style="width: 180px;" viewBox="0 0 383 69" version="1.1" xmlns="http://www.w3.org/2000/svg"
			     xmlns:xlink="http://www.w3.org/1999/xlink">
				<g stroke="none" stroke-width="1" fill="#082471" fill-rule="evenodd">
					<path d="M369.328,12.464 C370.672,13.424 382.384,12.272 382.64,10.544 C383.024,8.048 378.736,8.624 377.584,7.92 C375.6,6.448 375.408,4.528 378.224,3.696 C379.376,3.312 379.824,1.968 378.928,1.2 C376.56,-0.912 372.208,1.2 372.464,5.36 C372.784,10.096 373.104,7.984 369.84,9.52 C368.816,9.904 368.304,11.632 369.328,12.464 Z M376.432,54 C378.672,54 378.288,48.24 378.48,44.528 C378.864,31.344 378.928,25.648 378.48,18.608 C378.416,16.816 377.776,16.176 376.24,15.856 C372.144,15.216 373.232,28.016 372.848,41.904 C372.656,48.368 371.952,54 376.432,54 Z M360.496,32.368 C363.056,36.4 367.792,32.24 365.488,28.72 C363.376,25.648 358.128,28.592 360.496,32.368 Z M358.576,54 C366.896,54 366.768,46.768 365.36,38.96 C364.976,36.272 361.2,36.72 360.752,39.472 C360.688,40.048 360.688,40.56 360.752,41.136 C360.816,42.416 361.072,43.696 361.072,45.04 C361.072,49.264 356.592,48.752 354.992,48.752 C353.136,48.752 351.792,49.84 351.792,51.376 C351.792,52.912 353.648,54 355.056,54 L355.056,54 L358.576,54 Z M327.344,27.696 C330.864,24.688 333.744,23.984 337.2,28.208 C341.232,33.2 344.688,29.232 338.672,22.064 C330.416,10.928 313.84,39.472 327.344,27.696 Z M312.944,49.328 C319.472,55.472 326.128,54.448 332.464,50.16 C334.256,50.992 335.792,51.888 337.392,52.528 C339.952,53.424 342.448,52.592 344.816,51.696 C345.968,51.248 346.928,51.12 347.824,51.952 C349.104,53.04 351.984,54 354.992,54 L354.992,48.752 C350.128,48.56 349.488,47.472 349.168,42.608 C349.04,40.432 348.656,38.32 348.336,36.208 C347.76,32.24 343.92,32.944 343.408,36.976 C343.024,39.856 343.728,43.056 342.704,45.808 C341.168,49.968 336.112,47.536 335.728,43.888 C335.6,42.672 335.664,41.392 335.472,40.176 C335.152,38 332.592,35.312 330.992,38.128 C329.648,40.496 330.544,43.696 329.072,46 C326.448,49.968 318.064,49.392 316.72,44.656 C316.72,44.656 315.76,41.328 315.76,41.328 C315.504,40.496 315.376,39.6 314.864,39.024 C314.288,38.384 313.392,37.744 312.56,37.744 C311.472,37.68 310.64,38.512 310.384,39.728 L309.808,42.48 C308.976,47.792 308.72,48.752 303.536,48.752 C301.68,48.752 300.336,49.84 300.336,51.376 C300.336,52.912 301.68,54 303.536,54 C308.144,54 310.704,53.36 312.944,49.328 Z M284.784,40.048 C285.168,37.552 280.88,38.128 279.728,37.424 C277.744,35.952 277.552,34.032 280.368,33.2 C281.52,32.816 281.968,31.472 281.072,30.704 C278.704,28.592 274.352,30.704 274.608,34.864 C274.928,39.6 275.248,37.488 271.984,39.024 C270.96,39.408 270.448,41.136 271.472,41.968 C272.816,42.928 284.528,41.776 284.784,40.048 Z M295.856,65.584 C301.936,63.536 303.536,56.688 302.192,54 L303.472,54 L303.472,48.752 L303.199782,48.7511481 C301.793206,48.7417643 300.064327,48.644898 293.936,47.984 C293.296,47.92 292.656,47.92 292.08,48.048 C290.928,48.304 290.608,48.944 290.992,50.096 C291.504,51.44 292.464,51.696 293.616,52.656 C294.96,53.744 297.84,56.048 296.816,58.096 C296.112,59.504 293.872,60.464 292.4,60.848 C288.368,61.744 277.36,61.168 277.168,55.536 C277.04,52.848 278.768,50.288 278.96,47.6 C279.024,46.512 278.576,46.064 277.808,45.552 C276.976,45.104 276.336,45.296 275.696,45.808 C272.56,48.624 270.576,52.848 271.92,57.008 C273.008,60.464 276.272,64.048 279.792,65.2 C283.952,66.608 291.696,66.928 295.856,65.584 Z M239.28,63.792 C234.992,64.368 236.272,70.064 243.12,68.784 C247.664,67.952 250.544,63.792 252.592,59.76 C255.088,54.896 256.432,35.888 251.248,35.312 C246.704,34.736 248.304,42.032 248.496,47.152 C248.752,53.744 247.216,62.704 239.28,63.792 Z M229.936,54 C232.176,54 231.792,48.24 231.984,44.528 C232.368,31.344 232.432,25.648 231.984,18.608 C231.92,16.816 231.28,16.176 229.744,15.856 C225.648,15.216 226.736,28.016 226.352,41.904 C226.16,48.368 225.456,54 229.936,54 Z M212.08,54 C220.4,54 220.272,46.768 218.864,38.96 C218.48,36.272 214.704,36.72 214.256,39.472 C214.192,40.048 214.192,40.56 214.256,41.136 C214.32,42.416 214.576,43.696 214.576,45.04 C214.576,49.264 210.096,48.752 208.496,48.752 C206.64,48.752 205.296,49.84 205.296,51.376 C205.296,52.912 207.152,54 208.56,54 L208.56,54 L212.08,54 Z M214.256,61.296 C215.984,65.712 222.064,61.424 219.248,58.352 C217.072,55.984 212.72,57.392 214.256,61.296 Z M200.176,52.272 L200.752,52.08 C202.288,53.104 205.04,54 208.496,54 L208.496,48.752 C206.512,48.752 205.36,47.536 205.36,45.68 C205.36,45.424 205.36,45.04 205.296,44.656 C204.848,33.776 186.672,24.624 175.92,39.472 C175.856,38.32 174.32,26.8 174.768,18.864 C175.024,14.192 168.624,14.704 169.072,20.976 C169.84,31.6 170.416,36.784 169.968,45.232 C169.84,47.152 170.224,47.6 168.24,47.28 C167.088,47.152 166,46.832 164.848,46.768 C163.952,46.64 162.928,46.512 162.096,46.768 C160.752,47.216 160.496,48.304 161.2,49.712 C161.776,50.928 162.8,51.568 164.08,51.76 C166.384,52.144 168.752,52.592 171.12,52.784 C181.488,53.36 190.064,55.472 200.176,52.272 Z M175.728,47.536 C180.272,38.256 194.352,34.096 198.512,44.016 C200.496,48.88 193.328,48.624 190.384,48.752 C184.24,49.008 177.392,47.984 175.728,47.536 Z M138.224,55.92 C140.72,54.192 141.616,50.736 141.616,47.856 C141.616,43.632 139.568,39.216 135.536,37.424 C134.384,36.912 133.104,36.656 131.824,36.592 C129.328,36.528 126.832,37.36 125.04,39.088 C123.44,40.752 122.288,42.672 121.776,44.848 C120.944,48.368 120.112,48.752 118.896,48.752 C116.848,48.752 115.696,49.648 115.696,51.376 C115.696,53.104 116.848,54 118.896,54 L119.664,54 C124.912,54 123.184,54.576 128.368,56.56 C130.928,57.52 135.856,57.456 138.224,55.92 Z M131.44,52.784 C120.56,50.608 129.52,36.08 134.128,43.44 C135.6,45.808 135.92,48.368 134.96,50.992 C134.32,52.592 133.104,53.168 131.44,52.784 Z M103.728,56.176 C112.368,56.176 110.448,54 114.736,54 L118.896,54 L118.896,54 L118.896,48.752 L115.12,48.752 C115.12,40.816 112.688,34.288 103.152,34.416 C100.4,34.48 98.224,35.824 96.432,37.872 C94.32,40.304 94.448,43.12 93.936,46.128 C93.68,47.664 92.656,48.752 91.056,48.752 L89.968,48.752 C87.856,48.752 86.768,49.648 86.768,51.376 C86.768,53.104 87.92,54 90.032,54 C91.376,54 93.232,53.872 94.256,53.04 C95.088,52.4 95.088,52.4 95.92,52.784 C98.288,53.872 98.8,56.176 103.728,56.176 Z M100.976,49.2 C96.816,45.04 102.384,36.912 106.352,41.008 C107.952,42.672 110.064,46.32 108.208,48.496 C106.928,49.904 102.64,50.928 100.976,49.2 Z M89.968,54 L89.968,48.752 C88.24,48.752 86.064,48.944 85.36,44.016 C84.272,36.464 85.808,21.552 85.232,18.16 C84.656,14.832 80.112,15.216 79.92,18.416 C79.792,19.632 79.856,20.528 79.408,41.264 C79.408,42.416 79.344,43.568 79.408,44.72 C80.048,54.512 87.92,54 89.968,54 Z M65.776,32.24 C69.296,29.232 68.4,27.376 71.856,31.6 C75.952,36.592 78.832,32.944 73.328,25.456 C65.072,14.32 52.272,44.016 65.776,32.24 Z M65.456,54 C73.776,54 73.648,46.768 72.24,38.96 C71.856,36.272 68.08,36.72 67.632,39.472 C67.568,40.048 67.568,40.56 67.632,41.136 C67.696,42.416 67.952,43.696 67.952,45.04 C67.952,49.264 63.472,48.752 61.872,48.752 C60.016,48.752 58.672,49.84 58.672,51.376 C58.672,52.912 60.528,54 61.936,54 L65.456,54 Z M43.888,63.344 C46.448,63.216 49.072,62.512 51.312,61.168 C53.296,59.952 55.792,57.84 56.88,55.792 C57.584,54.32 57.648,54 61.872,54 L61.872,48.752 L58.672,48.752 C57.968,41.584 59.376,25.584 57.712,17.968 C57.392,16.752 55.984,15.728 55.024,15.728 C53.872,15.792 52.784,16.688 52.464,18.032 C52.336,18.608 52.272,19.248 52.272,19.824 L52.2726805,20.1504263 C52.2827777,22.9527279 52.4027234,33.4818723 52.464,35.504 C52.464,38.064 52.464,40.624 52.4,43.184 C52.336,45.936 52.336,48.752 52.016,51.504 C51.824,52.848 50.928,54.64 50.032,55.664 C48.112,57.776 44.656,58.48 41.968,58.736 C39.088,58.992 35.888,57.904 33.968,55.664 C31.408,52.592 31.92,48.816 32.88,45.168 C33.392,43.44 33.84,40.88 31.472,40.432 C27.248,39.6 26.096,47.216 26.032,49.904 C25.968,52.592 27.632,55.984 29.296,57.904 C32.816,61.936 38.704,63.664 43.888,63.344 Z M0.432,52.784 C3.184,59.888 14.896,47.344 4.336,47.344 C1.84,47.344 0.24,49.264 0.304,52.016 L0.304,52.016 L0.432,52.784 Z M12.656,52.784 C15.408,59.888 27.12,47.344 16.56,47.344 C14.064,47.344 12.464,49.264 12.528,52.016 L12.528,52.016 L12.656,52.784 Z"
					      fill-rule="nonzero"></path>
				</g>
			</svg>
		</a>
	</footer>
@endsection