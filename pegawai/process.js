function search(){
    // $("#loading").show(); // Tampilkan loadingnya

    $.ajax({
        type: "POST", // Method pengiriman data bisa dengan GET atau POST
        url: "search.php", // Isi dengan url/path file php yang dituju
        data: {tipe : $("#tipe").val()}, // data yang akan dikirim ke file proses
        dataType: "json",
        beforeSend: function(e) {
            if(e && e.overrideMimeType) {
                e.overrideMimeType("application/json;charset=UTF-8");
            }
        },
        success: function(response){ // Ketika proses pengiriman berhasil
            // $("#loading").show(); // Sembunyikan loadingnya

            if(response.status == "success"){ // Jika isi dari array status adalah success
                $("#merk").val(response.merk); // set textbox dengan id nama
                $("#jenis_model").val(response.jenis_model); // set textbox dengan id jenis kelamin
                $("#tahun_p").val(response.tahun_p); // set textbox dengan id telepon
            }else{ // Jika isi dari array status adalah failed
                alert("DATA Tidak Ditemukan");
            }
        },
        error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
            alert(xhr.responseText);
        }
    });
}

$(document).ready(function(){

    // $("#loading").show(); // Tampilkan loadingnya

    $("#search").click(function(){ // Ketika user mengklik tombol Cari
        search(); // Panggil function search
    });
});
