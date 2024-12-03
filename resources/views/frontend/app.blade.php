@php
$settings = \App\Models\Setting::first();
@endphp
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1 , maximum-scale=1" />
    <title>@yield('title')</title>
      <!-- FAVICON -->
      <link rel="shortcut icon" type="image/x-icon" href="{{ asset($settings->favicon ?? 'frontend/assets/images/logo.jpg' ) }}" />

    <!-- ==== All Css Links ==== -->
    @include('frontend.partials.style')

  </head>
  <body>
    @include('frontend.partials.header')

    <!-- header area ends -->

    <!-- main area starts -->

    @yield('content')

    <!-- main area ends -->

    <!-- footer area starts -->

    @include('frontend.partials.footer')

    <!-- footer area ends -->

    <!-- ==== All Js Links ==== -->

    @include('frontend.partials.script')

  </body>
</html>
