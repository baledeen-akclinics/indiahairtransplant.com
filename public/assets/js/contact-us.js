document.addEventListener("DOMContentLoaded", function () {

    const locationInput = document.getElementById("contact_location");
    const locationError = document.getElementById("locationError");
    if (locationInput && locationError) {

    locationInput.addEventListener("blur", function () {

        if (this.value === "") {

            locationError.textContent = "Please select clinic location.";
            locationError.style.display = "block";

        } else {

            locationError.style.display = "none";

        }

    });

}







    const sourceUrlInput = document.getElementById("source_url");
    const contactForm = document.getElementById("contactForm");
    const procedureSelect = document.getElementById("procedure_category");
    const nameInput = document.getElementById("contact_name");
    const nameError = document.getElementById("nameError");
    const emailInput = document.getElementById("contact_email");
    const emailError = document.getElementById("emailError");
    const phoneInput = document.getElementById("contact_phone");
    const phoneError = document.getElementById("phoneError");

    if (sourceUrlInput) {
        sourceUrlInput.value = window.location.href;
    }

    if (window.jQuery && procedureSelect) {
        const $procedureSelect = window.jQuery(procedureSelect);

$procedureSelect.select2({
    placeholder: "Search Procedure*",
    allowClear: true,
    width: "100%",
    minimumInputLength: 0,
    dropdownParent: $(".contact-form"),

    ajax: {
        url: PROCEDURE_CATEGORIES_URL,
        type: "GET",
        dataType: "json",
        delay: 300,
        cache: true,

        data: function (params) {
            return {
                q: params.term || ""
            };
        },

        processResults: function (response) {

            

            const items = response?.data?.procedure_categories || [];

            const results = items.map(function (item) {
                const label = item.name || item.text || "";
                return {
                    id: String(item.id || label),
                    text: label
                };
            });

          

            return {
                results: results,
                pagination: {
                    more: false
                }
            };
        }
    },

    escapeMarkup: function (markup) {
        return markup;
    }
});
 $procedureSelect.on("select2:select", function (e) {
        
    });
    }

    if (nameInput && nameError) {
        nameInput.addEventListener("blur", function () {
            const name = this.value.trim();
            const namePattern = /^[A-Za-z\s]+$/;

            if (name === "") {
                nameError.style.display = "none";
                return;
            }

            if (!namePattern.test(name)) {
                nameError.textContent = "Name cannot contain numbers or special characters.";
                nameError.style.display = "block";
                this.focus();
            } else {
                nameError.style.display = "none";
            }
        });
    }

    if (emailInput && emailError) {
        emailInput.addEventListener("blur", function () {
            const email = this.value.trim();
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (email === "") {
                emailError.style.display = "none";
                return;
            }

            if (!emailPattern.test(email)) {
                emailError.textContent = "Please enter a valid email address.";
                emailError.style.display = "block";
                this.focus();
            } else {
                emailError.style.display = "none";
            }
        });
    }

    if (phoneInput && phoneError) {
        phoneInput.addEventListener("input", function () {
            this.value = this.value.replace(/\D/g, "");

            if (this.value.length > 10) {
                this.value = this.value.substring(0, 10);
            }
        });

        phoneInput.addEventListener("blur", function () {
            const phone = this.value.trim();
            const phonePattern = /^[6-9]\d{9}$/;

            if (phone === "") {
                phoneError.style.display = "none";
                return;
            }

            if (!phonePattern.test(phone)) {
                phoneError.textContent = "Please enter a valid 10-digit mobile number.";
                phoneError.style.display = "block";
                this.focus();
            } else {
                phoneError.style.display = "none";
            }
        });
    }

    if (!contactForm) {
        return;
    }

    contactForm.addEventListener("submit", function (e) {
        e.preventDefault();

        const statusEl = document.getElementById("contactFormStatus");
        const consent = document.getElementById("contact_consent");
        const name = document.getElementById("contact_name").value.trim();
        const email = document.getElementById("contact_email").value.trim();
        const phone = document.getElementById("contact_phone").value.trim();
        const city = document.getElementById("contact_location").value.trim();
        const procedure = document.getElementById("procedure_category").value.trim();
        const message = document.getElementById("contact_message").value.trim();
        let procedureName = "";

        if (window.jQuery && procedureSelect) {
            const selected = window.jQuery(procedureSelect).select2("data");
            if (selected && selected[0] && selected[0].text) {
                procedureName = String(selected[0].text).trim();
            }
        }

        if (!procedureName && procedureSelect && procedureSelect.selectedIndex >= 0) {
            procedureName = (procedureSelect.options[procedureSelect.selectedIndex].text || "").trim();
        }

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
        const phoneDigits = phone.replace(/\D/g, "");

        if (!consent.checked) {
            statusEl.style.display = "block";
            statusEl.style.color = "#dc2626";
            statusEl.textContent = "Please accept the Privacy Policy.";
            return;
        }

        if (
            !name ||
            !email ||
            !city ||
            !procedure ||
            !/^[6-9]\d{9}$/.test(phoneDigits)
        ) {
            statusEl.style.display = "block";
            statusEl.style.color = "#dc2626";
            statusEl.textContent = "Please fill in all required fields with valid information.";
            return;
        }

        statusEl.style.display = "block";
        statusEl.style.color = "#64748b";
        statusEl.textContent = "Sending...";

        fetch(CONTACT_SUBMIT_URL, {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({
                name: name,
                email: email,
                phone: phoneDigits,
                city: city,
                concern: procedureName || procedure,
                procedure_category_id: /^\d+$/.test(procedure) ? procedure : null,
                procedure_name: procedureName || null,
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
            title: "Success!",
              text: response.message,
            confirmButtonColor: "#22c55e"
        });

        contactForm.reset();

        if (window.jQuery && procedureSelect) {
            window.jQuery(procedureSelect).val(null).trigger("change");
        }

        document.getElementById("source_url").value = window.location.href;

        statusEl.style.display = "none";

    } else {
        var errorText = response.message || "Something went wrong.";
        if (response.errors && typeof response.errors === "object") {
            var fieldErrors = Object.values(response.errors).filter(Boolean);
            if (fieldErrors.length) {
                errorText = fieldErrors.join(" ");
            }
        }

        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: errorText,
            confirmButtonColor: "#c95524"
        });

    }
})
.catch(function () {

    Swal.fire({
        icon: "error",
        title: "Error!",
        text: "Something went wrong. Please try again.",
        confirmButtonColor: "#c95524"
    });

});
    });
});