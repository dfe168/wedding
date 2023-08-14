const attendees = (state) => {
    if (state == false) {
        document.getElementById('attendeed').className = 'd-none';
    }
    else {
        document.getElementById('attendeed').className = '';
    }
}

const acco = (state) => {
    if (state == false) {
        document.getElementById('acco_info').className = 'd-none row mt-3';
    }
    else {
        document.getElementById('acco_info').className = 'row mt-3';
    }
}

document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById("phone");
    const iti = window.intlTelInput(input, {
        initialCountry: "auto",
        geoIpLookup: callback => {
            fetch("https://ipapi.co/json")
                .then(res => res.json())
                .then(data => {
                    callback(data.country_code);
                })
                .catch(() => callback("us"));
        },
    });

    // Access your form and set the phoneNum field value
    const form = document.getElementById('myForm');
    
    // When the form is submitted
    form.addEventListener('submit', (event) => {
        event.preventDefault(); // Prevent default form submission
        
        // Get the selected country code from intlTelInput
        const selectedCountryData = iti.getSelectedCountryData();
        const countryCode = selectedCountryData.dialCode;
        
        // Combine country code and phone number
        const fullPhoneNumber = `+${countryCode}${input.value}`;
        
        // Set the combined phone number value back to the input field
        input.value = fullPhoneNumber;

        // Manually submit the form
        form.submit();
    });
});



