@extends('layouts.main')

@section('container')
    <div class="container-fluid col-lg-9 mb-3 py-4">
        <div class="section-title">
            <div class="col-md-12 text-center mb-5">
                <div class="page-header">
                    <h2>UBAH CAROSEL</h2>
                </div>
                <p>Silahkan unggah gambar untuk memperbarui Carosel</p>

                <div class="mb-3 form-floating">
                    <input type="file" name="image" class="image form-control" id="cover1" onchange="previewImage1()">
                    <label for="cover1"><strong>IMAGE</strong> (max: 20MB)</label>
                </div>

                <hr>
                @if ($carosels != null)
                    @foreach ($carosels as $carosel)
                        <img class="img-preview img-fluid col-sm-5 mb-1 border"
                            src="{{ asset('carosel_thumbnails/' . $carosel->name) }}">
                    @endforeach
                    {{-- <input type="hidden" id="old_image" value="{{ $carosel->name }}">
                <input type="hidden" id="old_image_id" value="{{ $carosel->id }}"> --}}
                @else
                    <p>Silahkan unggah gambar untuk mengubah Carosel</p>
                @endif

                <hr>
                <a href="/dashboard" class="btn btn-secondary font-weight-bold mb-3">Back to Dashboard</a>
            </div>
        </div>
    </div>

    {{-- Modal crop Carosel --}}
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg-crop modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Silahkan sesuaikan gambar carosel.
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="img-container">
                        <div class="row">
                            <div class="col-md-8">
                                <img id="image" class="img-crop" src="https://avatars0.githubusercontent.com/u/3456749">
                            </div>
                            <div class="col-md-4">
                                <div class="preview"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="crop">Crop</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function previewImage1() {
            // var oldImage = $('#old_image').val();
            // var oldImageID = $('#old_image_id').val();
            var $modal = $('#modal');
            var image = document.getElementById('image');
            var cropper;
            $("body").on("change", ".image", function(e) {
                var files = e.target.files;
                var done = function(url) {
                    image.src = url;
                    $modal.modal('show');
                };
                var reader;
                var file;
                var url;
                if (files && files.length > 0) {
                    file = files[0];
                    if (URL) {
                        done(URL.createObjectURL(file));
                    } else if (FileReader) {
                        reader = new FileReader();
                        reader.onload = function(e) {
                            done(reader.result);
                        };
                        reader.readAsDataURL(file);
                    }
                }
            });
            $modal.on('shown.bs.modal', function() {
                cropper = new Cropper(image, {
                    aspectRatio: 4 / 3,
                    viewMode: 3,
                    minCropBoxHeight: 250,
                    cropBoxResizable: false,
                    dragMode: 'move',
                    preview: '.preview'
                });
            }).on('hidden.bs.modal', function() {
                cropper.destroy();
                cropper = null;
            });
            $("#crop").click(function() {
                canvas = cropper.getCroppedCanvas({
                    width: 667,
                    height: 501,
                });
                canvas.toBlob(function(blob) {
                    url = URL.createObjectURL(blob);
                    var reader = new FileReader();
                    reader.readAsDataURL(blob);
                    reader.onloadend = function() {
                        var base64data = reader.result;
                        $.ajax({
                            type: "POST",
                            dataType: "json",
                            url: "crop-image-upload",
                            data: {
                                '_token': $('meta[name="_token"]').attr('content'),
                                'image': base64data
                                // 'old_image': oldImage,
                                // 'old_image_id': oldImageID
                            },
                            success: function(data) {
                                console.log(data);
                                $modal.modal('hide');
                                alert("Crop image successfully uploaded");
                                window.location.reload();
                            },
                            error: (error) => {
                                console.log(JSON.stringify(error));
                            }
                        });
                    }
                });
            });
        }
    </script>
@endsection
