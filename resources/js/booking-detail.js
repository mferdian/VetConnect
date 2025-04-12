/**
 * VetConnect - Booking Detail Page
 * Handles date and time selection for veterinarian appointments
 */

document.addEventListener('DOMContentLoaded', function () {
    const dateSelect = document.getElementById('vet_date_id');
    const timeSelect = document.getElementById('vet_time_id');

    // Initialize time slots if value exists on page load
    if (dateSelect && dateSelect.value) {
        loadTimeSlots(dateSelect.value);
    }

    // Event listener untuk perubahan tanggal
    if (dateSelect) {
        dateSelect.addEventListener('change', function () {
            loadTimeSlots(this.value);
        });
    }

    /**
     * Fetch available time slots based on selected date ID
     * @param {string} dateId
     */
    function loadTimeSlots(dateId) {
        fetch(`/booking/get-times/${dateId}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Gagal mengambil data waktu konsultasi');
                }
                return response.json();
            })
            .then(data => {
                updateTimeOptions(data);
            })
            .catch(error => {
                console.error('Error:', error);
                updateTimeOptions([]);
            });
    }

    /**
     * Update dropdown waktu berdasarkan data dari API
     * @param {Array} timeSlots
     */
    function updateTimeOptions(timeSlots) {
        timeSelect.innerHTML = '';

        if (!timeSlots || timeSlots.length === 0) {
            const option = document.createElement('option');
            option.value = '';
            option.textContent = 'Tidak ada waktu tersedia';
            option.disabled = true;
            option.selected = true;
            timeSelect.appendChild(option);
        } else {
            const defaultOption = document.createElement('option');
            defaultOption.value = '';
            defaultOption.textContent = 'Pilih waktu konsultasi';
            defaultOption.disabled = true;
            defaultOption.selected = true;
            timeSelect.appendChild(defaultOption);

            timeSlots.forEach(time => {
                const option = document.createElement('option');
                option.value = time.id;
                option.textContent = time.jam;
                timeSelect.appendChild(option);
            });
        }
    }
});
