document.addEventListener('DOMContentLoaded', function() {
    // Lấy tất cả các checkbox của hình dáng
    const shapeCheckboxes = document.querySelectorAll('.shape-checkbox');

    shapeCheckboxes.forEach(shapeCheckbox => {
        shapeCheckbox.addEventListener('change', function() {
            // Tìm color-group tương ứng
            const colorGroup = this.closest('.shape-item').querySelector('.color-group');
            if (this.checked) {
                colorGroup.style.display = 'block';
            } else {
                colorGroup.style.display = 'none';
                // Bỏ chọn tất cả các checkbox màu sắc và ẩn các trường nhập số lượng và hình ảnh
                colorGroup.querySelectorAll('.color-checkbox').forEach(colorCheckbox => {
                    colorCheckbox.checked = false;
                    const quantityInput = colorCheckbox.closest('.color-item').querySelector('.quantity-input');
                    const imageInput = colorCheckbox.closest('.color-item').querySelector('.image-input');
                    quantityInput.style.display = 'none';
                    imageInput.style.display = 'none';
                });
            }
        });
    });

    // Xử lý sự kiện chọn màu sắc
    const colorCheckboxes = document.querySelectorAll('.color-checkbox');
    colorCheckboxes.forEach(colorCheckbox => {
        colorCheckbox.addEventListener('change', function() {
            const quantityInput = this.closest('.color-item').querySelector('.quantity-input');
            const imageInput = this.closest('.color-item').querySelector('.image-input');
            if (this.checked) {
                quantityInput.style.display = 'block';
                imageInput.style.display = 'block';
            } else {
                quantityInput.style.display = 'none';
                imageInput.style.display = 'none';
            }
        });
    });
});


//------------/////////////////////////////////////
document.addEventListener('DOMContentLoaded', function() {
    const mainImageInput = document.getElementById('main-image');
    const previewImage = document.getElementById('preview-image');

    mainImageInput.addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                previewImage.src = e.target.result;
                previewImage.style.display = 'block';
            };

            reader.readAsDataURL(file);
        } else {
            previewImage.src = '';
            previewImage.style.display = 'none';
        }
    });
});
