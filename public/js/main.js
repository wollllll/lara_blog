let post = {
    dom: {
        deleteBtn: $('.delete-btn'),
    },
    modules: {
        _showDeleteModal: function (e) {
            const target = $(e.target);

            $('#modal_post_title').text(target.data('post-title'));
            $('#delete_route').attr('action', target.data('post-route'));
        }
    },
    init: function () {
        post.dom.deleteBtn.on('click', post.modules._showDeleteModal);
    }
};

$(function () {
    post.init();
});
