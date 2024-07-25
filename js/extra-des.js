document.addEventListener('DOMContentLoaded', function () {
    const detailItems = document.querySelectorAll('.suplementary-detail-item');

    detailItems.forEach(item => {
        const topSection = item.querySelector('.suplementary-detail-item-top');
        const button = topSection.querySelector('button');
        const span = item.querySelector('span');
        const icon = button.querySelector('.fa-solid');

        topSection.addEventListener('click', () => {
            detailItems.forEach(otherItem => {
                if (otherItem !== item) {
                    const otherSpan = otherItem.querySelector('span');
                    otherSpan.classList.remove('show-span');
                    otherSpan.style.maxHeight = '0';
                    otherItem.querySelector('.fa-solid').classList.remove('fa-minus');
                    otherItem.querySelector('.fa-solid').classList.add('fa-plus');
                }
            });

            span.classList.toggle('show-span');

            const maxHeight = span.scrollHeight + 'px';

            span.style.maxHeight = span.classList.contains('show-span') ? maxHeight : '0';

            icon.classList.toggle('fa-minus');
            icon.classList.toggle('fa-plus');
        });
    });
});