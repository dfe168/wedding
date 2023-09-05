
const token = () => {
    // Get the current URL
    const url = new URL(window.location.href);
    // Get the URLSearchParams object from the URL
    const params = new URLSearchParams(url.search);
    // Retrieve individual parameters
    const token = params.get('t');

    return token;
}

document.addEventListener('DOMContentLoaded', function () {
    const retrievedToken = token();

    const tokenInput = document.getElementById('tokenInput');
    if (tokenInput) {
        tokenInput.value = retrievedToken;
    }
});



const loadDetails = (data) => {

    const formDetails = document.getElementById('attendeed');
    if (data.attend == 0) {
        document.getElementById('notAttending').checked = true;
        formDetails.className = 'd-none';
    } else {
        document.getElementById('attending').checked = true;
        formDetails.className = '';

        document.getElementById('adults').value = data.adults;
        document.getElementById('children').value = data.children;


        if (data.accommodation == 1) {
            document.getElementById('accommodation_yes').checked = true
            document.getElementById('acco_info').className = 'row mt-3';

            document.getElementById('in_datetime').value = data.flight_in_datetime.replace(/:\d{2}$/, '');
            document.getElementById('in_flightnum').value = data.flight_in_num;
            document.getElementById('from').value = data.flight_from

            document.getElementById('out_datetime').value = data.flight_out_datetime.replace(/:\d{2}$/, '');;
            document.getElementById('out_flightnum').value = data.flight_out_num
            document.getElementById('to').value = data.flight_to
        }
        else {
            document.getElementById('accommodation_yes').checked = false
            document.getElementById('acco_info').className = 'row mt-3 d-none';

        }
    }

}

const parsingPhoneNum = (phoneNumber) => {
    const input = document.getElementById('phone');
    // Initialize intlTelInput
    const iti = window.intlTelInput(input, {
        initialCountry: 'auto',
        geoIpLookup: callback => {
            fetch('https://ipapi.co/json')
                .then(res => res.json())
                .then(data => callback(data.country_code))
                .catch(() => callback('us'));
        }
    });

    // Set the initial value of the input field using intlTelInput API
    iti.setNumber(phoneNumber);

    // Get the selected country data
    const selectedCountryData = iti.getSelectedCountryData();

    // Extract the country code
    const countryCode = selectedCountryData.dialCode;

    // Extract the local number
    const localNumber = phoneNumber.replace(`+${countryCode}`, '');

    document.querySelector('#phone').value = localNumber;


}

if (token()) {

    /* POST request to API */
    fetch('./dashboard/api/form.php?api=fetchFormData', {
        method: 'post',
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({
            token: token(),
        }),
    })
        .then((response) => response.json())
        .then((data) => {
            document.querySelector('#name').value = data.name
            parsingPhoneNum(data.phone);
            if (data.rsvp_completed == 1) {
                loadDetails(data);
            }
        })
        .catch((err) => {
            console.log('invalid token');
        })
}





