@include('frontend.include.header_script')
@include('frontend.page.layouts.partials.header')

<main>
    @yield('content')
</main>

@include('frontend.layouts.partials.footer')
@include('frontend.include.footer_script')
