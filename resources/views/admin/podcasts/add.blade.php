@extends('layouts.admin')
@section('title','أضف بودكاست')
@section('content')
  <div class="container-fluid">
    <div class="row mb-5">
      <div class="col-md-12">
          <h2 class="h3 mb-3">أضف بودكاست</h2>
      </div>
      <div class="col-md-12">
          <div class="p-2 shadow-md rounded border border-warning">
            @if ($errors->any())
                <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                </div>
            @endif
        <form action="{{ route('admin.podcasts.store') }}" method="POST" enctype="multipart/form-data" style="display: flex;flex-direction:column;gap:10px">
            @csrf
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="title">العنوان</label>
                    <input type="text" id="title" name="title" class="form-control" value="{{ old("title") }}" placeholder="العنوان..." />
                    <input type="hidden" name="durartion" value="56" />
                </div>
                <div class="form-group col-md-6">
                    <label for="">ملف الصوت:</label>
                    <input type="file" name="file" class="form-control" value="{{ old("file") }}" placeholder="ملف الصوت..." />
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <input type="submit" class="btn btn-dark" value="حفظ">
                </div>
            </div>
        </form>
</div>
</div>
</div>
</div>
@endsection
@section('js')
<script>
     const audioInput = document.querySelector('input[type="file"]');
        audioInput.addEventListener('change', (e) => {
            const file = e.target.files[0];            
            const audio = document.createElement('audio');
            audio.src = URL.createObjectURL(file);
            audio.addEventListener('loadedmetadata', () => {
                document.querySelector('input[name="durartion"]').value = audio.duration;
            })
            const generateVideoThumbnail = (file) => {
                return new Promise((resolve) => {
                    const canvas = document.createElement("canvas");
                    const video = document.createElement("video");

                    // this is important
                    video.autoplay = true;
                    video.muted = true;
                    video.src = URL.createObjectURL(file);

                    video.onloadeddata = () => {
                        let ctx = canvas.getContext("2d");

                        canvas.width = video.videoWidth;
                        canvas.height = video.videoHeight;

                        ctx.drawImage(video, 0, 0, video.videoWidth, video.videoHeight);
                        video.pause();
                        return resolve(canvas.toDataURL("image/png"));
                    };
                });
            };
        })
</script>
@endsection