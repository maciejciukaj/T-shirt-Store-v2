var coordinates = new google.maps.LatLng(40.75277029897641, -73.99491646517467);
var mapOptions = {
  zoom: 16,
  center: coordinates,
  mapTypeId: google.maps.MapTypeId.ROADMAP,
};
var mapa = new google.maps.Map(document.getElementById("map"), mapOptions);

function setNewLocation(x, y) {
  coordinates = new google.maps.LatLng(x, y);
  mapOptions.center = coordinates;
  mapa = new google.maps.Map(document.getElementById("map"), mapOptions);
}

document.getElementById("toronto").addEventListener("click", function () {
  setNewLocation(43.652283647092226, -79.38078446030731);
});
document.getElementById("warsaw").addEventListener("click", function () {
  setNewLocation(52.23550678677814, 21.00874628751167);
});
document.getElementById("tokio").addEventListener("click", function () {
  setNewLocation(35.65508283625224, 139.70963280381986);
});
document.getElementById("los_angeles").addEventListener("click", function () {
  setNewLocation(33.99554139127235, -118.30968456912674);
});
