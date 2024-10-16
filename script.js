const form = document.querySelector("form");
const statusTxt = form.querySelector(".button-area span");

form.onsubmit = (e) => {
  e.preventDefault();  

  statusTxt.style.display = "inline";
  statusTxt.innerText = "Sending your message...";  /

  let xhr = new XMLHttpRequest();
  xhr.open("POST", "message.php", true);
  xhr.onload = () => {
    if (xhr.readyState == 4 && xhr.status == 200) {
      let response = xhr.responseText.trim();
      statusTxt.innerText = response;

      if (response.includes("Success")) {
        form.reset();  
      }
    }
  };

  let formData = new FormData(form);  // Form data ko submit karte hain
  xhr.send(formData);
};
