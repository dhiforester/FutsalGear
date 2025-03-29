<div class="modal fade" id="ModalChatAdmin" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="javascript:void(0);" id="ProsesKirimPesanAdmin">
                <div class="modal-header">
                    <h5 class="modal-title">Kirim Chat Ke Admin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="pesan"><b>Isi Pesan Disini</b></label>
                            <textarea name="pesan" id="pesan" cols="30" rows="10" class="form-control"></textarea>
                            <small id="NotifikasiKirimChatAdmin">
                                <span class="text-dark">Maksimal pesan 200 karakter</span>
                            </small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="bi bi-send"></i> Kirim
                            </button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="bi bi-x"></i> Tutup
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>