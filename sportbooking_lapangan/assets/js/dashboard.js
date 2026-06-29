// Grafik Booking
const bookingCtx =
    document.getElementById("bookingChart");

new Chart(bookingCtx, {
    type: "bar",
    data: {
        labels: ["Padel", "Futsal", "Badminton"],
        datasets: [{
            label: "Jumlah Booking",
            data: [2, 3, 1],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true
    }
});

// Grafik Payment
const paymentCtx =
    document.getElementById("paymentChart");

new Chart(paymentCtx, {
    type: "pie",
    data: {
        labels: ["Success", "Pending", "Failed"],
        datasets: [{
            data: [4, 2, 0]
        }]
    },
    options: {
        responsive: true
    }
});