// srcs
const STAR_ICONS = {
    star: "/icons/stars/star.svg",
    filledStar: "/icons/stars/filled-star.svg",
    halfFilledStar: "/icons/stars/half-filled-star.svg",
};

const stars = Array
    .from(new Array(5).keys())
    .map((_, i) => {
        const element = document.getElementById("star-" + i);
        return {
            element: element,
            image: element.getElementsByTagName("img")[0],
            buttons: [
                document.getElementById("first-" + i),
                document.getElementById("second-" + i)
            ]
        };
    });
const ratingInput = document.getElementById("rating");

function renderRating(rating) {
    ratingInput.value = rating;
    let i = 0;
    for (; i < Math.floor(rating) && i < stars.length; i++) {
        stars[i].image.src = STAR_ICONS.filledStar;
    }
    if (rating - Math.floor(rating) && i < stars.length)
        stars[i++].image.src = STAR_ICONS.halfFilledStar;
    for (; i < stars.length; i++)
        stars[i].image.src = STAR_ICONS.star;
}

renderRating(ratingInput.value);
stars.forEach((star, index) => {
    star.buttons[0].onclick = () => renderRating(index + 0.5);
    star.buttons[1].onclick = () => renderRating(index + 1);
});
