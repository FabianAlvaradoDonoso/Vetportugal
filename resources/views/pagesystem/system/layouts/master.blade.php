@include('pagesystem.system.layouts.header')
<!--main content start-->
@yield('content')
</div> {{--div class="page" --}}
@include('pagesystem.system.layouts.footer')
@yield('scripts')
</body>

<!-- Script para sistema de reservas -->
<script src="{{asset('vetportugal/js/reserva.js')}}"></script>

</html>
