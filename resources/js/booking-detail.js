document.addEventListener("DOMContentLoaded", function () {
    const dateSelector = document.getElementById("date-selector");
    const timeSelector = document.getElementById("time-selector");
    const bookingBtn = document.getElementById("booking-btn");
    const dateError = document.getElementById("date-error");
    const timeError = document.getElementById("time-error");
    const selectedDetails = document.getElementById("selected-details");
    const selectedDateDisplay = document.getElementById("selected-date-display");
    const selectedTimeDisplay = document.getElementById("selected-time-display");
    const additionalInfo = document.getElementById("additional-info");

    let selectedDate = null;
    let selectedTime = null;
    let doctorId = 1; // Default doctor ID

    // Format date for display and storage
    function formatDate(date) {
        const options = {
            weekday: 'long',
            day: 'numeric',
            month: 'long',
            year: 'numeric'
        };
        const displayDate = date.toLocaleDateString('id-ID', options);

        return {
            display: displayDate,
            iso: date.toISOString().split('T')[0],
            dayName: date.toLocaleDateString('id-ID', { weekday: 'long' }),
            day: date.getDate(),
            month: date.toLocaleDateString('id-ID', { month: 'short' })
        };
    }

    // Generate dates for next 7 days excluding Sundays
    function generateDateButtons() {
        dateSelector.innerHTML = "";
        const today = new Date();
        let datesGenerated = 0;
        let currentDate = new Date(today);

        while (datesGenerated < 7) {
            // Skip Sundays (day 0)
            if (currentDate.getDay() !== 0) {
                const formattedDate = formatDate(currentDate);
                const button = document.createElement("button");

                button.classList.add(
                    "date-btn", "flex", "flex-col", "items-center", "px-4", "py-3",
                    "text-sm", "rounded-lg", "bg-gray-100", "text-gray-700",
                    "transition-all", "duration-200", "focus:outline-none"
                );

                button.innerHTML = `
                    <span class="font-medium">${formattedDate.dayName}</span>
                    <span class="text-lg font-bold">${formattedDate.day}</span>
                    <span>${formattedDate.month}</span>
                `;

                button.dataset.date = formattedDate.iso;
                button.dataset.displayDate = formattedDate.display;

                button.addEventListener("click", function() {
                    // Remove active state from all date buttons
                    document.querySelectorAll('.date-btn').forEach(btn => {
                        btn.classList.remove("bg-[#497D74]", "text-white", "selected");
                        btn.classList.add("bg-gray-100", "text-gray-700");
                    });

                    // Add active state to clicked button
                    button.classList.remove("bg-gray-100", "text-gray-700");
                    button.classList.add("bg-[#497D74]", "text-white", "selected");
                    selectedDate = button.dataset.date;
                    dateError.classList.add("hidden");

                    // Update selected details
                    updateSelectedDetails();
                    loadTimeSlots();

                    // Enable booking button if time is already selected
                    if (selectedTime) {
                        bookingBtn.disabled = false;
                    }
                });

                dateSelector.appendChild(button);
                datesGenerated++;
            }

            // Move to next day
            currentDate.setDate(currentDate.getDate() + 1);
        }

        // Auto-select first available date
        if (dateSelector.firstChild) {
            dateSelector.firstChild.click();
        }
    }

    // Load available time slots for selected date
    function loadTimeSlots() {
        timeSelector.innerHTML = "";
        timeError.classList.add("hidden");
        selectedTime = null; // Reset selected time when date changes

        // In a real app, you would fetch these from the server based on selected date
        const timeSlots = [
            "09:00", "10:00", "11:00",
            "14:00", "15:00", "16:00", "17:00"
        ];

        // Mark some times as booked for demonstration
        const bookedTimes = selectedDate === new Date().toISOString().split('T')[0]
            ? ["10:00", "15:00"]
            : [];

        timeSlots.forEach(time => {
            const isBooked = bookedTimes.includes(time);
            const button = document.createElement("button");

            button.classList.add(
                "time-btn", "px-3", "py-2", "text-sm", "rounded-lg",
                "transition-all", "duration-200", "focus:outline-none"
            );

            if (isBooked) {
                button.classList.add("bg-gray-200", "text-gray-400", "cursor-not-allowed");
                button.title = "Sudah dibooking";
                button.disabled = true;
            } else {
                button.classList.add("bg-gray-100", "text-gray-700");

                button.addEventListener("click", function() {
                    // Remove active state from all time buttons
                    document.querySelectorAll('.time-btn:not(:disabled)').forEach(btn => {
                        btn.classList.remove("bg-[#497D74]", "text-white", "selected");
                        btn.classList.add("bg-gray-100", "text-gray-700");
                    });

                    // Add active state to clicked button
                    button.classList.remove("bg-gray-100", "text-gray-700");
                    button.classList.add("bg-[#497D74]", "text-white", "selected");
                    selectedTime = time;
                    timeError.classList.add("hidden");

                    // Update selected details and enable booking button
                    updateSelectedDetails();
                    bookingBtn.disabled = false;
                });
            }

            button.textContent = time;
            timeSelector.appendChild(button);
        });
    }

    // Update the selected details display
    function updateSelectedDetails() {
        if (selectedDate && selectedTime) {
            selectedDetails.classList.remove("hidden");
            selectedDateDisplay.textContent = document.querySelector('.date-btn.selected').dataset.displayDate;
            selectedTimeDisplay.textContent = selectedTime;
        } else {
            selectedDetails.classList.add("hidden");
        }
    }

    // Booking submission
    bookingBtn.addEventListener("click", async function () {
        // Validate selection
        if (!selectedDate) {
            dateError.classList.remove("hidden");
            return;
        }
        if (!selectedTime) {
            timeError.classList.remove("hidden");
            return;
        }
    });

    // Initialize date generation
    generateDateButtons();
});
