<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone=no">
	
	<link href="{{ asset('themes/theme1') }}/vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
	<link href="{{ asset('themes/theme1') }}/vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
	<link href="{{ asset('themes/theme1') }}/vendor/nouislider/nouislider.min.css" rel="stylesheet">
    <link href="{{ asset('themes/theme1') }}/css/style.css" rel="stylesheet">
    <link href="{{ asset('themes/theme1') }}/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
	{{ $head }}
</head>
<body>

    <div id="preloader">
		<div class="lds-ripple">
			<div></div>
			<div></div>
		</div>
    </div>


    <div id="main-wrapper">
        <div class="nav-header">
            <a href="{{ route('dashboard') }}" class="brand-logo">
				<img src="{{ asset('images/logo/dummy.png') }}" alt="logo" width="180px">
            </a>
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>

        @relativeInclude('header')
        @relativeInclude('sidebar')
        
        <div class="content-body">
            @relativeInclude('header.alert')
			{{ $slot }}
        </div>
        

	</div>
    
    @relativeInclude('js')


	

</body>
</html>