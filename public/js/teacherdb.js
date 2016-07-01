var $modal = $('.modal').modal({
    show: false
});
$('.my-div').on('click', function() {
    $modal.modal('show');
});
