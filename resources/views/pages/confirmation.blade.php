@extends('layouts.app')

@section('content')

<div class="container">
    @if ($message)
    <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
    </div>
    @endif
    <div class="row mt-5">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header" style="background: #f6522e;">
                   <h5 class="text-center text-white text-uppercase"> Konfirmasi Pembayaran</h5> <br>
                </div>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="phone">No. Telp/WA <small class="text-danger">*</small></label>
                            <input type="text" name="phone" id="phone" placeholder="Masukan no. Telp/WA" class="form-control" value="{{ $order->no_hp_pemesan }}" required autofocus>
                        </div>
                        <div class="form-group">
                            <img class="img-preview img-fluid col-sm-5" ><br>
                            <label for="image">Bukti Pembayaran <small class="text-danger">*</small></label>
                            <input type="file" class="form-control" name="image" id="image" onchange="previewImage()" required>
                        </div>
                        <div class="form-group">
                            <label for="note">Catatan (Opsional)</label>
                            <textarea name="note"  class="form-control" placeholder="Tambahkan catatan (Opsional)"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-success" value="Send Message" > 
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center"></div>
            </div>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>


<script>
    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display ='block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }

</script>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script></body>


<?php 
if(isset($_POST['submit']))
{
	$mobile=$_POST['mobile'];
	$message=$_POST['message'];
	$filename=$_FILES['image']['name'];
	$file_tmp=$FILES['image']['tmp_name'];
	move_uploaded_file($file_tmp,$filename);

	//Whatsapp API
	$apiURL = 'https://api.watsap.id/send-media';
$token = 'ad323f03dcefe74514989df82ea084fda9369994';

$phone = $mobile;

$data = json_encode(array(
    'chatId'=>$phone.'@c.us',
    'body'=>'https://domain.com/PHP/'.$filename,//FULL PATH and file name
    'filename'=>$filename,
    'caption'=>$message
));

$url = $apiURL.'sendFile?token='.$token;
$options = stream_context_create(['http' => [
    'method'  => 'POST',
    'header'  => 'Content-type: application/json',
    'content' => $data
]
]);
$response = file_get_contents($url,false,$options);
echo $response; exit;
}
?>


@endsection