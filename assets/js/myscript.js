// print
$('.print').click(function (e) { 
    $('.hilang').css('display','none');
});


// tmbh user
$('.admtmbhusr').click(function (e) { 
    $("[name='id']").val('');
    $("[name='nmdpn']").val('');
    $("[name='nmblkg']").val('');
    $("[name='email']").val('');
    $("[name='username']").val('');
    $("[name='alamat']").val('');
    $("[name='tgllhr']").val('');
    $("[name='level']").val('');
    
});

// user
$('.usrhps').click(function (e) { 
    var id = $(this).data('id');
    $('.mdhps').val(id);
});
// ubah user
$('.admubahusr').click(function (e) { 
      
    $("[name='id']").val($(this).data('id'));
    $("[name='nmdpn']").val($(this).data('nmdpn'));
    $("[name='nmblkg']").val($(this).data('nmblkg'));
    $("[name='email']").val($(this).data('email'));
    $("[name='username']").val($(this).data('username'));
    $("[name='alamat']").val($(this).data('alamat'));
    $("[name='tgllhr']").val($(this).data('tgl'));
    $("[name='level']").val($(this).data('level'));
    
});


// suplayer
$('.suppubah').click(function (e) { 
    // console.log($(this).data());
    $("[name='id']").val($(this).data('id'));
    $("[name='nama']").val($(this).data('nama'));
    $("[name='jenis']").val($(this).data('jns'));
    $("[name='alamat']").val($(this).data('alamat'));
    $("[name='hp']").val($(this).data('hp'));
    $("[name='fax']").val($(this).data('fax'));
    $("[name='email']").val($(this).data('email'));

    // ubh tmbol
    $('.save').removeAttr('name', 'btn-supp');    
    $('.save').attr('name', 'suppubah');
    $('.save span').text("Ok");
    $('#jdlForm').text("Ubah Suplayer");

    // 
    $('.batal span').text("Batal");
    $('.batal').removeClass('btn-warning');
    $('.batal').addClass('btn-danger');
    $('.batal i').addClass('red');
    
});

$('.batal').click(function (e) { 
    $('.save').removeAttr('name', 'suppubah');
    $('.save').attr('name', 'btn-supp');
    $('.save span').text("Simpan");

    $('.batal span').text("Reset");
    $('.batal').removeClass('btn-danger');
    $('.batal').addClass('btn-warning');
    // $('.batal i').addClass('');

    
});

$('.save').click(function (e) { 
    setTimeout(() => {
        $('.save').removeAttr('name', 'suppubah');
        $('.save').attr('name', 'btn-supp');
        $('.save span').text("Simpan");
    }, 3000);    
});

// hpus supp
$('.supphps').click(function (e) { 
    $("[name='id']").val('');
    $("[name='id']").val($(this).data('id'));
});

// ubah kontraktor
$('.kontubah').click(function (e) { 
    $("[name='id']").val($(this).data('id'))
    $("[name='nama']").val($(this).data('nama'))
    $("[name='alamat']").val($(this).data('alamat'))
    $("[name='email']").val($(this).data('email'))
    $("[name='tel']").val($(this).data('tel'))
    $("[name='penJawab']").val($(this).data('petugas'))

    $('.save').removeAttr('name', 'btn-kont');    
    $('.save').attr('name', 'kontubah');
    $('.save span').text("Ok");

    // 
    $('.batal span').text("Batal");
    $('.batal').removeClass('btn-warning');
    $('.batal').addClass('btn-danger');
    $('.batal i').addClass('red');
});



// ubah pekerjaan
$('.pekubah').click(function (e) { 
    $("[name='id']").val($(this).data('id'))
    $("[name='nama']").val($(this).data('nama'))
    $("[name='jenis']").val($(this).data('jenis'))
    $("[name='keterangan']").val($(this).data('keterangan'))

    $('.save').removeAttr('name', 'btn-kont');    
    $('.save').attr('name', 'pekubah');
    $('.save span').text("Ok");

    // 
    $('.batal span').text("Batal");
    $('.batal').removeClass('btn-warning');
    $('.batal').addClass('btn-danger');
    $('.batal i').addClass('red');
});

$('.tmbproyek').click(function(event) {
      $("[name='proyekId']").val('')
      // $("[name='spk']").val($(this).data('spkno'))
      $('.oppkerjaan').val('')
      $('.optkontraktor').val('')
      $('[name="nama"]').val('')
      $('[name="lokasi"]').val('')
      $('[name="mulaidate"]').val('')
      $('[name="selesaidate"]').val('')
      $('[name="nilaiKontrak"').val('')
});
// ubah Proyek
$('.ubhpro').click(function(event) {
    // console.log($(this).data())
    $("[name='proyekId']").val($(this).data('proyekid'))
    $("[name='spku']").val($(this).data('spkno'))
    $('.oppkerjaan').text($(this).data('namakerjaan'))
    $('.oppkerjaan').val($(this).data('idkerjaan'))
    $('.optkontraktor').text($(this).data('namakontraktor'))
    $('.optkontraktor').val($(this).data('kontraktorid'))
    $('[name="nama"]').val($(this).data('nmproyek'))
    $('[name="lokasi"]').val($(this).data('lokasi'))
    $('[name="mulaidate"]').val($(this).data('mulai'))
    $('[name="selesaidate"]').val($(this).data('selesai'))
    $('[name="nilaiKontrak"').val($(this).data('nilai')).simpleMoneyFormat()
});

// hapus proyek
$('.proyekhps').click(function(event) {
    /* Act on the event */
    $("[name='id']").val($(this).data('id'));
});

// Rab
    $('.addfee').keyup(function(event) {
        /* Act on the event */
        var mater = $('[name="material"]').val()
        var uph = $('[name="upah"]').val()

        var fee = parseFloat($(this).val().replace(/,/g,''))
        var material = parseFloat(mater.replace(/,/g,''))
        var upah = parseFloat(uph.replace(/,/g,''))

        var total = $('[name="addtotal"]').val(upah+material+fee).simpleMoneyFormat()
        
    });

    $('[name="PPn"]').keyup(function(event) {
        /* Act on the event */
        var ttl     = $('[name="addtotal"]').val()
        var total   = parseFloat(ttl.replace(/,/g,''))
        var ppn     = parseFloat($(this).val().replace(/,/g,''))
        $('[name="addgtotal"]').val(ppn * total / 100).simpleMoneyFormat()
    });

    // hapus 
    $('.rabhps').click(function(event) {
        /* Act on the event */
        $("[name='id']").val($(this).data('id'));
    });

    // tambah
    $('.tmbrab').click(function(event) {
        /* Act on the event */
        $('[name="proyekId"]').val('')
        $('[name="upah"]').val('')
        $('[name="material"]').val('')
        $('[name="fee"]').val('')
        $('[name="total"]').val('')
        $('[name="PPn"]').val('')
        $('[name="gtotal"]').val('')
    });

    // ubah
    $('.ubhrab').click(function(event) {
        /* Act on the event */
        $('[name="idrab"]').val($(this).data('idrab'))
        $('[name="rabkodu"]').val($(this).data('koderab'))
        $('.proyek').text($(this).data('namaproyek'))
        $('.proyek').val($(this).data('idproyek'))
        $('[name="upah"]').val($(this).data('upah')).simpleMoneyFormat()
        $('[name="material"]').val($(this).data('material')).simpleMoneyFormat()
        $('[name="fee"]').val($(this).data('fee')).simpleMoneyFormat()
        $('[name="total"]').val($(this).data('total')).simpleMoneyFormat()
        $('[name="PPn"]').val($(this).data('ppn'))
        $('[name="gtotal"]').val($(this).data('gtotal')).simpleMoneyFormat()
    });


    $(document).on('keyup', '[name="upah"] ,[name="material"], [name="fee"], [name="PPn"]', function(event) {

        let uph         = $('[name="upah"]').val()
        let mtrl        = $('[name="material"]').val()
        let fe          = $('[name="fee"]').val()
        
        let uuph        = $('.uuph').val()
        let umtrl       = $('.umtrl').val()
        let ufe         = $('.ufe').val()
        
        let dtuph = ''
        let dtmtrl = ''
        let dtfe = ''

        if(uph == uuph){
            dtuph = parseFloat(uph.replace(/,/g,''))
        }else if(uph != uuph){
            dtuph = parseFloat(uuph.replace(/,/g,''))
        }

        if(mtrl == umtrl){
            dtmtrl = parseFloat(mtrl.replace(/,/g,''))
        }else if(mtrl != umtrl){
            dtmtrl = parseFloat(umtrl.replace(/,/g,''))
        }

        if(fe == ufe){
            dtfe = parseFloat(fe.replace(/,/g,''))
        }else if(fe != ufe){
            dtfe = parseFloat(ufe.replace(/,/g,''))
        }


        let total = $('[name="total"]').val(dtuph+dtmtrl+dtfe).simpleMoneyFormat()
        let dttotal = parseFloat($('[name="total"]').val().replace(/,/g,''))

        let ppn          = $('[name="PPn"]').val()
        let uppn         = $('.uppn').val()
        let dtppn = ''

        if(ppn == uppn){
            dtppn = parseFloat(ppn.replace(/,/g,''))
        }else{
            dtppn = parseFloat(uppn.replace(/,/g,''))
        }

        // var ppn     = parseFloat($(this).val().replace(/,/g,''))
        $('[name="gtotal"]').val(dtppn * dttotal / 100).simpleMoneyFormat()
    });

// material

$('[name="mjumlah"]').keyup(function(event) {
    /* Act on the event */
    let jml = parseFloat($(this).val().replace(/,/g,''))
    let hrg = parseFloat($('[name="mharga"]').val().replace(/,/g,''))

    let total = $('[name="mtotal"]').val(hrg * jml).simpleMoneyFormat()
});

// $('[name="mharga"]').keyup(function(event) {
//     let hrg = $(this).val().replace(/,/g,'')
//     var regex = /^[0-9]+$/
//     if(!hrg.match(regex) && hrg.length > 1 ){
//         $('#number').text("is not number")
//         return false
//     }else if(hrg.length < 1){
//           $('#number').text("please fill this colom")
//           return false
//     }else{
//         $('#number').text("")
//     }
// });


$('.mathps').click(function(event) {
        $("[name='id']").val($(this).data('id'));
    });

function isNumber(){
    let hrg = $('.numger').val().replace(/,/g,'')
    console.log(hrg)
    var regex = /^[0-9]+$/
    if(!hrg.match(regex) && hrg.length > 1 ){
        $('#number').text("is not number")
        return false
    }else if(hrg.length < 1){
          $('#number').text("please fill this colom")
          return false
    }else{
        $('#number').text("")
    }
}