<?= $this->extend('layouts/content_tabbar') ?>
<?= $this->section('content') ?>

<style>
    .d-img-preview {
        justify-items: center;
    }

    /* .d-mobile-upload {
        display: none;
    } */

    .menu-first {
        display: none;
    }

    .menu-secondary {
        display: none;
    }

    .menu-third {
        display: none;
    }

    /* #alabum_mobile {
        display: none;
    } */

    @media (max-width: 992px) {

        footer {
            display: none;
        }
     
        /* #alabum {
            display: none;
        } */

        /* #alabum_mobile {
            display: block;
        } */

        .title-upload-img {
            margin: 8px 12px !important;
        }

        /* .d-web-upload {
            display: none;
        } */

        /* .d-gc-nav {
            display: none;
        } */

        /* .d-mobile-menu {
            position: absolute;
            bottom: 0px;
            width: 100vw;
            height: 62px;
            
            background-color: #d6d6d6;
        }

        .d-mobile-confirm {
            position: absolute;
            bottom: 80px;
            width: 100vw;
            height: 22px;
            
            background-color: transparent;
        } */

        /* .menu-first {
            display: block;
            cursor: pointer; 
        }

        .menu-secondary {
            display: block;
            cursor: pointer; 
        }

        .menu-third {
            display: block;
            cursor: pointer; 
        }

        .menu-first:active {
            background-color: #fff;
        }

        .menu-secondary:active {
            background-color: #fff;
        }

        .menu-third:active {
            background-color: #fff;
        } */

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


    <!-- <div class="row">
        <div class="col-12">
            <div class="mb-3">
                <input type="text" class="form-control" id="alabum_mobile" name="alabum_mobile" 
                    placeholder="alabum name" aria-describedby="alabum_mobile">
            </div>
        </div>
    </div> -->
    

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

    <!-- <div class="row d-mobile-confirm">
        <div class="col-12 text-center">
            <button type="button" id="btn-mobile-confirm" class="btn btn-sm btn-warning rounded-pill">Upload</button>
        </div>
    </div>

    <div class="row d-mobile-menu">
        <div class="col-4 text-center menu-first text-secondary p-2">
            <span>
                <i class="fa fa-slideshare fa-3x" aria-hidden="true"></i>
            </span>
        </div>
        <div class="col-4 text-center menu-secondary text-secondary p-2">
            <form id="uploadForm" enctype="multipart/form-data">
                <input type="file" id="mobile_upload_img" name="upload_img" style="display: none;">
                <span class="">
                    <i class="fa fa-cloud-upload fa-3x main-menu-mobile" aria-hidden="true"></i>
                </span>
            </form>
        </div>
        <div class="col-4 text-center menu-third text-secondary p-2">
            <span>
                <i class="fa fa-trophy fa-3x" aria-hidden="true"></i>
            </span>
        </div>
    </div> -->
</div>

<script src="/lib/jquery/jquery.min.js"></script>
<script src="/lib/sweetalert2/sweetalert2.js"></script>
<script>

    // $(document).ready(function() {
    //     $('#btn-mobile-confirm').hide();

    //     $('.main-menu-mobile').on('click', function() {
    //         $('#mobile_upload_img').click();
    //     });

    //     $('#mobile_upload_img').on('change', function(e) {

    //         $('#btn-mobile-confirm').show();

    //         previewImage_mobile(e);
    //     });

    //     $('#btn-mobile-confirm').on('click', function() {

    //         // validate
    //         if($('#alabum_mobile').val() == '') {
    //             alert("plese check alabum name");
    //             return false;
    //         }

    //         const form = $('#uploadForm')[0];
    //         const formData = new FormData(form);
    //         formData.append("alabum", $("#alabum_mobile").val());

    //         $.ajax({
    //             url: '/lfdrive/uploadimgtobucket',
    //             type: 'POST',
    //             data: formData,
    //             contentType: false,
    //             processData: false,
    //             success: function(res) {
    //                 console.log('Upload success:', res);
    //             },
    //             error: function(err) {
    //                 console.error('Upload failed:', err);
    //             }
    //         });

    //     });

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

    // function previewImage_mobile(event) {
    //     const file = event.target.files[0];
    //     if (file) {
    //         const preview = document.getElementById('preview_mobile');
    //         preview.src = URL.createObjectURL(file);
    //         preview.style.display = 'block';
    //     }
    // }

</script>

<?= $this->endSection() ?>