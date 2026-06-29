document.addEventListener("DOMContentLoaded", function () {

    const form = document.getElementById("testimonialForm");
    const testimonialList =
        document.getElementById("testimonialList");

    const kepuasanPersen =
        document.getElementById("kepuasanPersen");

    const kepuasanBar =
        document.getElementById("kepuasanBar");

    let testimonials =
        JSON.parse(localStorage.getItem("testimonials")) || [];

    function convertRating(rating) {
        switch (rating) {
            case "⭐": return 20;
            case "⭐⭐": return 40;
            case "⭐⭐⭐": return 60;
            case "⭐⭐⭐⭐": return 80;
            case "⭐⭐⭐⭐⭐": return 100;
            default: return 0;
        }
    }

    function hitungKepuasan() {
        if (testimonials.length === 0) {
            kepuasanPersen.innerText = "0%";
            kepuasanBar.style.width = "0%";
            return;
        }

        let total = 0;

        testimonials.forEach(item => {
            total += convertRating(item.rating);
        });

        let rataRata =
            Math.round(total / testimonials.length);

        kepuasanPersen.innerText =
            rataRata + "%";

        kepuasanBar.style.width =
            rataRata + "%";
    }

    function renderTestimonials() {
        testimonialList.innerHTML = "";

        testimonials.forEach((item, index) => {
            testimonialList.innerHTML += `
                <div class="testimonial-card">
                    <h4>${item.name}</h4>
                    <p>${item.comment}</p>
                    <strong>${item.rating}</strong>
                    <br><br>
                    <button onclick="deleteTestimonial(${index})">
                        Hapus
                    </button>
                </div>
            `;
        });

        hitungKepuasan();
    }

    form.addEventListener("submit", function (e) {
        e.preventDefault();

        const name =
            document.getElementById("username").value;

        const comment =
            document.getElementById("comment").value;

        const rating =
            document.getElementById("rating").value;

        testimonials.push({
            name,
            comment,
            rating
        });

        localStorage.setItem(
            "testimonials",
            JSON.stringify(testimonials)
        );

        form.reset();
        renderTestimonials();
    });

    window.deleteTestimonial = function (index) {
        testimonials.splice(index, 1);

        localStorage.setItem(
            "testimonials",
            JSON.stringify(testimonials)
        );

        renderTestimonials();
    };

    renderTestimonials();

});