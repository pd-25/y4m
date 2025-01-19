<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$seo->meta_title ?? 'YesAmerica'}}</title>
    <meta name="description" content="{{$seo->meta_description ?? 'yesAmerica'}}">
    {{$seo->hederscript ?? ''}}
    @include('frontend.layout.partials.header-docs')
</head>

<body>
    <!-- ========= header area starts ========== -->
    @include('frontend.layout.partials.header')

    
    <!-- ========= header area end ========== -->

    @yield('content')


    <!-- ========= footer area starts ========== -->
    @include('frontend.layout.partials.footer')


    <!-- ========= footer area end ========== -->

    @yield('script')
</body>

</html>