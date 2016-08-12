jQuery(document).ready(function($){

    //add the archived option in the select form
    var archivedDiv = '<option value="archive" '+archive.isSelected+'>'+archive.localizedName+'</option>';
    $('select#post_status').append(archivedDiv);


    //if the post is not archived, show the "Archive" button near the Publish one
    if (!archive.isSelected) {
        var archiveButton = '<div><button class="button button-large" id="archive">'+archive.archiveAction+'</button></div>';
        $('#major-publishing-actions').append(archiveButton);
        $('#archive').on('click', function(e) {
            $('select[name="post_status"]').val('archive');
            $('#publish').click();
            e.preventDefault();
        });
    }


    //if the post is archived, show the proper label and change "publish" to "republish"
    if (archive.isSelected) {
        $('#post-status-display').html(archive.localizedName);
        $('#publishing-action input[type="submit"]').attr('value', archive.republishLabel);
    }
});
