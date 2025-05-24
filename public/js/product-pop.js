    // Function to open the product gallery modal
    function openProductGallery(productId) {
        const galleryModal = document.getElementById(`product-gallery-${productId}`);
        if (galleryModal) {
            galleryModal.classList.remove('hidden');
            galleryModal.classList.add('flex');
            document.body.style.overflow = 'hidden';
        }
    }

    // Function to close the product gallery modal
    function closeProductGallery(productId) {
        const galleryModal = document.getElementById(`product-gallery-${productId}`);
        if (galleryModal) {
            galleryModal.classList.add('hidden');
            galleryModal.classList.remove('flex');
            document.body.style.overflow = '';
        }
    }

    // Function to open full size image
    function openFullImage(imageSrc, imageAlt) {
        const fullImageModal = document.getElementById('fullImageModal');
        const fullSizeImage = document.getElementById('fullSizeImage');

        if (fullImageModal && fullSizeImage) {
            fullSizeImage.src = imageSrc;
            fullSizeImage.alt = imageAlt;

            fullImageModal.classList.remove('hidden');
            fullImageModal.classList.add('flex');
        }
    }

    // Function to close full size image
    function closeFullImage() {
        const fullImageModal = document.getElementById('fullImageModal');

        if (fullImageModal) {
            fullImageModal.classList.add('hidden');
            fullImageModal.classList.remove('flex');
        }
    }

    // Close modals when clicking outside the content
    document.addEventListener('click', function(event) {
        const fullImageModal = document.getElementById('fullImageModal');
        const productGalleries = document.querySelectorAll('[id^="product-gallery-"]');

        // For full image modal
        if (fullImageModal && fullImageModal.classList.contains('flex')) {
            const fullSizeImage = document.getElementById('fullSizeImage');
            if (event.target !== fullSizeImage && !fullSizeImage.contains(event.target)) {
                closeFullImage();
            }
        }

        // For product galleries
        productGalleries.forEach(gallery => {
            if (gallery.classList.contains('flex')) {
                const modalContent = gallery.querySelector('.bg-white');
                if (event.target === gallery && !modalContent.contains(event.target)) {
                    const productId = gallery.id.replace('product-gallery-', '');
                    closeProductGallery(productId);
                }
            }
        });
    });

    // Close modals with Escape key
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            const fullImageModal = document.getElementById('fullImageModal');
            if (fullImageModal && fullImageModal.classList.contains('flex')) {
                closeFullImage();
                return;
            }

            const openGallery = document.querySelector('[id^="product-gallery-"].flex');
            if (openGallery) {
                const productId = openGallery.id.replace('product-gallery-', '');
                closeProductGallery(productId);
            }
        }
    });
