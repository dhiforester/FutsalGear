<div class="modal fade" id="ModalHapusItemKeranjang" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form action="javascript:void(0);" id="ProsesHapusItemKeranjang">
                <input type="hidden" name="id_rincian" id="PutIdRincianForDelete">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <img src="img/delete.gif" alt="" width="100%">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center text-danger mb-3" id="NotifikasiHapusItemKeranjang">
                            <small class="text-dark">Apakah anda yakin akan menghapus item ini dari keranjang?</small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-send"></i> Ya, Hapus
                    </button>
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">
                        <i class="bi bi-x"></i> Tutup
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>