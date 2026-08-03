document.addEventListener("DOMContentLoaded", function() {

        const form = document.querySelector(".journey-form");

        const nameInput = document.getElementById("jn");
        const phoneInput = document.getElementById("jp");
        const emailInput = document.getElementById("je");
        const cityInput = document.getElementById("jc");

        // Blur Events
        nameInput.addEventListener("blur", validateName);
        phoneInput.addEventListener("blur", validatePhone);
        emailInput.addEventListener("blur", validateEmail);
        cityInput.addEventListener("blur", validateCity);

        // Remove error while typing
        nameInput.addEventListener("input", () => removeError(nameInput));

        phoneInput.addEventListener("input", function() {
            this.value = this.value.replace(/\D/g, "").slice(0, 10);
            removeError(phoneInput);
        });

        emailInput.addEventListener("input", () => removeError(emailInput));

        cityInput.addEventListener("input", function() {
            this.value = this.value.replace(/[^a-zA-Z\s]/g, "");
            removeError(cityInput);
        });

        // Submit Validation
        document.getElementById("costCalculatorForm").addEventListener("submit", function(e) {

            e.preventDefault();

            // Blur validation
            if (!validateName() || !validatePhone() || !validateEmail() || !validateCity()) {
                return;
            }

            // Form Fields
            var name = document.getElementById("jn").value.trim();
            var email = document.getElementById("je").value.trim();
            var phone = document.getElementById("jp").value.trim();
            var city = document.getElementById("jc").value.trim();

            // Hidden Fields
            document.getElementById("source_url").value = window.location.href;

            var source_url = document.getElementById("source_url").value.trim();
            var source_id = document.getElementById("source_id").value.trim();

            var campaign_id = document.getElementById("campaign_id").value.trim();
            var campaign_name = document.getElementById("campaign_name").value.trim();

            var ad_id = document.getElementById("ad_id").value.trim();
            var ad_name = document.getElementById("ad_name").value.trim();

            var form_id = document.getElementById("form_id").value.trim();
            var form_name = document.getElementById("form_name").value.trim();

            var message = document.getElementById("contact_message").value.trim();
            var procedure = document.getElementById("procedure_category").value.trim();

            var phoneDigits = phone.replace(/\D/g, "");

            // Validation
           var statusEl = document.getElementById("contactFormStatus");
statusEl.style.display = "none";
statusEl.textContent = "";

            fetch("/contact-submit", {

                    method: "POST",

                    headers: {
                        "Content-Type": "application/json"
                    },

                    body: JSON.stringify({

                        name: name,
                        email: email,
                        phone: phoneDigits,
                        city: city,

                        concern: procedure,
                        message: message,

                        source_url: source_url,
                        source_id: source_id,

                        campaign_id: campaign_id,
                        campaign_name: campaign_name,

                        ad_id: ad_id,
                        ad_name: ad_name,

                        form_id: form_id,
                        form_name: form_name

                    })

                })

                .then(response => response.json())

          .then(function(response) {

    if (response.status) {

        Swal.fire({
            icon: "success",
            title: "Success",
            text: response.message || "Thank you. Our team will contact you shortly.",
            confirmButtonText: "OK",
            confirmButtonColor: "#22c55e"
        });

        document.getElementById("costCalculatorForm").reset();

        document.getElementById("source_url").value = window.location.href;
        document.getElementById("procedure_category").value = "Hair Transplant";

    } else {

        Swal.fire({
            icon: "error",
            title: "Failed",
            text: response.message || "Something went wrong.",
            confirmButtonText: "OK",
            confirmButtonColor: "#ef4444"
        });

    }

})

.catch(function(error) {

    console.error(error);

    Swal.fire({
        icon: "error",
        title: "Error",
        text: "Something went wrong. Please try again.",
        confirmButtonText: "OK",
        confirmButtonColor: "#ef4444"
    });

});

        });

        // ---------------- Name ----------------
        function validateName() {

            removeError(nameInput);

            const name = nameInput.value.trim();

            if (name === "") {
                showError(nameInput, "Name is required.");
                return false;
            }

            if (name.length < 3) {
                showError(nameInput, "Name must be at least 3 characters.");
                return false;
            }

            return true;
        }

        // ---------------- Phone ----------------
        function validatePhone() {

            removeError(phoneInput);

            const phone = phoneInput.value.trim();

            if (phone === "") {
                showError(phoneInput, "Phone number is required.");
                return false;
            }

            if (!/^[6-9][0-9]{9}$/.test(phone)) {
                showError(phoneInput, "Enter a valid 10-digit mobile number.");
                return false;
            }

            return true;
        }

        // ---------------- Email ----------------
        function validateEmail() {

            removeError(emailInput);

            const email = emailInput.value.trim();

            if (email === "") {
                showError(emailInput, "Email is required.");
                return false;
            }

            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (!emailRegex.test(email)) {
                showError(emailInput, "Enter a valid email address.");
                return false;
            }

            return true;
        }

        // ---------------- City ----------------
        function validateCity() {

            removeError(cityInput);

            const city = cityInput.value.trim();

            if (city !== "" && !/^[a-zA-Z\s]+$/.test(city)) {
                showError(cityInput, "Only letters are allowed.");
                return false;
            }

            return true;
        }

        // ---------------- Error Functions ----------------
        function showError(input, message) {

            removeError(input);

            const error = document.createElement("small");
            error.className = "error-message";
            error.textContent = message;

            // Input ke turant niche error show hoga
            input.insertAdjacentElement("afterend", error);

            input.style.border = "1px solid #dc3545";
        }

        function removeError(input) {

            input.style.border = "";

            const next = input.nextElementSibling;

            if (next && next.classList.contains("error-message")) {
                next.remove();
            }
        }

    });
