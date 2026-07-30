const nameInput = document.getElementById("contact_name");
const nameError = document.getElementById("nameError");

nameInput.addEventListener("blur", function () {

    const name = this.value.trim();

    // Sirf letters aur spaces allow
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
const emailInput = document.getElementById("contact_email");
const emailError = document.getElementById("emailError");

emailInput.addEventListener("blur", function () {

    const email = this.value.trim();

    if (email === "") {
        emailError.style.display = "none";
        return;
    }

    // Email validation
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!emailPattern.test(email)) {

        emailError.textContent = "Please enter a valid email address.";
        emailError.style.display = "block";
        this.focus();

    } else {

        emailError.style.display = "none";

    }

});

const phoneInput = document.getElementById("contact_phone");
const phoneError = document.getElementById("phoneError");

// Sirf numbers allow
phoneInput.addEventListener("input", function () {

    this.value = this.value.replace(/\D/g, "");

    if (this.value.length > 10) {
        this.value = this.value.substring(0, 10);
    }

});

// Validation on blur
phoneInput.addEventListener("blur", function () {

    const phone = this.value.trim();

    if (phone === "") {
        phoneError.style.display = "none";
        return;
    }

    const phonePattern = /^[6-9]\d{9}$/;

    if (!phonePattern.test(phone)) {

        phoneError.textContent = "Please enter a valid 10-digit mobile number.";
        phoneError.style.display = "block";
        this.focus();

    } else {

        phoneError.style.display = "none";

    }

});

//
document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("source_url").value = window.location.href;
});

document.getElementById("contactForm").addEventListener("submit", function (e) {

    e.preventDefault();

    var statusEl = document.getElementById("contactFormStatus");

    // Consent Checkbox
    var consent = document.getElementById("contact_consent");

    // Form Fields
    var name = document.getElementById("contact_name").value.trim();
    var email = document.getElementById("contact_email").value.trim();
    var phone = document.getElementById("contact_phone").value.trim();
    var city = document.getElementById("contact_location").value.trim();
    var procedure = document.getElementById("procedure_category").value.trim();
    var message = document.getElementById("contact_message").value.trim();

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

    var phoneDigits = phone.replace(/\D/g, "");

    // Consent Validation
    if (!consent.checked) {
        statusEl.style.display = "block";
        statusEl.style.color = "#dc2626";
        statusEl.textContent = "Please accept the Privacy Policy.";
        return;
    }

    // Other Validation
    if (
        !name ||
        !email ||
        !city ||
        !procedure ||
        !source_url ||
        !source_id ||
        !campaign_id ||
        !campaign_name ||
        !form_id ||
        !form_name ||
        !/^[6-9]\d{9}$/.test(phoneDigits)
    ) {

        statusEl.style.display = "block";
        statusEl.style.color = "#dc2626";
        statusEl.textContent = "Please fill in all required fields with valid information.";
        return;
    }

    // Sending
    statusEl.style.display = "block";
    statusEl.style.color = "#64748b";
    statusEl.textContent = "Sending...";
console.log("Procedure Search:", document.getElementById("procedure_search").value);
console.log("Procedure Hidden:", document.getElementById("procedure_category").value);
console.log("Procedure Variable:", procedure);

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

    .then(function (response) {

        if (response.status) {

            statusEl.style.color = "#15803d";
            statusEl.textContent = response.message || "Thank you. Our team will contact you shortly.";

            document.getElementById("contactForm").reset();
            // document.getElementById("procedure_search").value = "";
            // document.getElementById("procedure_category").value = "";
            document.getElementById("source_url").value = window.location.href;

        } else {

            statusEl.style.color = "#dc2626";
            statusEl.textContent = response.message || "Something went wrong.";

        }

    })

    .catch(function () {

        statusEl.style.color = "#dc2626";
        statusEl.textContent = "Something went wrong. Please try again.";

    });

});

// document.getElementById('contactForm').addEventListener('submit', function (e) {
//     e.preventDefault();
    
//     var statusEl = document.getElementById('contactFormStatus');
//     var name = document.getElementById('contact_name').value.trim();
//     var email = document.getElementById('contact_email').value.trim();
//     var phone = document.getElementById('contact_phone').value.trim();
//     var city = document.getElementById('contact_location').value.trim();
//     var message = document.getElementById('contact_message').value.trim();
//     var phoneDigits = phone.replace(/\D/g, '');

//     if (!name || !email || !city || !/^[6-9]\d{9}$/.test(phoneDigits)) {

//         statusEl.style.display = 'block';
//         statusEl.style.color = '#b45309';
//         statusEl.textContent = 'Please fill in all required fields with a valid phone number.';
//         return;

//     }

//     statusEl.style.display = 'block';
//     statusEl.style.color = '#64748b';
//     statusEl.textContent = 'Sending...';

//     fetch(FORM_HANDLER_URL, {

//         method: 'POST',

//         headers: {
//             'Content-Type': 'application/json'
//         },

//         body: JSON.stringify({

//             action: 'save_lead',
//             name: name,
//             email: email,
//             phone: phoneDigits,
//             city: city,
//             concern: 'not-sure',
//             source_url: window.location.href + (message ? ' | Message: ' + message : '')

//         })

//     })

//     .then(response => response.json())

//     .then(function () {

//         statusEl.style.color = '#15803d';
//         statusEl.textContent = 'Thank you. Our team will contact you shortly.';

//         document.getElementById('contactForm').reset();

//     })

//     .catch(function () {

//         statusEl.style.color = '#15803d';
//         statusEl.textContent = 'Thank you. Our team will contact you shortly.';

//         document.getElementById('contactForm').reset();

//     });

// });


document.addEventListener("DOMContentLoaded", function () {

    const input = document.getElementById("procedure_search");
    const hidden = document.getElementById("procedure_category");
    const dropdown = document.getElementById("procedure_dropdown");
    const clearBtn = document.getElementById("clearProcedure");

    let debounceTimer;

    loadProcedures("");

    function loadProcedures(keyword = "") {

        let url = API_BASE_URL + "/procedure-categories";

        if (keyword !== "") {
            url += "?q=" + encodeURIComponent(keyword);
        }

        fetch(url, {

            method: "GET",

            headers: {
                "Accept": "application/json"
            }

        })

        .then(res => res.json())

        .then(function (response) {

            dropdown.innerHTML = "";

            if (
                response.status &&
                response.data &&
                response.data.procedure_categories &&
                response.data.procedure_categories.length
            ) {

                response.data.procedure_categories.forEach(function (item) {

                    const div = document.createElement("div");

                    div.className = "procedure-item";
                    div.textContent = item.name;

                div.addEventListener("click", function () {

    input.value = item.name;   // User ko name dikhega
    hidden.value = item.id;    // Hidden field me ID save hogi

    dropdown.style.display = "none";
    clearBtn.style.display = "flex";

});
                    dropdown.appendChild(div);

                });

                if (document.activeElement === input) {
                    dropdown.style.display = "block";
                }

            } else {

                dropdown.innerHTML =
                    '<div class="procedure-item">No Record Found</div>';

                if (document.activeElement === input) {
                    dropdown.style.display = "block";
                }

            }

        })

        .catch(function (error) {

            console.error(error);

        });

    }

    input.addEventListener("focus", function () {

        if (input.value.trim() === "") {
            loadProcedures("");
        }

    });

    input.addEventListener("input", function () {

    if (this.value.trim() === "") {
        hidden.value = "";
        clearBtn.style.display = "none";
    }

    clearTimeout(debounceTimer);

    debounceTimer = setTimeout(function () {

            let keyword = input.value.trim();

            if (keyword === "") {
                loadProcedures("");
            } else {
                loadProcedures(keyword);
            }

        }, 800);

    });

    document.addEventListener("click", function (e) {

        if (!e.target.closest(".procedure-search-wrapper")) {

            dropdown.style.display = "none";

        }

    });
    clearBtn.addEventListener("click", function () {

    input.value = "";
    hidden.value = "";

    this.style.display = "none";

    input.focus();
    loadProcedures("");

});

});