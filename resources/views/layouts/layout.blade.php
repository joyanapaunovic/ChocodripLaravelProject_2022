<!DOCTYPE html>
<html>
    {{-- HEAD --}}
    @include('fixed.head')
    <body>
    <div class="main_body_content">

        <div class="hero_area">
            @yield('admin-nav')
        {{-- HEADER --}}
        @include("fixed.header")
        {{-- CONTENT --}}
        @yield("content")
        {{-- FOOTER --}}
        @include("fixed.footer")
        {{-- SCRIPTS --}}
        @include("fixed.scripts")
        </div>
    </div>
    </body>
</html>
