const form = document.querySelector("form");
const statusTxt = form.querySelector(".button-area span");

form.onsubmit = (e) => {
  e.preventDefault();  // Form ko submit hone se rokta hai

  statusTxt.style.display = "inline";
  statusTxt.innerText = "Sending your message...";  // Status message update

  let xhr = new XMLHttpRequest();
  xhr.open("POST", "message.php", true);
  xhr.onload = () => {
    if (xhr.readyState == 4 && xhr.status == 200) {
      let response = xhr.responseText.trim();
      statusTxt.innerText = response;

      if (response.includes("Success")) {
        form.reset();  // Reset the form on success
      }
    }
  };

  let formData = new FormData(form);  // Form data ko submit karte hain
  xhr.send(formData);
};
