document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("costCalculatorForm");
    if (!form) {
        return;
    }

    const nameInput = document.getElementById("jn");
    const phoneInput = document.getElementById("jp");
    const emailInput = document.getElementById("je");
    const cityInput = document.getElementById("jc");

    nameInput.addEventListener("blur", validateName);
    phoneInput.addEventListener("blur", validatePhone);
    emailInput.addEventListener("blur", validateEmail);
    cityInput.addEventListener("blur", validateCity);

    nameInput.addEventListener("input", function () {
        removeError(nameInput);
    });

    phoneInput.addEventListener("input", function () {
        this.value = this.value.replace(/\D/g, "").slice(0, 10);
        removeError(phoneInput);
    });

    emailInput.addEventListener("input", function () {
        removeError(emailInput);
    });

    cityInput.addEventListener("input", function () {
        this.value = this.value.replace(/[^a-zA-Z\s]/g, "");
        removeError(cityInput);
    });

    form.addEventListener("submit", function (e) {
        e.preventDefault();

        if (!validateName() || !validatePhone() || !validateEmail() || !validateCity()) {
            return;
        }

        const name = nameInput.value.trim();
        const email = emailInput.value.trim();
        const phone = phoneInput.value.trim();
        const city = cityInput.value.trim();

        document.getElementById("source_url").value = window.location.href;

        function hiddenVal(id) {
            const el = document.getElementById(id);
            return el ? el.value.trim() : "";
        }

        const attribution = (typeof window.getLeadAttributionCookie === "function")
            ? window.getLeadAttributionCookie()
            : null;

        if (attribution) {
            [
                "utm_source",
                "utm_medium",
                "utm_campaign",
                "utm_content",
                "utm_term",
                "gclid",
                "fbclid",
                "landing_page",
                "referrer",
                "campaign_id",
                "first_touch_source",
                "first_touch_medium",
                "first_touch_channel",
                "first_touch_campaign",
                "first_touch_referrer",
                "first_touch_landing_page",
                "first_touch_at",
                "last_touch_source",
                "last_touch_medium",
                "last_touch_channel",
                "last_touch_campaign",
                "last_touch_referrer",
                "last_touch_landing_page",
                "last_touch_at"
            ].forEach(function (field) {
                const el = document.getElementById(field);
                if (el && attribution[field]) {
                    el.value = attribution[field];
                }
            });

            if (attribution.utm_campaign) {
                const campaignNameEl = document.getElementById("campaign_name");
                if (campaignNameEl) {
                    campaignNameEl.value = attribution.utm_campaign;
                }
            }
        }

        const source_url = hiddenVal("source_url");
        const source_id = hiddenVal("source_id");
        const campaign_id = hiddenVal("campaign_id");
        const campaign_name = hiddenVal("campaign_name");
        const ad_id = hiddenVal("ad_id");
        const ad_name = hiddenVal("ad_name");
        const form_id = hiddenVal("form_id");
        const form_name = hiddenVal("form_name");
        const utm_source = hiddenVal("utm_source");
        const utm_medium = hiddenVal("utm_medium");
        const utm_campaign = hiddenVal("utm_campaign");
        const utm_content = hiddenVal("utm_content");
        const utm_term = hiddenVal("utm_term");
        const gclid = hiddenVal("gclid");
        const fbclid = hiddenVal("fbclid");
        const landing_page = hiddenVal("landing_page");
        const referrer = hiddenVal("referrer");
        const first_touch_source = hiddenVal("first_touch_source");
        const first_touch_medium = hiddenVal("first_touch_medium");
        const first_touch_channel = hiddenVal("first_touch_channel");
        const first_touch_campaign = hiddenVal("first_touch_campaign");
        const first_touch_referrer = hiddenVal("first_touch_referrer");
        const first_touch_landing_page = hiddenVal("first_touch_landing_page");
        const first_touch_at = hiddenVal("first_touch_at");
        const last_touch_source = hiddenVal("last_touch_source");
        const last_touch_medium = hiddenVal("last_touch_medium");
        const last_touch_channel = hiddenVal("last_touch_channel");
        const last_touch_campaign = hiddenVal("last_touch_campaign");
        const last_touch_referrer = hiddenVal("last_touch_referrer");
        const last_touch_landing_page = hiddenVal("last_touch_landing_page");
        const last_touch_at = hiddenVal("last_touch_at");
        const message = hiddenVal("contact_message");
        const procedure = hiddenVal("procedure_category") || "Hair Transplant";
        const phoneDigits = phone.replace(/\D/g, "");
        const statusEl = document.getElementById("contactFormStatus");
        const submitUrl = window.CONTACT_SUBMIT_URL || "/contact-submit";

        if (
            !name ||
            !email ||
            !city ||
            !procedure ||
            !source_url ||
            !source_id ||
            !form_id ||
            !form_name ||
            !/^[6-9]\d{9}$/.test(phoneDigits)
        ) {
            if (statusEl) {
                statusEl.style.display = "block";
                statusEl.style.color = "#dc2626";
                statusEl.textContent = "Please fill in all required fields with valid information.";
            }
            return;
        }

        if (statusEl) {
            statusEl.style.display = "block";
            statusEl.style.color = "#64748b";
            statusEl.textContent = "Sending...";
        }

        fetch(submitUrl, {
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
                campaign_id: campaign_id || null,
                campaign_name: campaign_name || null,
                ad_id: ad_id,
                ad_name: ad_name,
                form_id: form_id,
                form_name: form_name,
                utm_source: utm_source,
                utm_medium: utm_medium,
                utm_campaign: utm_campaign,
                utm_content: utm_content,
                utm_term: utm_term,
                gclid: gclid,
                fbclid: fbclid,
                landing_page: landing_page,
                referrer: referrer,
                first_touch_source: first_touch_source || null,
                first_touch_medium: first_touch_medium || null,
                first_touch_channel: first_touch_channel || null,
                first_touch_campaign: first_touch_campaign || null,
                first_touch_referrer: first_touch_referrer || null,
                first_touch_landing_page: first_touch_landing_page || null,
                first_touch_at: first_touch_at || null,
                last_touch_source: last_touch_source || null,
                last_touch_medium: last_touch_medium || null,
                last_touch_channel: last_touch_channel || null,
                last_touch_campaign: last_touch_campaign || null,
                last_touch_referrer: last_touch_referrer || null,
                last_touch_landing_page: last_touch_landing_page || null,
                last_touch_at: last_touch_at || null
            })
        })
            .then(function (response) {
                return response.json();
            })
            .then(function (response) {
                if (response.status) {
                    Swal.fire({
                        icon: "success",
                        title: "Success",
                        text: response.message || "Thank you. Our team will contact you shortly.",
                        confirmButtonText: "OK",
                        confirmButtonColor: "#22c55e"
                    });

                    form.reset();
                    document.getElementById("source_url").value = window.location.href;
                    document.getElementById("procedure_category").value = "Hair Transplant";

                    if (statusEl) {
                        statusEl.style.display = "none";
                    }
                } else {
                    Swal.fire({
                        icon: "error",
                        title: "Failed",
                        text: response.message || "Something went wrong.",
                        confirmButtonText: "OK",
                        confirmButtonColor: "#ef4444"
                    });

                    if (statusEl) {
                        statusEl.style.display = "none";
                    }
                }
            })
            .catch(function (error) {
                

                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: "Something went wrong. Please try again.",
                    confirmButtonText: "OK",
                    confirmButtonColor: "#ef4444"
                });

                if (statusEl) {
                    statusEl.style.display = "none";
                }
            });
    });

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

        if (!/^[A-Za-z\s]+$/.test(name)) {
            showError(nameInput, "Name cannot contain numbers or special characters.");
            return false;
        }

        return true;
    }

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

    function validateEmail() {
        removeError(emailInput);

        const email = emailInput.value.trim();

        if (email === "") {
            showError(emailInput, "Email is required.");
            return false;
        }

        if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
            showError(emailInput, "Enter a valid email address.");
            return false;
        }

        return true;
    }

    function validateCity() {
        removeError(cityInput);

        const city = cityInput.value.trim();

        if (city === "") {
            showError(cityInput, "City is required.");
            return false;
        }

        if (!/^[a-zA-Z\s]+$/.test(city)) {
            showError(cityInput, "Only letters are allowed.");
            return false;
        }

        return true;
    }

    function showError(input, message) {
        removeError(input);

        const error = document.createElement("small");
        error.className = "error-message";
        error.textContent = message;
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
