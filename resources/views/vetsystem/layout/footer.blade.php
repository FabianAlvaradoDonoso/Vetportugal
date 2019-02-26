
<!-- javascripts -->
<script src="{{asset('plantilla-plataforma/js/jquery.js')}}"></script>
<script src="{{asset('plantilla-plataforma/js/jquery-ui-1.10.4.min.js')}}"></script>
<script src="{{asset('plantilla-plataforma/js/jquery-1.8.3.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plantilla-plataforma/js/jquery-ui-1.9.2.custom.min.js')}}"></script>
<!-- bootstrap -->
<script src="{{asset('plantilla-plataforma/js/bootstrap.min.js')}}"></script>
<!-- nice scroll -->
<script src="{{asset('plantilla-plataforma/js/jquery.scrollTo.min.js')}}"></script>
<script src="{{asset('plantilla-plataforma/js/jquery.nicescroll.js')}}" type="text/javascript"></script>
<!-- charts scripts -->
<script src="{{asset('plantilla-plataforma/assets/jquery-knob/js/jquery.knob.js')}}"></script>
<script src="{{asset('plantilla-plataforma/js/jquery.sparkline.js')}}" type="text/javascript"></script>
<script src="{{asset('plantilla-plataforma/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js')}}"></script>
<script src="{{asset('plantilla-plataforma/js/owl.carousel.js')}}"></script>
<!-- jQuery full calendar -->
<<script src="{{asset('plantilla-plataforma/js/fullcalendar.min.js')}}"></script>
<!-- Full Google Calendar - Calendar -->
<script src="{{asset('plantilla-plataforma/assets/fullcalendar/fullcalendar/fullcalendar.js')}}"></script>
<!--script for this page only-->
<script src="{{asset('plantilla-plataforma/js/calendar-custom.js')}}"></script>
<script src="{{asset('plantilla-plataforma/js/jquery.rateit.min.js')}}"></script>
<!-- custom select -->
<script src="{{asset('plantilla-plataforma/js/jquery.customSelect.min.js')}}"></script>
<script src="{{asset('plantilla-plataforma/assets/chart-master/Chart.js')}}"></script>

<!--custome script for all page-->
<script src="{{asset('plantilla-plataforma/js/scripts.js')}}"></script>
<!-- custom script for this page-->
<script src="{{asset('plantilla-plataforma/js/sparkline-chart.js')}}"></script>
<script src="{{asset('plantilla-plataforma/js/easy-pie-chart.js')}}"></script>
<script src="{{asset('plantilla-plataforma/js/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('plantilla-plataforma/js/jquery-jvectormap-world-mill-en.js')}}"></script>
<script src="{{asset('plantilla-plataforma/js/xcharts.min.js')}}"></script>
<script src="{{asset('plantilla-plataforma/js/jquery.autosize.min.js')}}"></script>
<script src="{{asset('plantilla-plataforma/js/jquery.placeholder.min.js')}}"></script>
<script src="{{asset('plantilla-plataforma/js/gdp-data.js')}}"></script>
<script src="{{asset('plantilla-plataforma/js/morris.min.js')}}"></script>
<script src="{{asset('plantilla-plataforma/js/sparklines.js')}}"></script>
<script src="{{asset('plantilla-plataforma/js/charts.js')}}"></script>
<script src="{{asset('plantilla-plataforma/js/jquery.slimscroll.min.js')}}"></script>

<!-- DataTables -->

<script src={{asset('bower_components/datatables.net/js/jquery.dataTables.min.js')}}></script>
<script src={{asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}></script>

<!-- DATATABLES -->


<script>
    $(document).ready(function(){
        $("#name,#last_name").keyup(function(){
            var cadena = $("#name").val()+ ' ' + $("#last_name").val();
            string_to_slug(cadena);
        });
    });


    function string_to_slug (str) {
        str = str.replace(/^\s+|\s+$/g, '');
        str = str.toLowerCase();

        //quita acentos, cambia la ñ por n, etc
        var from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";
        var to   = "aaaaeeeeiiiioooouuuunc------";

        for (var i=0, l=from.length ; i<l ; i++) {
            str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
        }

        str = str.replace(/[^a-z0-9 -]/g, '') // quita caracteres invalidos
            .replace(/\s+/g, '-') // reemplaza los espacios por -
            .replace(/-+/g, '-'); // quita las plecas

        return $("#slug").val(str);
    }﻿

</script>



<script>
    //knob
    $(function() {
        $(".knob").knob({
            'draw': function() {
                $(this.i).val(this.cv + '%')
            }
        })
    });

    //carousel
    $(document).ready(function() {
        $("#owl-slider").owlCarousel({
            navigation: true,
            slideSpeed: 300,
            paginationSpeed: 400,
            singleItem: true

        });
    });

    //custom select box

    $(function() {
        $('select.styled').customSelect();
    });

    /* ---------- Map ---------- */
    $(function() {
        $('#map').vectorMap({
            map: 'world_mill_en',
            series: {
                regions: [{
                    values: gdpData,
                    scale: ['#000', '#000'],
                    normalizeFunction: 'polynomial'
                }]
            },
            backgroundColor: '#eef3f7',
            onLabelShow: function(e, el, code) {
                el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
            }
        });
    });
</script>


