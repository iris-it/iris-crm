export default function (data) {
    return `<div class="modal fade" tabindex="-1" role="dialog" id="${data.modal_id}">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content" style="min-width:1024px;margin-auto;">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">${data.modal_title}</h4>
                        </div>
                        <div class="modal-body">
                            ${data.modal_body}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal" id="${data.modal_close_id}">${data.modal_close_title}</button>
                            <button type="button" class="btn btn-primary" id="${data.modal_validate_id}">${data.modal_validate_title}</button>
                        </div>
                    </div>
                </div>
            </div>
            `;
}