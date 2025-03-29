<div class="modal fade" id="ModalDetailChat" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="javascript:void(0);" id="ProsesBalasChat">
                <input type="hidden" name="id_akses" id="PutIdAkses">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-light">
                        <i class="bi bi-chat"></i> Detail Chat
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12" style="height: 350px; overflow-y: scroll;" id="isiChat">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3 mt-3">
                            <div class="input-group">
                                <input type="text" class="form-control" name="pesan" id="pesan" placeholder="Isi  Pesan">
                                <button type="submit" class="btn btn-primary"  id="TombolKirim">
                                    <i class="bi bi-send-check-fill"></i> Kirim
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-primary">
                    <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle"></i> Tutup
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>