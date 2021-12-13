<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    @if ($errors->any())
        <pre>
        {{ json_encode($errors->all()) }}
    </pre>
    @endif
    <form action="{{ route('admin.videos.all') }}" method="POST" enctype="multipart/form-data"
        style="display: flex;flex-direction:column;gap:10px">
        @csrf
        <input type="text" name="title" placeholder="title" />
        <input type="hidden" name="durartion" value="167.89" />
        <label for="">Video</label>
        <input type="file" name="file" placeholder="file" />
        <label for="">Thumbnail</label>
        <input type="file" name="thumbnail" placeholder="file" />
        <input type="hidden" name="_thumbnail" value="" />
        <select type="date" name="chefs_id" placeholder="chefs_id">
            @foreach ($chefs as $chef)
                <option value="{{ $chef->id }}">{{ $chef->fname . ' ' . $chef->lname }}</option>
            @endforeach
        </select>
        <input type="submit" value="Add">
    </form>
    <script>
        const videoInput = document.querySelector('input[type="file"]');
        videoInput.addEventListener('change', (e) => {
            const file = e.target.files[0];
            const fileReader = new FileReader();
            const video = document.createElement('video');
            video.src = URL.createObjectURL(file);
            video.addEventListener('loadedmetadata', () => {
                document.querySelector('input[name="durartion"]').value = video.duration;
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
            generateVideoThumbnail(file).then((thumbnail) => {
                console.log(thumbnail);
                document.querySelector('input[name="_thumbnail"]').value = thumbnail;
            });
            // if (file.type.match('video')) {
            //     fileReader.onload = function() {
            //         var blob = new Blob([fileReader.result], {
            //             type: file.type
            //         });
            //         var url = URL.createObjectURL(blob);
            //         var timeupdate = function() {
            //             if (snapImage()) {
            //                 video.removeEventListener('timeupdate', timeupdate);
            //                 video.pause();
            //             }
            //         };
            //         video.addEventListener('loadeddata', function() {
            //             if (snapImage()) {
            //                 video.removeEventListener('timeupdate', timeupdate);
            //             }
            //         });
            //         var snapImage = function() {
            //             var canvas = document.createvideoElement('canvas');
            //             canvas.width = video.videoWidth;
            //             canvas.height = video.videoHeight;
            //             canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);
            //             var image = canvas.toDataURL();
            //             var success = image.length > 100000;
            //             if (success) {
            //                 var img = document.createElement('img');
            //                 img.src = image;
            //                 document.getElementsByTagName('div')[0].appendChild(img);
            //                 URL.revokeObjectURL(url);
            //             }
            //             return success;
            //         };
            //         video.addEventListener('timeupdate', timeupdate);
            //         video.preload = 'metadata';
            //         video.src = url;
            //         // Load video in Safari / IE11
            //         video.muted = true;
            //         video.playsInline = true;
            //         video.play();
            //     };
            //     fileReader.readAsArrayBuffer(file);
            // }
        })
    </script>
</body>

</html>
