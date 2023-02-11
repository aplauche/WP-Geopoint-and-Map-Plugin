import apiFetch from '@wordpress/api-fetch';

document.addEventListener("DOMContentLoaded", async function() {

  if(document.querySelector('#map')){

    const points = await apiFetch( { path: '/wp/v2/geopoint' } )
  
    var map = L.map('map').setView([points[0].meta.fsd_lat, points[0].meta.fsd_lng], 4);
  
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);
  
    points.forEach(point => {
      var marker = L.marker([point.meta.fsd_lat, point.meta.fsd_lng]).addTo(map);
      marker.bindPopup(`
        <p><strong>${point.title.rendered}</strong></p>
        <a href="${point.link}">View Point Details</a>
      `)
    });

  }

});