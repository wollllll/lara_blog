<div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="delete_modal_label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="modal_post_title" class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>記事を削除しますか？</p>
            </div>
            <div class="modal-footer">
                <form id="delete_route" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                    <input type="submit" class="btn btn-danger" value="削除">
                </form>
            </div>
        </div>
    </div>
</div>
