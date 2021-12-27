
<!DOCTYPE html>
<html lang="en">

  @include('layouts.head')

<body>

 @include('layouts.loader')

  @include('layouts.header')

  @yield('content')
  @auth
  <div class="pubble-app" data-app-id="105710" data-app-identifier="105710"></div>
  @endauth


  @include('layouts.footer')


 @include('layouts.scripts')
 @yield('script')

</body>

</html>
