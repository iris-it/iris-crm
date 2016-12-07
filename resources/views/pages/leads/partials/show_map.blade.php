<strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

<div id="map_container" style="height: 250px;"></div>


@section('scripts')
    @parent

    <script type="text/javascript">
        var offices = [];
        var bounds = [];

        @foreach($lead->offices as $office)
        @foreach($office->addresses as $address)
        offices.push({
            'name': '{!! $office->name !!}',
            'type': '{!! $address->pivot->type !!}',
            'lat': '{!! $address->lat !!}',
            'lng': '{!! $address->lng !!}',
        });

        bounds.push(['{!! $address->lat !!}', '{!! $address->lng !!}']);
            @endforeach
            @endforeach

        var markers = L.markerClusterGroup();
        var map_container = L.map('map_container', {
            layers: [L.tileLayer('http://{s}.tile.openstreetmap.se/hydda/full/{z}/{x}/{y}.png')],
            center: [51.505, -0.09],
            zoomControl: false,
            zoom: 13
        });

        for (var i = 0; i < offices.length; i++) {
            var title = offices[i]['name'] + ': ' + offices[i]['type'];
            var marker = L.marker(L.latLng(offices[i]['lat'], offices[i]['lng']), {title: title});
            marker.bindPopup(title);
            markers.addLayer(marker);
        }

        map_container.addLayer(markers);
        map_container.fitBounds(bounds);

    </script>
@endsection
