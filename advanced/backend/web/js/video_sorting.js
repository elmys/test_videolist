/**
 * Created by elmys on 06.05.2017 006 .
 */
$( function() {
    $('.btn-edit').click(function () {
        $.ajax({
            url: "/playlist/update?id="+$(this).attr('id'),
        }).done(function(result) {
            $('.edit-modal').modal();
            $('.edit-modal .modal-content').html(result);
        });
    });

    $('.btn-create').click(function () {
        $.ajax({
            url: "/playlist/create",
        }).done(function(result) {
            $('.edit-modal').modal();
            $('.edit-modal .modal-content').html(result);
        });
    });
    
    $('.video-link').click(function () {
        $.ajax({
            url: "/playlist/preview?id="+$(this).attr('videoId'),
        }).done(function(result) {
            $('.preview-modal').modal();
            $('.preview-modal .modal-content').html(result);
        });
    });

    $( "#w0" ).sortable({
        update: function( event, ui ) {
            sorts = [];
            $.each($("#w0 .list-item"), function(index, event) {
                var sort = {};
                sort.num = index;
                sort.id = parseInt($(this).parent().attr("data-key"));
                sorts.push(sort);
            });
            $.post("/playlist/savesort", {sorts: sorts}, function(data){});
            //console.log(sorts);
        }
    });
} );
