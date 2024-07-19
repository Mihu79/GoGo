document.addEventListener('DOMContentLoaded', () => {
    const stars = document.querySelectorAll('.star');
    const reviewInput = document.getElementById('review');
    const postBtn = document.getElementById('postBtn');
    const reviewsList = document.getElementById('reviewsList');
    let selectedRating = 0;

    const pageKey = 'review7';

    loadReviews();

    stars.forEach(star => {
        star.addEventListener('mouseover', () => {
            updateStars(star.getAttribute('data-value'));
        });

        star.addEventListener('mouseout', () => {
            updateStars(selectedRating);
        });

        star.addEventListener('click', () => {
            selectedRating = star.getAttribute('data-value');
            updateStars(selectedRating);
        });
    });

    postBtn.addEventListener('click', () => {
        const reviewText = reviewInput.value;

        if (selectedRating > 0 && reviewText.trim() !== '') {
            postReview(selectedRating, reviewText);
            reviewInput.value = '';
            updateStars(0);
            selectedRating = 0;
        }
    });

    function updateStars(rating) {
        stars.forEach(star => {
            if (star.getAttribute('data-value') <= rating) {
                star.classList.add('selected');
            } else {
                star.classList.remove('selected');
            }
        });
    }

    function postReview(rating, review) {
        const listItem = document.createElement('li');
        listItem.innerHTML = `<strong class="saved">${'★'.repeat(rating)}${'☆'.repeat(5 - rating)}</strong><br>${review}`;
        reviewsList.appendChild(listItem);
        saveReview(rating, review);
    }

    function saveReview(rating, review) {
        const reviews = JSON.parse(localStorage.getItem(pageKey)) || [];
        reviews.push({ rating, review });
        localStorage.setItem(pageKey, JSON.stringify(reviews));
    }

    function loadReviews() {
        const reviews = JSON.parse(localStorage.getItem(pageKey)) || [];
        reviews.forEach(({ rating, review }) => {
            const listItem = document.createElement('li');
            listItem.innerHTML = `<strong class="saved">${'★'.repeat(rating)}${'☆'.repeat(5 - rating)}</strong><br>${review}`;
            reviewsList.appendChild(listItem);
        });
    }
});
