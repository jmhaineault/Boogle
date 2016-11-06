function initMap() {
    var uluru = {
        lat: 36.25512, lng: -115.2383485
    };
    var map = new google.maps.Map(document.getElementById('map_canvas'), {
        zoom: 7,
        center: uluru,
        styles: [
            {elementType: 'geometry', stylers: [{color: '#f8f8f8'}]},//tierra #
            {elementType: 'labels.text.stroke', stylers: [{color: '#242f3e'}]},
            {elementType: 'labels.text.fill', stylers: [{color: '#FFD700'}]},
            {
            featureType: 'administrative.locality',
            elementType: 'labels.text.fill',
            stylers: [{color: '#FFFFFF'}]
            },
            {
            featureType: 'poi',
            elementType: 'labels.text.fill',
            stylers: [{color: '#FFD700'}]
            },
            {
            featureType: 'poi.park',
            elementType: 'geometry',
            stylers: [{color: '#F1F1F1'}]//parkes
            },
            {
            featureType: 'poi.park',
            elementType: 'labels.text.fill',
            stylers: [{color: '#FFD700'}]
            },
            {
            featureType: 'road',
            elementType: 'geometry',
            stylers: [{color: '#33CC99'}]
            },
            {
            featureType: 'road',
            elementType: 'geometry.stroke',
            stylers: [{color: '#FFD700'}]
            },
            {
            featureType: 'road',
            elementType: 'labels.text.fill',
            stylers: [{color: '#FFD700'}]
            },
            {
            featureType: 'road.highway',
            elementType: 'geometry',
            stylers: [{color: '#33CC99'}]
            },
            {
            featureType: 'road.highway',
            elementType: 'geometry.stroke',
            stylers: [{color: '#33CC99'}]
            },
            {
            featureType: 'road.highway',
            elementType: 'labels.text.fill',
            stylers: [{color: '#33CC99'}]
            },
            {
            featureType: 'transit',
            elementType: 'geometry',
            stylers: [{color: '#33CC99'}]
            },
            {
            featureType: 'transit.station',
            elementType: 'labels.text.fill',
            stylers: [{color: '#d59563'}]
            },
            {
            featureType: 'water',
            elementType: 'geometry',
            stylers: [{color: '#000000'}]//#C5F3FF
            },
            {
            featureType: 'water',
            elementType: 'labels.text.fill',
            stylers: [{color: '#9DEBFF'}]
            },
            {
            featureType: 'water',
            elementType: 'labels.text.stroke',
            stylers: [{color: '#17263c'}]
            }
        ]
    });
    var locations = [];
    locations.push({name:"California",latlng: new google.maps.LatLng(36.778261,-119.417924)});
    locations.push({name:"Las Vegas",latlng: new google.maps.LatLng(36.255123,-115.2383485)});
    
    for(var i = 0; i<locations.length; i++){
        var marker = new google.maps.Marker({
            animation: google.maps.Animation.DROP,
            position: locations[i].latlng,
            map:map,
            title: locations[i].name,
            icon: 'http://www.googlemapsmarkers.com/v1/*/FFD700/'
        
        });
        
        var contentString = '<div id="'+locations[i].name+'s" style="border-color: red">'+
        '<div id="siteNotice">'+
        '</div>'+
        '<h1 id="firstHeading" class="firstHeading">'+ locations[i].name +'</h1>'+
        '<div id="bodyContent">'+
        '<p><b>'+ locations[i].name +'</b>'+
        '<p>'+ locations.length +
        ' elements in the locations array</p>'+
        '</div>'+
        '</div>';					
            createInfoWindow(marker, contentString);					 
    }				
    var infoWindow = new google.maps.InfoWindow();
    function createInfoWindow(marker, contentString) {
        google.maps.event.addListener(marker, 'click', function () {
            infoWindow.setContent(contentString);
            infoWindow.open(map, this);
        });
    }			
}			
google.maps.event.addDomListener(window, "load", initMap);		