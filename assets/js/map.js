// Inisialisasi peta
function initMap() {
  // Koordinat lokasi Anda
  var myLatLng = { lat: -6.2088, lng: 106.8456 };

  // Buat objek peta baru
  var map = new google.maps.Map(document.getElementById("map"), {
    center: myLatLng, // Atur pusat peta
    zoom: 15, // Atur level zoom
  });

  // Tambahkan marker ke lokasi Anda
  var marker = new google.maps.Marker({
    position: myLatLng,
    map: map,
    title: "Lokasi Kami",
  });
}
