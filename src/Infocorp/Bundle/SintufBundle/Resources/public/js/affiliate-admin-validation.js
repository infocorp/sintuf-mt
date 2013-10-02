$('.sonata-collection-add').on('click', function() {
  if ($('div.sonata-collection-row').length >= 5) {
    alert('São permitidos no máximo 5 dependentes por afiliado');
    return false;
  }
});