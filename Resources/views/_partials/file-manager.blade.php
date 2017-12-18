<div id="file-manager-modal" class="modal fade" role="dialog">
    <div class="modal-dialog" style="width:80%; height: 600px;">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Media manager</h4>
            </div>
            <div class="modal-body">
                <iframe src="/admin/media/packages/filemanager?target=callback&type=file" frameborder="0" style="width: 100%; height: 600px;"></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            <input type="hidden" value="" class="js-media-url" id="js-media-url">
        </div>

    </div>
</div>