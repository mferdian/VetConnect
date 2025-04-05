document.addEventListener('DOMContentLoaded', function () {
    const dateCells = document.querySelectorAll('.date-cell');
    const timeSlotsContainer = document.getElementById('time-slots-container');
    const currentMonthElement = document.getElementById('current-month');
    const bookingButton = document.getElementById('booking-button');
    const selectedDateEl = document.getElementById('selected-date');
    const selectedTimeEl = document.getElementById('selected-time');

    const inputVetDateId = document.getElementById('input-vet-date-id');
    const inputVetTimeId = document.getElementById('input-vet-time-id');
    const inputKeluhan = document.getElementById('input-keluhan');
    const keluhanTextarea = document.getElementById('keluhan');

    let selectedDate = null;
    let selectedTime = null;
    const vetId = bookingButton.dataset.vetId;

    function updateBookingButtonState() {
        bookingButton.classList.toggle('disabled', !(selectedDate && selectedTime));
    }

    function formatDateToIndo(dateStr) {
        const date = new Date(dateStr);
        return date.toLocaleDateString('id-ID', { weekday: 'long', day: 'numeric', month: 'long', year: 'numeric' });
    }

    function fetchTimeSlots(date) {
        fetch(`/get-time-slots?date=${date}&vet_id=${vetId}`)
            .then(response => response.json())
            .then(data => {
                timeSlotsContainer.innerHTML = '';
                inputVetDateId.value = data.vet_date_id || '';

                if (data.times.length === 0) {
                    timeSlotsContainer.innerHTML = '<p class="col-span-4 py-3 text-center text-gray-500">Tidak ada jadwal tersedia pada tanggal ini</p>';
                    return;
                }

                data.times.forEach(time => {
                    const button = document.createElement('button');
                    button.className = 'time-slot';
                    button.setAttribute('data-time', time.jam);
                    button.setAttribute('data-id', time.id);
                    button.textContent = time.jam;

                    button.addEventListener('click', function () {
                        document.querySelectorAll('.time-slot').forEach(btn => btn.classList.remove('selected'));
                        this.classList.add('selected');
                        selectedTime = time.jam;
                        selectedTimeEl.textContent = time.jam;
                        inputVetTimeId.value = time.id;
                        updateBookingButtonState();
                    });

                    timeSlotsContainer.appendChild(button);
                });
            })
            .catch(() => {
                timeSlotsContainer.innerHTML = '<p class="col-span-4 py-3 text-center text-red-500">Terjadi kesalahan. Silakan coba lagi.</p>';
            });
    }

    // Date click handler
    dateCells.forEach(cell => {
        cell.addEventListener('click', function () {
            dateCells.forEach(c => c.classList.remove('selected'));
            this.classList.add('selected');

            selectedDate = this.getAttribute('data-date');
            selectedDateEl.textContent = formatDateToIndo(selectedDate);
            selectedTime = null;
            selectedTimeEl.textContent = 'Belum dipilih';
            inputVetTimeId.value = '';
            fetchTimeSlots(selectedDate);
            updateBookingButtonState();
        });
    });

    // Set current month
    const currentDate = new Date();
    currentMonthElement.textContent = currentDate.toLocaleDateString('id-ID', { month: 'long', year: 'numeric' });

});
