@if (Session::has('sukses'))
<div class="col-md-6">
    <div id="alert" class="alert alert-success" style="width: 300px; right: 36px; top: 60px; cursor: auto; opacity: 1; position: fixed; z-index: 1060; display: block !important; transition: visibility 0s 2s, opacity 2s linear;">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        <span class="fa fa-check"></span> <strong>Sukses</strong>
        <p>
        {{ Session::get('sukses') }}</p>
    </div>
</div>
@elseif (Session::has('gagal'))
<div class="col-md-6">
    <div id="alert" class="alert alert-danger" style="width: 300px; right: 36px; top: 60px; cursor: auto; opacity: 1; position: fixed; z-index: 1060; display: block !important; transition: visibility 0s 2s, opacity 2s linear;">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        <span class="fa fa-times"></span> <strong>Terjadi Kesalahan</strong>
        <p>
        {{ Session::get('gagal') }}</p>
    </div>
</div>
@endif
