@include('partials._header')
<!--main Website-->
<main class="container-fluid pr-0 pl-0">
    <!--make menu-->
    @include('partials._menu')
    <!--end make menu-->
    <!--make slider-->
    @include('partials._slider')
    <!--end make slider-->
    <!--make about-->
    @include('partials._about')
    <!--end make about-->
    <!--make Gallery-->
    @include('partials._gallery')
    <!--end make Gallery-->
    <!--make contact-->
    @include('partials._contact')
    <!--end make contact-->
    <!--make footer-->
    @include('partials._footerMain')
    <!-- end make footer-->
</main>
<!--end main Website-->

@include('partials._footer')
