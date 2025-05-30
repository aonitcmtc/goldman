<?= $this->extend('layouts/content_tabbar') ?>
<?= $this->section('content') ?>

<style>
    .d-img-preview {
        justify-items: center;
    }

    .menu-first {
        display: none;
    }

    .menu-secondary {
        display: none;
    }

    .menu-third {
        display: none;
    }

    @media (max-width: 992px) {

        footer {
            display: none;
        }
     
        .title-upload-img {
            margin: 8px 12px !important;
        }

        .d-img-preview {
            justify-items: baseline;
        }
    }
    
</style>


<div class="container content-tabbar">
    <div class="row">
        <div class="col-12 title-upload-img text-center my-5">
            <h2>Upload Image</h2>
        </div>
    </div>


    <div class="row ">
        <div class="col-12 d-web-upload">
            <h4 class="<?= $msg == 'successfully' ? 'text-success':'text-danger' ?>"><?= $msg ?></h4>
            <!-- <form action="/lfdrive/uploadimgtobucket" method="post" enctype="multipart/form-data"> -->
            <form id="uploadFormweb" enctype="multipart/form-data" class="needs-validation" novalidate>
                <!-- <h1 id="noti-upload-status"></h1> -->
                <div class="mb-3">
                    <input type="text" class="form-control" id="alabum" name="alabum" 
                        placeholder="alabum name" aria-describedby="alabum" required>
                    <div class="invalid-feedback">
                        Please alabum name a valid alabum.
                    </div>
                </div>
                
                <div class="input-group mb-3">
                    <input type="file" class="form-control" id="upload_img" name="upload_img" onchange="previewImage(event)" required>
                    <div class="invalid-feedback">
                        Please check file upload.
                    </div>
                </div>

                <div class="text-center mb-3">
                    <button id="btn-submit" type="button" class="btn btn-sm btn-warning" onclick="validationformweb()">Upload</button>
                </div>
            </form>
        </div>

        <div class="col-12 d-img-preview text-center">
            <img id="preview" style="display:none;" />
            <!-- <img id="preview_mobile" width="400" style="display:none;" /> -->
        </div>
    </div>

</div>

<script src="/lib/jquery/jquery.min.js"></script>
<script src="/lib/sweetalert2/sweetalert2.js"></script>
<script>

    // $(document).ready(function() {
        // Swal.fire({
        //     title: "Upload Success!",
        //     text: "Complete to Upload Successfully",
        //     icon: "success"
        // });
    // });

    function validationformweb() {
        var is_error = 0;

        $('#alabum').removeClass('is-invalid');
        $('#upload_img').removeClass('is-invalid');
        // $('#noti-upload-status').text("");
        // $('#noti-upload-status').removeClass("text-success");
        // $('#noti-upload-status').removeClass("text-danger");

        if($('#alabum').val() == '') {
            console.log('plese check alabum name');
            $('#alabum').addClass('is-invalid');
            is_error++;
        }
        
        if ($('#upload_img').val() == '') {
            console.log('plese check alabum name');
            $('#upload_img').addClass('is-invalid');
            is_error++;
        }

        console.log('is_error : '+is_error);
        if (is_error > 0){
            return false;
        }

        const form = $('#uploadFormweb')[0];
        const formData = new FormData(form);
        formData.append("alabum", $("#alabum").val());

        $.ajax({
            url: '/lfdrive/uploadimgtobucket',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(res) {
                console.log('Upload success:', res);
                var data = JSON.parse(res);
                // console.log('data:', data.msg);

                if (data.msg == "successfully") {
                    // $('#noti-upload-status').addClass("text-success");
                    // $('#noti-upload-status').text(data.msg);
                    // console.log('success:');

                    Swal.fire({
                        title: "Upload Success!",
                        text: "Complete to Upload Successfully",
                        icon: "success"
                    });
                } else {
                    // $('#noti-upload-status').addClass("text-danger");
                    // $('#noti-upload-status').text(data.msg);
                    // console.log('danger:');

                    Swal.fire({
                        title: "Fail Upload!",
                        text: "File Upload is Error!!!",
                        icon: "error"
                    });
                }
            }, error: function(err) {
                console.error('Upload failed:', err);
            }
        });
    }

    function previewImage(event) {
        const file = event.target.files[0];
        if (file) {
            const preview = document.getElementById('preview');
            preview.src = URL.createObjectURL(file);
            preview.style.display = 'block';
        }
    }

</script>

<?= $this->endSection() ?>