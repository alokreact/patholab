<!DOCTYPE html>
<html lang="en">
 <head>
   @include('Front-end.layout.partials.head')
 </head>
 <body>

  @include('Front-end.layout.partials.header')
 

  @yield('content')

   
@include('Front-end.layout.partials.footer')
 
 </body>
</html>
