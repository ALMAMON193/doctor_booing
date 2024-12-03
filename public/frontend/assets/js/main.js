$(document).ready(function () {


});

$('.owl-carousel').owlCarousel({
  loop: true,
  margin: 10,
  responsive: {
    0: {
      items: 1
    },
    300: {
      items: 1
    },
    600: {
      items: 2
    },
    1000: {
      items: 3
    }
  }
})


// Function for PIN box validation
function initializePinBoxes() {
  const pinBoxes = document.querySelectorAll(".pin-box");

  // Move to the next box when inputting values
  pinBoxes.forEach((box, index) => {
    box.addEventListener("input", () => {
      if (box.value.length === 1 && index < 3) {
        pinBoxes[index + 1].focus();
      }
    });

    // Move to the previous box on backspace
    box.addEventListener("keydown", (e) => {
      if (e.key === "Backspace" && index > 0 && box.value === "") {
        pinBoxes[index - 1].focus();
      }
    });
  });

  // Handle pasting of PIN
  pinBoxes[0].addEventListener("paste", (e) => {
    const pastedData = e.clipboardData.getData("text");
    const pinArray = pastedData.split("");

    pinBoxes.forEach((box, idx) => {
      if (pinArray[idx]) {
        box.value = pinArray[idx];
      }
    });
  });
}



// for mobile sidebar toggle
document.addEventListener('DOMContentLoaded', function () {
  // Toggle menu and body scroll on menu click
  document.querySelector('.mobile-menu').addEventListener('click', function () {
    document.querySelector('header').classList.toggle('show');
    document.body.classList.toggle('no-scroll');
  });

  // Close the sidebar if clicking outside of it
  document.addEventListener('click', function (event) {
    // Check if the click is outside the sidebar and the menu button
    if (!event.target.closest('header') && !event.target.closest('.mobile-menu')) {
      if (document.querySelector('header').classList.contains('show')) {
        document.querySelector('header').classList.remove('show');
        document.body.classList.remove('no-scroll');
      }
    }
  });

  // close via close btn
  document.querySelector('.close-sidebar-btn').addEventListener('click', () => {
    document.querySelector('header').classList.remove('show');
    document.body.classList.remove('no-scroll');
  })
});


// password hide and show code 
// Select all eye icons with the class 'toggle-password'
const toggleIcons = document.querySelectorAll('.toggle-password');

toggleIcons.forEach(icon => {
  icon.addEventListener('click', function () {
    // Get the associated input by its data-input attribute
    const inputId = icon.getAttribute('data-input');
    const inputField = document.getElementById(inputId);

    // Toggle the input type between 'password' and 'text'
    if (inputField.type === 'password') {
      inputField.type = 'text';
      icon.src = './assets/images/eye-on.svg';
    } else {
      inputField.type = 'password';
      icon.src = './assets/images/eye-off.svg';
    }
  });
});



// file uploader

document.addEventListener('DOMContentLoaded', function () {
  const uploadArea = document.getElementById('upload-area');
  const fileInput = document.getElementById('profile');
  const uploadText = document.getElementById('upload-text');
  const uploadIcon = document.getElementById('upload-icon');
  const previewArea = document.createElement('div'); // Create a preview area
  previewArea.id = 'preview-area';
  previewArea.style.marginTop = '10px';
  uploadArea.appendChild(previewArea); // Append it to the upload area

  // Trigger file input click only when clicking within the upload area
  uploadArea.addEventListener('click', (event) => {
    if (!event.target.classList.contains('remove-icon')) {
      fileInput.click();
    }
  });

  // Handle file input change
  fileInput.addEventListener('change', () => {
    const files = fileInput.files;
    if (files.length > 0) {
      displayFileNameAndPreview(files[0]);
    }
  });

  function displayFileNameAndPreview(file) {
    // Hide the upload icon and update text to display file name
    uploadIcon.style.display = 'none';
    uploadText.innerHTML = `${file.name} <span class="remove-icon" style="cursor:pointer; color:#ff0000; font-size: 15px; margin-left: 10px;">❌</span>`;

    // Add event listener to the remove icon
    const removeIcon = uploadText.querySelector('.remove-icon');
    removeIcon.addEventListener('click', (event) => {
      event.stopPropagation(); // Prevent click from propagating to uploadArea
      resetUploadArea();
    });

    // Clear previous preview and show new preview
    previewArea.innerHTML = '';
    const fileReader = new FileReader();
    fileReader.onload = function (e) {
      const img = document.createElement('img');
      img.src = e.target.result;
      img.alt = 'Uploaded Image';
      img.style.maxWidth = '100px';
      img.style.borderRadius = '5px';
      img.style.marginTop = '10px';
      previewArea.appendChild(img);
    };
    fileReader.readAsDataURL(file);
  }

  function resetUploadArea() {
    // Reset display and clear file input
    fileInput.value = '';
    uploadIcon.style.display = 'inline';
    uploadText.textContent = 'Upload Profile Pic';
    previewArea.innerHTML = ''; // Clear preview area
  }
});
document.addEventListener('DOMContentLoaded', function () {
  const uploadArea = document.getElementById('upload-profile');
  const fileInput = document.getElementById('profile_preview');
  const uploadText = document.getElementById('upload-profile-text');
  const uploadIcon = document.getElementById('profile-upload-icon');
  const previewArea = document.createElement('div'); // Create a preview area for the image
  previewArea.id = 'preview-area';
  previewArea.style.marginTop = '10px';
  uploadArea.appendChild(previewArea); // Append preview area to the upload area

  // Trigger the file input when the upload area is clicked
  uploadArea.addEventListener('click', () => {
    fileInput.click();
  });

  // Handle file input change (when a user selects a file)
  fileInput.addEventListener('change', () => {
    const files = fileInput.files;
    if (files.length > 0) {
      displayFileNameAndPreview(files[0]);
    }
  });

  function displayFileNameAndPreview(file) {
    // Hide the upload icon and update text to display the file name
    uploadIcon.style.display = 'none';
    uploadText.innerHTML = `${file.name} <span class="remove-icon" style="cursor:pointer; color:#ff0000; font-size: 15px; margin-left: 10px;">❌</span>`;

    // Add event listener to the remove icon to reset the upload area
    const removeIcon = uploadText.querySelector('.remove-icon');
    removeIcon.addEventListener('click', (event) => {
      event.stopPropagation(); // Prevent click event from propagating to upload area
      resetUploadArea();
    });

    // Clear previous preview and display the new one
    previewArea.innerHTML = '';
    const fileReader = new FileReader();
    fileReader.onload = function (e) {
      const img = document.createElement('img');
      img.src = e.target.result;
      img.alt = 'Uploaded Image';
      img.style.maxWidth = '100px';
      img.style.borderRadius = '5px';
      img.style.marginTop = '10px';
      previewArea.appendChild(img);
    };
    fileReader.readAsDataURL(file);
  }

  function resetUploadArea() {
    // Reset the upload area to initial state
    fileInput.value = ''; // Clear the file input
    uploadIcon.style.display = 'inline'; // Show the upload icon again
    uploadText.textContent = 'Upload Pic'; // Reset the upload text
    previewArea.innerHTML = ''; // Clear preview area
  }
});






// date picker

// Get the custom calendar icon and date input
const calendarIcon = document.querySelector('.custom-calendar-icon');
const dateInput = document.getElementById('appointment-date');

// Add an event listener to the custom icon to trigger the date picker
calendarIcon.addEventListener('click', function () {
  dateInput.showPicker(); // Only works if the input type is "date" and supported in the browser
});