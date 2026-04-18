<x-layout>
<div class="edit_and_create_container">
    <div class="universal_card">
        <div class="universal_header">
            <h3 style="margin-bottom: 20px;"><i class="fas fa-edit" style="color: var(--primary-red);"></i> Edit Siswa</h3>
            <p>Perbarui informasi siswa di sini</p>
        </div>
        <form action="{{ route('siswa.update', $siswa->id) }}" method="POST" enctype="multipart/form-data" class="universal_form">
            @csrf
            {{-- pergantian method dari post menjadi put --}}
            @method('PUT')
            <div class="container-create-siswa">
                <div class="form_group">
                    <label for="nama">nama:</label>
                    <input type="text" id="nama" name="nama" placeholder="Masukkan nama siswa" 
                    {{-- value defaultnya adalah data yang lama --}}
                    value="{{ old('nama', $siswa->nama) }}" required>
                </div>
                <div class="form_group">
                    <label for="jabatan">jabatan:</label>
                    <input type="text" id="jabatan" name="jabatan" placeholder="Masukkan jabatan siswa" value="{{ old('jabatan', $siswa->jabatan) }}" required>
                </div>
                <div class="form_group form-image-upload">
                    <label for="image">Foto Siswa:</label>
                    <div class="image-upload-wrapper">
                        @if($siswa->image)
                            <div id="imagePreview" class="image-preview">
                                <div class="image-preview-container">
                                    <img id="previewImg" src="{{ asset('storage/' . $siswa->image) }}" alt="Preview">
                                </div>
                                <div class="image-preview-info">
                                    <span class="image-file-name" id="fileName">{{ basename($siswa->image) }}</span>
                                    <button type="button" class="remove-image-btn" id="removeImageBtn" title="Hapus gambar">
                                        <i class="fas fa-times"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3"><path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/></svg></i>
                                    </button>
                                </div>
                            </div>
                        @endif
                        <label for="image" class="image-label" id="imageDropZone" @if($siswa->image) style="display: none;" @endif>
                            <i class="fas fa-cloud-upload-alt upload-icon"></i>
                            <div class="upload-text">
                                <h4>Unggah Foto Siswa</h4>
                                <p>Drag & drop foto di sini atau klik untuk memilih</p>
                                <div class="file-types">.jpg .jpeg .png .gif (Max: 5MB)</div>
                            </div>
                        </label>
                        <input type="file" id="image" name="image" accept="image/*">
                        <div id="imageStatus" class="upload-status"></div>
                    </div>
                </div>
                <button type="submit" class="btn_login">Update Siswa</button>
            </div>
        </form>
    </div>
</div>
</x-layout>

<script>
    // Image Upload Handler
    document.addEventListener('DOMContentLoaded', function() {
        const imageInput = document.getElementById('image');
        const imageDropZone = document.getElementById('imageDropZone');
        const imageStatus = document.getElementById('imageStatus');
        const MAX_FILE_SIZE = 5 * 1024 * 1024; // 5MB
        const imageUploadWrapper = document.querySelector('.image-upload-wrapper');

        // Handle file selection via input
        imageInput.addEventListener('change', handleFileSelect);

        // Handle drag and drop
        imageDropZone.addEventListener('dragover', handleDragOver);
        imageDropZone.addEventListener('dragleave', handleDragLeave);
        imageDropZone.addEventListener('drop', handleDrop);

        // Handle remove button - dengan event delegation
        imageUploadWrapper.addEventListener('click', function(e) {
            if (e.target.closest('.remove-image-btn')) {
                e.preventDefault();
                removeImage();
            }
        });

        function handleDragOver(e) {
            e.preventDefault();
            e.stopPropagation();
            imageDropZone.classList.add('drag-over');
        }

        function handleDragLeave(e) {
            e.preventDefault();
            e.stopPropagation();
            imageDropZone.classList.remove('drag-over');
        }

        function handleDrop(e) {
            e.preventDefault();
            e.stopPropagation();
            imageDropZone.classList.remove('drag-over');

            const files = e.dataTransfer.files;
            if (files.length > 0) {
                imageInput.files = files;
                handleFileSelect({ target: { files: files } });
            }
        }

        function handleFileSelect(e) {
            const file = e.target.files[0];
            
            // Clear previous status
            imageStatus.classList.remove('show', 'success', 'error');
            
            if (!file) {
                return;
            }

            // Validate file type
            if (!file.type.startsWith('image/')) {
                showStatus('Harap pilih file gambar yang valid (JPG, PNG, GIF)', 'error');
                imageInput.value = '';
                return;
            }

            // Validate file size
            if (file.size > MAX_FILE_SIZE) {
                showStatus('Ukuran file terlalu besar. Maksimal 5MB.', 'error');
                imageInput.value = '';
                return;
            }

            // Read and display preview
            const reader = new FileReader();
            reader.onload = function(event) {
                displayPreview(event.target.result, file.name);
                showStatus('Gambar berhasil dipilih!', 'success');
            };
            reader.readAsDataURL(file);
        }

        function displayPreview(imageSrc, fileName) {
            let imagePreview = document.getElementById('imagePreview');
            
            // Jika preview belum ada, buat
            if (!imagePreview) {
                const previewHtml = `
                    <div id="imagePreview" class="image-preview">
                        <div class="image-preview-container">
                            <img id="previewImg" src="" alt="Preview">
                        </div>
                        <div class="image-preview-info">
                            <span class="image-file-name" id="fileName">Nama file</span>
                            <button type="button" class="remove-image-btn" title="Hapus gambar">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                `;
                imageUploadWrapper.insertAdjacentHTML('afterbegin', previewHtml);
                imagePreview = document.getElementById('imagePreview');
            }
            
            // Update preview
            const previewImg = document.getElementById('previewImg');
            const fileNameElement = document.getElementById('fileName');
            
            previewImg.src = imageSrc;
            fileNameElement.textContent = fileName;
            imagePreview.style.display = 'block';
            imageDropZone.style.display = 'none';
        }

        function removeImage() {
            imageInput.value = '';
            const imagePreview = document.getElementById('imagePreview');
            
            if (imagePreview) {
                imagePreview.style.display = 'none';
            }
            imageDropZone.style.display = 'flex';
            imageStatus.classList.remove('show', 'success', 'error');
        }

        function showStatus(message, type) {
            imageStatus.textContent = message;
            imageStatus.classList.add('show', type);
            
            // Auto hide success message after 3 seconds
            if (type === 'success') {
                setTimeout(() => {
                    imageStatus.classList.remove('show');
                }, 3000);
            }
        }
    });
</script>
