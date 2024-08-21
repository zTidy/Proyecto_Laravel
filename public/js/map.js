async function inicializarMapa() {
    const { Map } = await google.maps.importLibrary("maps");
    const { AdvancedMarkerElement} = await google.maps.importLibrary("marker");

    const position = { lat: 31.6271242, lng: -106.3827526 }

    const mapa = new Map(document.getElementById('mapa'),{
      center: position,
      zoom: 20,
    });

    const marker = new AdvancedMarkerElement({
      mapa,
      position: position,
      title: 'TECHNOLAB',
    });
}

inicializarMapa();
