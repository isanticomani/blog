<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <title> @yield('title','Default') | Panel de administracion</title>
    <!-- <link rel="stylesheet" href="{{ asset('css/admin.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}" >
    <link rel="stylesheet" href="{{ asset('plugins/chosen/chosen.css') }} ">
    <link rel="stylesheet" href="{{ asset('plugins/trumbowyg/ui/trumbowyg.css') }}">
  </head>

  <body>
    @include('admin.template.partials.nav')
    <section>
      @include('flash::message')
      @include('admin.template.partials.errors')
      @yield('content')
    </section>

    <script src="{{ asset('plugins/jquery/js/jquery-3.2.1.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>
    <script src="{{ asset('plugins/chosen/chosen.jquery.js') }}"></script>
    <script src="{{ asset('plugins/trumbowyg/trumbowyg.js') }}"></script>

    @yield('js')

  </body>
</html>
