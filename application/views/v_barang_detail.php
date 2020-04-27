<script>
function printContent(el){
    var restorepage = document.body.innerHTML;
    var printcontent = document.getElementById(el).innerHTML;
    document.body.innerHTML = printcontent;
    window.print();
    document.body.innerHTML = restorepage;
}
</script>
<div id="div1" class="content-wrapper">
    <section class="content">
        <h4><strong>&emsp;DETAIL BARANG  GANESHA OPERATION&emsp;&emsp;<i class="fas fa-school"></i></strong></h4>
        <table class="table">
            <tr>
                <th>Nama Barang</th>
                <td><?php echo $detail->barang_nama ?></td>
            </tr>
            <tr>
                <th>Jumlah Barang</th>
                <td><?php echo $detail->barang_jumlah ?></td>
            </tr>
            <tr>
                <th>Harga Barang</th>
                <td><?php echo $detail->barang_harga ?></td>
            </tr>
            <tr>
                <th>Kode Cabang</th>
                <td><?php echo $detail->kode_cabang ?></td>
            </tr>
            <tr>
                <th></th>
                <td><?php echo $detail->barang_tanggal ?></td>
            </tr>
            <tr>
                <th>Mengetahui dan Disetujui</th><th></th>
            </tr>
        </table>
        <p class="big">
        &emsp;Kepala Cabang &emsp;&emsp;&emsp;&emsp; Divisi Keuangan Pusat
        </p>
    </section>
</div>
<div class="container">
<a class="btn btn-warning" onclick="printContent('div1')" <i class="fa fa-print"></i>Print</a>
</div>