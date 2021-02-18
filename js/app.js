$(".btn").on('click', function() {

    var id = $(this).attr('id');

    window.location.assign("documentos/id/" + id);

});