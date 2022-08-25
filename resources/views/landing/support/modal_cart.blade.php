<div class="modal fade bd-example-modal-lg" id="modal-cart" tabindex="1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Keranjang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('cart.add') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-input text-center">
                        <img src="" id="imagepreview" style="max-width:200px;
                        max-height:auto;">
                    </div>
                    <div class="row mt-2">
                        <div class="col-sm-12">
                            <label for="" id="nama_pesanan">Nama Pesanan : <span></span></label>
                        </div>

                    </div>
                    <input type="hidden" name="detail_wisata_id" id="detail_wisata_id" value="">
                    <div class="form-input">
                        <label for="">Tanggal Check In dan Check Out</label>
                        <input type="text" class="form-control" id="inputdate" name="startend">
                    </div>
                    <div class="form-input">
                        <label for="">Jumlah Pack</label>
                        <input type="number" placeholder="Pack/Orang" class="form-control" name="pack">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Masukan Keranjang</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" id="modal-cart-paket" tabindex="1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Keranjang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('cartpaket.add') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-input text-center">
                        <img src="" id="imagepreview" style="max-width:200px;
                        max-height:auto;">
                    </div>
                    <div class="row mt-2">
                        <div class="col-sm-12">
                            <label for="" id="nama_paket">Nama Paket : <span></span></label>
                        </div>
                    </div>
                    <div class="form-input">
                        <label for="">Tanggal Check In</label>
                        <input type="text" class="form-control" id="inputdate2" name="startend">
                    </div>
                    <div class="form-input">
                        <label for="">Jumlah Pack</label>
                        <input type="number" placeholder="Pack/Orang" class="form-control" name="pack">
                    </div>
                    <div class="row mt-2">
                        <div class="col-sm-12">
                            <label for="" id="">Detail pemesanan <span></span></label>
                        </div>

                    </div>
                    <input type="hidden" name="paket_wisata_id" id="paket_wisata_id" value="">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table_paket">
                                <thead>
                                    <th>Nama Detail</th>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Masukan Keranjang</button>
                </div>
        </div>
        </form>
    </div>
</div>
</div>

<div class="modal fade bd-example-modal-lg" id="payment" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('pembayaran.user') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="alert alert-primary" role="alert">
                        Silahkan Lakukan Pembayaran Senilai <span></span> Melalui Rekening BCA 043212312 an Gampong Nusa
                        dan Upload Bukti Pembayaran, Terima Kasih
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Bukti Pembayaran</label>
                        <input class="form-control" type="file" name="file" id="formFile">
                    </div>
                    <input type="hidden" name="pemesanan_id" id="id">

                    <div class="row mt-2">
                        <div class="col-sm-12">
                            <label for="" id="waktu_pemesanan">Waktu Pemesanan : <span></span></label>
                        </div>
                        <div class="col-sm-12">
                            <label for="" id="nama_user">Nama User : <span></span></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table" id="pemesanan">
                                <thead>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Pack</th>
                                    <th>Harga</th>
                                    <th>Sub Total</th>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                            <table class="table">
                                <thead>
                                    <th></th>
                                    <th>Total :</th>
                                    <th id="total"></th>
                                </thead>
                            </table>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Bayar</button>
                </div>
            </form>
        </div>
    </div>
</div>