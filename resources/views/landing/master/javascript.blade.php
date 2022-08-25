<div class="flash-message" data-request="{{Session::get('message')}}" data-status="{{ Session::get('status') }}"></div>
<script>
    $(document).ready(function(){

    var request = $('.flash-message').data('status');
    console.log(request);

    if(request){
        console.log('ok');
        var type, text,title;
        if(request == true){
            type = 'success';
            text = 'Berhasil dimasukan Keranjang';
            title = "Berhasil";
        }else{
            type = 'error';
            text = 'Gagal dimasukan Keranjang';
            title = "Gagal";
        }

        swal({
            title: title,
            text: text,
            icon: type,
        });
    }

    $('.add_paket').on('click',function(e){
    e.preventDefault();
    var ini = $(this); 

        $.ajax({
            url: "{{ route('paket_wisata.get') }}",
            method: 'POST',
            data: {
                '_token' : "{{ csrf_token() }}",
                id: ini.data('id'),
            },success: function(data){
                console.log(data)
                $('#modal-cart-paket').modal('show');
                $('#nama_paket').find('span').html(data.data.nama);
                $('#paket_wisata_id').val(data.data.id);
                var maping = data.data.detail.map(function(val,index){
                    return `<tr><td>${val.wisata.nama}</td></tr>`;
                });
                console.log(maping);
                $('.table_paket').find('tbody').html(maping.join(''))

            }
        });
    });

    $('.add_cart').on('click',function(e){
        e.preventDefault();
        var ini = $(this);
        
        $.ajax({
            url: "{{ route('checkauth') }}",
            method: 'POST',
           data: {
            '_token' : "{{ csrf_token() }}",
            is_product: ini.data('is_product')
           },
            success:function(data)
            {
                if(data){
                var id = ini.data('id');
                var image = ini.data('image')
                var nama = ini.data('nama')
                $('#nama_pesanan').find('span').html(nama)
                $('#imagepreview').attr('src',image)
                $('#detail_wisata_id').val(id)
                $('#modal-cart').modal('show');
                }else{
                   return  window.location.href = "{{ route('login') }}";
                } 
            }
        });
       
    });

    $('.payment').on('click',function(e){
        var id = $(this).data('id');
        
        $.ajax({
            url: "{{ route('pemesanan.ajax_detail') }}",
            method: 'POST',
           data: {
            '_token' : "{{ csrf_token() }}",
            'id':id
           },
            success:function(data)
            {
                $('#waktu_pemesanan').find('span').html(data.data.created_at);
                $('#nama_user').find('span').html(data.data.user.name);
                console.log(data);

                var sum = [];
                var mapping = data.data.detail_pemesanan.map(function(value,index){
                    var harga, nama,subtotal;
                    if(value.detail_wisata){
                        nama = value.detail_wisata.nama;
                        subtotal = value.detail_wisata.harga;
                        if(value.detail_wisata.jenis_kalkulasi == '1'){
                                 harga = value.pack * value.harga;
                                 sum.push(value.pack * value.harga);
                            }else{
                                 harga = (value.count_day*value.pack) * value.harga;
                                 sum.push((value.count_day*value.pack) * value.harga);
                            };
                    }else{
                        harga = value.pack * value.harga;
                        sum.push(value.pack * value.harga);
                        nama = value.paket_wisata.nama;
                        subtotal = value.paket_wisata.harga;

                    }
                    return `<tr>
                        <td>${index+1}</td>
                        <td>${nama}</td>
                        <td>${value.pack}</td>
                        <td>${subtotal}</td>
                        <td>${harga}</td>
                        </tr>`;
                });
                $('#pemesanan').find('tbody').html(mapping.join(''))
                $('#total').html(sum.reduce((a,b) => a+b,0));
                $('.alert').find('span').html(sum.reduce((a,b) => a+b,0));
                $('#id').val(data.data.id);
              
                $('#payment').modal('show');

            }
        });
    });

    $('#inputdate').daterangepicker({
    timePicker: false,
    autoApply: true, 
    startDate: moment().startOf('hour'),
    endDate: moment().startOf('hour').add(32, 'hour'),
    locale: {
      format: 'Y/M/D'
    }
  });
});


 

$(document).on({
    ajaxStart: function(){
        $("#overlay").fadeIn(300);　
    },
    ajaxStop: function(){ 
        $("#overlay").fadeOut(300);
    }    
});

$(document).ready(function(){
    $(document).ready(function(){

// Set Options
var speed = 500;			// Fade speed
var autoswitch = true;		// Auto slider options
var autoswitch_speed = 4000	// Auto slider speed

// Add initial active class
$('.slide').first().addClass('active');

// Hide all slides
$('.slide').hide();

// Show first slide
$('.active').show();

// Next Handler
$('#next').on('click', nextSlide);

// Prev Handler
$('#prev').on('click', prevSlide);

// Auto Slider Handler

// Switch to next slide
function nextSlide(){
    $('.active').removeClass('active').addClass('oldActive');
    if($('.oldActive').is(':last-child')){
        $('.slide').first().addClass('active');
    } else {
        $('.oldActive').next().addClass('active');
    }
    $('.oldActive').removeClass('oldActive');
    $('.slide').fadeOut(speed);
    $('.active').fadeIn(speed);
}

// Switch to prev slide
function prevSlide(){
    $('.active').removeClass('active').addClass('oldActive');
    if($('.oldActive').is(':first-child')){
        $('.slide').last().addClass('active');
    } else {
        $('.oldActive').prev().addClass('active');
    }
    $('.oldActive').removeClass('oldActive');
    $('.slide').fadeOut(speed);
    $('.active').fadeIn(speed);
}
});
});
</script>