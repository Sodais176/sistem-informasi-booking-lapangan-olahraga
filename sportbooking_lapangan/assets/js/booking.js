document.addEventListener("DOMContentLoaded", function () {

    const sportSelect = document.getElementById("sportSelect");
    const durasiInput = document.getElementById("durasi");
    const totalHarga = document.getElementById("totalHarga");
    const bookingForm = document.getElementById("bookingForm");
    const bookingTable = document.querySelector("#bookingTable tbody");
    const searchInput = document.getElementById("searchBooking");

    let bookings = JSON.parse(localStorage.getItem("bookings")) || [];
    let editIndex = -1;

    // =========================
    // HITUNG TOTAL
    // =========================
    function hitungTotal() {
        const selectedOption =
            sportSelect.options[sportSelect.selectedIndex];

        const harga =
            parseInt(selectedOption.getAttribute("data-price")) || 0;

        const durasi =
            parseInt(durasiInput.value) || 0;

        const total = harga * durasi;

        totalHarga.value = "Rp " + total.toLocaleString("id-ID");
    }

    sportSelect.addEventListener("change", hitungTotal);
    durasiInput.addEventListener("input", hitungTotal);

    // =========================
    // RENDER TABLE
    // =========================
    function renderBookings(data = bookings) {
        bookingTable.innerHTML = "";

        data.forEach((booking, index) => {
            bookingTable.innerHTML += `
                <tr>
                    <td>${booking.id}</td>
                    <td>${booking.nama}</td>
                    <td>${booking.email}</td>
                    <td>${booking.sport}</td>
                    <td>${booking.tanggal}</td>
                    <td>${booking.jamMulai} - ${booking.jamSelesai}</td>
                    <td>${booking.total}</td>
                    <td>
                        <button onclick="editBooking(${index})">Ubah</button>
                        <button onclick="deleteBooking(${index})">Hapus</button>
                        <button onclick="viewBooking(${index})">View</button>
                    </td>
                </tr>
            `;
        });
    }

    // =========================
    // SUBMIT BOOKING
    // =========================
    bookingForm.addEventListener("submit", function (e) {
        e.preventDefault();

        const sport = sportSelect.value;
        const durasi = durasiInput.value;
        const jamMulai =
            document.querySelector("input[name='jam_mulai']").value;
        const jamSelesai =
            document.querySelector("input[name='jam_selesai']").value;

        if (sport === "") {
            alert("Pilih jenis olahraga terlebih dahulu!");
            return;
        }

        if (durasi <= 0) {
            alert("Durasi booking minimal 1 jam!");
            return;
        }

        if (jamMulai >= jamSelesai) {
            alert("Jam selesai harus lebih besar dari jam mulai!");
            return;
        }

        const data = {
            id: "B" + (bookings.length + 1),
            nama: bookingForm.nama.value,
            email: bookingForm.email.value,
            sport: sport,
            tanggal: bookingForm.tanggal.value,
            jamMulai: jamMulai,
            jamSelesai: jamSelesai,
            total: totalHarga.value
        };

        if (editIndex === -1) {
            bookings.push(data);
        } else {
            bookings[editIndex] = data;
            editIndex = -1;
        }

        localStorage.setItem("bookings", JSON.stringify(bookings));

        alert("Booking berhasil!\nTotal pembayaran: " + totalHarga.value);

        bookingForm.reset();
        totalHarga.value = "";
        renderBookings();
    });

    // =========================
    // EDIT
    // =========================
    window.editBooking = function (index) {
        const booking = bookings[index];

        bookingForm.nama.value = booking.nama;
        bookingForm.email.value = booking.email;
        bookingForm.sport.value = booking.sport;
        bookingForm.tanggal.value = booking.tanggal;
        bookingForm.jam_mulai.value = booking.jamMulai;
        bookingForm.jam_selesai.value = booking.jamSelesai;
        totalHarga.value = booking.total;

        editIndex = index;
    };

    // =========================
    // DELETE
    // =========================
    window.deleteBooking = function (index) {
        if (confirm("Yakin ingin menghapus booking?")) {
            bookings.splice(index, 1);
            localStorage.setItem("bookings", JSON.stringify(bookings));
            renderBookings();
        }
    };

    // =========================
    // VIEW
    // =========================
    window.viewBooking = function (index) {
        const booking = bookings[index];

        alert(
            "ID: " + booking.id + "\n" +
            "Nama: " + booking.nama + "\n" +
            "Email: " + booking.email + "\n" +
            "Olahraga: " + booking.sport + "\n" +
            "Tanggal: " + booking.tanggal + "\n" +
            "Jam: " + booking.jamMulai + " - " + booking.jamSelesai + "\n" +
            "Total: " + booking.total
        );
    };

    // =========================
    // SEARCH BOOKING
    // =========================
    searchInput.addEventListener("keyup", function () {
        document.getElementById("resetSearch").addEventListener("click", function(){
            searchInput.value = "";
            renderBookings();
        });
        
        const keyword = this.value.toLowerCase().trim();

        const filtered = bookings.filter(booking =>

            booking.id.toLowerCase().includes(keyword) ||
            booking.nama.toLowerCase().includes(keyword) ||
            booking.nama.toLowerCase().includes(keyword) ||
            booking.sport.toLowerCase().includes(keyword) ||
            booking.tanggal.toLowerCase().includes(keyword)
        );

        renderBookings(filtered);
    });

    renderBookings();

});