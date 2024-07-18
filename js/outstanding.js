document.addEventListener('DOMContentLoaded', function () {
    const observerOptions = {
        root: null,
        rootMargin: '0px',
        threshold: 0.5
    };

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-slide-from-bottom');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    const outstandingProduct = document.querySelector('.outstanding-product');
    if (outstandingProduct) {
        outstandingProduct.style.opacity = 0;
        observer.observe(outstandingProduct);
    }
});