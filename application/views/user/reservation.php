<section class="slice slice-lg">
    <link type="text/css" href="<?= base_url('assets/css/style.css')?>" rel="stylesheet">
    <div class="container">
<form id="example-advanced-form" action="#">
    <h3 class="heading h3">S&K</h3>
    <fieldset>
        <legend>Syarat dan Ketentuan</legend>
 <ul>
        <li>Jadwal Tour setiap hari.</li>
<li>Sehat jasmani dan rohani. </li>
<li>Tidak membawa minuman keras, alkohol, narkotika, senjata tajam, alat kontrasepsi, dan segala hal yang berhubungan dengan tindak pidana maupun perdata di bawah hukum Pemerintah Indonesia. </li>
<li>Jadwal harus menyesuaikan trip Titan Travel. Kesalahan pemilihan penerbangan berdampak adanya biaya tambahan dan pemotongan spot wisata. </li>
<li>Apabila terjadi Force Majeur (kondisi diluar kendali seperti, kehilangan, kerusakan, gangguan, keterlambatan sarana transportasi, bencana alam, dll) yang dapat mempengaruhi acara tour akan diubah dan bersifat non-refundable (tidak dapat dikembalikan). Biaya tour tidak termasuk segala pengeluaran tambahan yang disebabkan force majeur. </li>
<li>Titan Travel tidak bertanggung jawab atas kehilangan, kerusakan, gangguan, dan kelalaian peserta.</li> 
<li>Titan Travel berhak membatalkan trip dengan pertimbangan tertentu diluar kemampuan Titan Travel, DP akan dikembalikan 100%. </li>
<li>Jika salah satu peserta menghilangkan atau merusakan alat-alat dan fasilitas Tour, maka seluruh peserta dalam rombongan wajib patungan mengganti sesuai nominal harga alat tersebut. </li>
<li> Seluruh peserta wajib mematuhi aturan tertulis dan tidak tertulis dari Titan Travel serta arahan yang diberikan tour leader. </li>
</ul>
    </fieldset>
 
    <h3>PENDAFTARAN</h3>
    <fieldset>
        <legend>Pendaftran</legend>
 
        <label for="name-2">Nama Lengkap</label>
        <input id="name-2" name="name" type="text" class="required">
        <label>No Hp</label>
        <input name="nohp" type="number" class="required">
        <label>Jumlah Peserta</label>
        <input name="Jumlah" type="number" class="required">
        <label>Upload Foto KTP</label>
        <input name="ktp" type="file">
        <label>Jadwal Trip</label>
        <input name="jadwal" type="date" class="required">
    </fieldset>
 
    <h3>Pembayaran</h3>
    <fieldset>
        <legend>Tata Cara Pembayaran</legend>
 
        <p>trf</p>
    </fieldset>
 
    <h3>Konfirmasi Pembayarab</h3>
    <fieldset>
        <legend>Konfirmasi Pembayaran</legend>
  <label>Upload Bukti Trf</label>
        <input name="trf" type="file">
    </fieldset>
</form>
</div>
</section>
<script>
    var form = $("#example-advanced-form").show();
 
form.steps({
    headerTag: "h3",
    bodyTag: "fieldset",
    enableAllSteps: true,
    transitionEffect: "slideLeft",
});
</script>



