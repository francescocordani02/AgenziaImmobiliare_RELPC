var map;
var geocoder;

function loadMap() {
    var cdata = JSON.parse(document.getElementById('data').innerHTML);
    geocoder = new google.maps.Geocoder();
    codeAddress(cdata);

    var allData = JSON.parse(document.getElementById('allData').innerHTML);

    var pune = { lat: parseFloat(allData[0].Latitudine), lng: parseFloat(allData[0].Longitudine) };
    map = new google.maps.Map(document.getElementById('map'), {
        zoom: 12,
        center: pune
    });

    showAllColleges(allData);
}

function showAllColleges(allData) {
    var infoWind = new google.maps.InfoWindow;
    Array.prototype.forEach.call(allData, function(data) {
        var content = document.createElement('div');
        content.id = "divover";

        var contentleft = document.createElement('div');
        contentleft.id = "divleft";
        content.appendChild(contentleft);

        var contentright = document.createElement('div');
        contentright.id = "divright";
        content.appendChild(contentright);

        var img = document.createElement('img');
        img.src = data.Immagine;
        img.style.width = '100px';
        contentleft.appendChild(img);

        var strongNomeApp = document.createElement('strong');
        strongNomeApp.textContent = data.NomeApp;
        contentright.appendChild(strongNomeApp);

        var pIndirizzoZona = document.createElement('p');
        pIndirizzoZona.innerHTML = "<b>Quartiere:</b> " + data.Nome + "\n<b>Indirizzo:</b> " + data.Indirizzo;
        contentright.appendChild(pIndirizzoZona);

        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(data.Latitudine, data.Longitudine),
            map: map
        });

        marker.addListener('mouseover', function() {
            infoWind.setContent(content);
            infoWind.open(map, marker);
        })
    })
}

function codeAddress(cdata) {
    Array.prototype.forEach.call(cdata, function(data) {
        var indirizzo = data.Indirizzo;
        geocoder.geocode({ 'address': indirizzo }, function(results, status) {
            if (status == 'OK') {
                map.setCenter(results[0].geometry.location);
                var points = {};
                points.id = data.id;
                points.lat = map.getCenter().lat();
                points.lng = map.getCenter().lng();
                updateCollegeWithLatLng(points);
            } else {
                alert('Geocode was not successful for the following reason: ' + status);
            }
        });
    });
}