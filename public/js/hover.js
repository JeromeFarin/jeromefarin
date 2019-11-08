$('.infos').mouseover(function() {
    var elt = this.getAttribute('id');
    $('.'+elt).show();
});
$('.infos').mouseout(function() {
    var elt = this.getAttribute('id');
    $('.'+elt).hide();
})