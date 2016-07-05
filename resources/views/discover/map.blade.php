@extends('template')

@section('title', 'homepage')


@section('body')
    <h3 class="fix-middle">To add an event to the map and the calendar &nbsp; <a class="btn btn-warning" role="button" id="add_event" href="{{url('discover/add')}}"><i class="fa fa-plus-square" aria-hidden="true"></i>&nbsp;Add Event to RYMN</a></h3><br>
    <div id="hold">
        <div id="map" class="mapstuff"></div>
    </div>

@endsection

@section('js')
    <script>
        var map;
        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: {lat:54.1361, lng: -1.5238},
                zoom: 10
            });
            var place_array = <?php echo json_encode($events) ?>;
            var marker;
            var infowindow = new google.maps.InfoWindow();
            for (i = 0; i < place_array.length; i++) {
                console.log(place_array[i]);
                var obj = place_array[i];
                event_str = obj.name;
                addr_str = obj.address;
                date_str = obj.datetime;
                descr_str = obj.concert_details;
                lati = obj.lati;
                lngi = obj.lngi;
                ensemble = obj.ensemble;
                contentString =
                        '<div id="holder">'+
                            '<h3 class="boldme">Event name:' + event_str +'</h3>'+
                            '<h4 class="boldme">(Ensemble:' + ensemble + ')</h4>'+
                            '<hr width="60%">'+
                            '<h4 class="boldme">Event Location:</h4>'+
                            '<p>'+ addr_str +'</p>'+
                            '<h4 class="boldme">Event date & time:</h4>'+
                            '<p>'+ date_str +'</p>'+
                            '<h4 class="boldme">Event Description</h4>'+
                            '<p>'+ descr_str +'</p>'+
                        '</div>';
                var coords = {};
                var title = obj.name;
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(lati,lngi),
                    map: map,
                    title: title
                });
//                google.maps.event.addListener(marker, 'click', (function(marker, i) {
//                    return function() {
//                        infowindow.setContent(contentString);
//                        infowindow.open(map, marker);
//                    }
//                })(marker, i));
                bindInfoWindow(marker, map, infowindow, contentString);
            }


        }
        function bindInfoWindow(marker, map, infowindow, content) {
            marker.addListener('click', function() {
                infowindow.setContent(content);
                infowindow.open(map, this);
            });
        }


    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB4tMgvWE8XQ_jirYRxItoxv4TVow3x-rE&callback=initMap"></script>
@endsection