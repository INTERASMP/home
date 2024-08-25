@extends('layout.layout')

@section('nav-list')
<li><a class="nav-nonactive prompt-medium" href="http://127.0.0.1:8000/home">Home</a></li>
<li><a class="nav-nonactive prompt-normal" href="">Event</a></li>
<li><a class="nav-nonactive prompt-normal" href="">Rank</a></li>
<li><a class="nav-nonactive prompt-normal" href="">Gallery</a></li>
@endsection

@section('nav-list-mobile')
<div class="hamburger-list nonactive">
    <a href="http://127.0.0.1:8000/home" class="prompt-normal">Home</a>
</div>
<div class="hamburger-list nonactive">
    <a href="event.html" class="prompt-normal">Events</a>
</div>
<div class="hamburger-list nonactive">
    <a href="#" class="prompt-normal">Ranks</a>
</div>
<div class="hamburger-list nonactive bottom">
    <a href="#" class="prompt-normal">Gallery</a>
</div>
@endsection

@section('content')
    <h1 class="page-title prompt-semibold">
        Bug Report
    </h1>

    <form class="bug-form" id="events">
        <div class="bug-main">
            
          <label for="username" class="prompt-medium">Nametag</label>
            <div class="bug-div-input">
    
                <input type="text" name="nametag" id="nametag" autocomplete="nametag" class="bug-nameinput prompt-normal" placeholder="Isi nametag minecraft anda disini!">
            </div>
    
          <label for="buginfo" class="prompt-medium">Bug?</label>
            <div class="bug-div-reportarea">
    
                <textarea id="buginfo" name="buginfo" rows="0" class="bug-reportarea" placeholder="Tulis Informasi Bug Disini"></textarea>
                <p class="prompt-normal" style="margin-bottom: 10px;">Jelaskan bug yang ingin dilaporkan.</p>
            </div>
    
          <div>
            <label for="bukti-foto" class="prompt-medium">Bukti Foto</label>
              <div class="bug-dropzone" id="dropzone">
                    <i class="fa-regular fa-image"></i>
                    <p class="bug-imgtext prompt-light">Drag and drop an image here</p>
                    <p class="bug-imgtext prompt-light">or click to upload</p>
                </div>
                <input id="file-upload" name="file-upload" type="file" style="display: none;">
                <p class="bug-imgtext bottom prompt-normal">PNG, JPG, GIF up to 10MB</p>
              </div>
    
            <div style="display: flex; justify-content: space-between;">
              <div>
                <button type="button" class="bug-bcancel prompt-medium">Cancel</button>
              </div>
              <div>
                <button type="submit" class="bug-bsave prompt-medium">Save</button>
              </div>
                
            </div>
        </div>
    </form>
    
    <div>
        <p class="prompt-semibold" style="font-size: 23px; text-align: center; margin: 60px 20px 0px 20px;">Terimakasih telah membantu kami menemukan Bug!</p>
    </div>

    <script>
            
            const hamburger = document.querySelector('.nav-hamburger');
            const mobileMenu = document.querySelector('.hamburger-menu');
            const dropzone = document.getElementById('dropzone');
            const fileUpload = document.getElementById('file-upload');

            // Toggle mobile menu visibility
            hamburger.addEventListener('click', function() {
                mobileMenu.classList.toggle('open');
                hamburger.classList.toggle('open');
            });

            // Bug Report Script
            dropzone.addEventListener('dragover', (event) => {
                event.preventDefault();
                dropzone.classList.add('dragover');
            });

            dropzone.addEventListener('dragleave', () => {
                dropzone.classList.remove('dragover');
            });

            dropzone.addEventListener('drop', (event) => {
                event.preventDefault();
                dropzone.classList.remove('dragover');

                const file = event.dataTransfer.files[0];
                if (file && file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        dropzone.innerHTML = `<div>
                        <img style="margin: 5px; border-radius: 10px;" src="${e.target.result}" alt="Uploaded Image">
                    </div>`;
                    };
                    reader.readAsDataURL(file);
                } else {
                    alert('Please drop an image file.');
                }
            });

            dropzone.addEventListener('click', () => {
                fileUpload.click();
            });

            fileUpload.addEventListener('change', (event) => {
                const file = event.target.files[0];
                if (file && file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        dropzone.innerHTML = `<div>
                        <img style="margin: 5px; 5px; border-radius: 10px;" src="${e.target.result}" alt="Uploaded Image">
                    </div>`;
                    };
                    reader.readAsDataURL(file);
                }
            });
    </script>
@endsection