<html lang="en">

    @include('layouts.head')
    
    <body class="bg-dark_gray main-scroll {{session('menu_open') ? 'menu_open' : ''}}">
        
        @include('layouts.header')
        
        <div id="main-content">
            @yield('content')
        </div>
        
        @include('layouts.footer')

    </body>

</html>