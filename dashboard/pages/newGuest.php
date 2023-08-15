<?php
if (!defined('INCLUDED')) {
  die('Access denied');
}
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/css/intlTelInput.css">
<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/intlTelInput.min.js"></script>

<h3>Create new Guest</h3>
<hr>
<form id="myForm">
  <div class="form-group">
    <label for="">Guest name</label>
    <input type="text" name="name" id="name" class="form-control" required>
    <small class="form-text text-muted">First and surname</small>
  </div>

  <div class="form-group">
    <label for="">Whatsapp number</label><br>
    <input type="number" class="form-control no-spin" id="phoneNum" >
  </div>

  <button type="submit" id="btnCreate" class="btn btn-primary">Create</button>
</form>

<div class="hidden" id="resDiv">
  <hr>
  <p id="message" ></p>
  <button class="btn btn-success" id="whatsapp" >Send with whatsapp</button>
  <button class="btn btn-secondary" id="copy" >Copy to clipboard</button>
</div>

<script>
  document.addEventListener('DOMContentLoaded', (event) => {

    const form = document.querySelector("#myForm");
    const name = document.querySelector("#name");
    const btnCreate = document.querySelector("#btnCreate");
    const resDiv = document.querySelector('#resDiv');
    const message = document.querySelector('#message');
    const whatsappBtn = document.querySelector('#whatsapp');
    const copyBtn = document.querySelector('#copy');


    const input = document.querySelector("#phoneNum");
    window.intlTelInput(input, {
      initialCountry: "auto",
      geoIpLookup: callback => {
        fetch("https://ipapi.co/json")
          .then(res => res.json())
          .then(data => callback(data.country_code))
          .catch(() => callback("us"));
      },

    });
   
   

    btnCreate.addEventListener('click', function(event) {
      //event.preventDefault();
      const input = document.querySelector("#phoneNum");
      const iti = window.intlTelInputGlobals.getInstance(input);
      const phoneNumber = input.value;
      const selectedCountryData = iti.getSelectedCountryData();
      const fullPhoneNumber = "+" + selectedCountryData.dialCode + phoneNumber;

      fetch('./api/guest.php?api=create', {
          method: 'post',
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify({
            name: name.value,
            fullPhoneNumber: fullPhoneNumber,
          }),
        }).then((response) => response.json())
        .then((data) => {
          if(data.error){
            resDiv.className = 'warning';
            message.innerHTML = data.message;
          }else{
            resDiv.className = 'info';
            message.innerHTML = data.message;
          }
          
          //message whatsapp or copy
          whatsappBtn.addEventListener('click', ()=>{
            openWhatsApp(data.phoneNum, data.token)
          });

          //message copy to clipboard
          copyBtn.addEventListener('click', ()=>{
            copyToClipboard(data.token)
          });

          form.reset();

        })

     
    });

    form.addEventListener("submit", function(event) {
      event.preventDefault();
    });

  });

  function openWhatsApp(phoneNumber, token) {
    // Define the phone number and message

    //const phoneNumber = '+642718653'; // Replace with the recipient's phone number
    const message = "Hello, this is a WhatsApp message!\n\n *Registration link:*\nhttp://127.0.0.1/wedding/rsvpacm.html?t="+token;

    // Encode the message and create the WhatsApp URL
    const encodedMessage = encodeURIComponent(message);
    const whatsappUrl = `whatsapp://send?phone=${phoneNumber}&text=${encodedMessage}`;

    // Open the WhatsApp app
    window.location.href = whatsappUrl;
  }

  function copyToClipboard(token) {
    const text = "http://127.0.0.1/wedding/rsvpacm.html?t="+token;
    // Create a temporary textarea element
    const textarea = document.createElement('textarea');
    textarea.value = text;

    document.body.appendChild(textarea);
    textarea.select();
    document.execCommand('copy');

    // Remove the textarea from the DOM
    document.body.removeChild(textarea);
    alert('Message is copied, you can past anywhere you like.')
  }
</script>

<style>
  .iti--allow-dropdown input {
    padding-right: 170px !important;
  }

  .warning {
    color: red;
    font-size: 1.2em;
    font-weight: bold;
  }

  .info {
    font-size: 1.2em;
    font-weight: bold;
  }

  .hidden {
    display: none;
  }
</style>