//For User Dashboard

document.addEventListener("DOMContentLoaded", function () {
  //Menu links
  const deathCertificateLink = document.querySelector(
    'a[href="#death-certificate"]'
  );
  const birthCertificateLink = document.querySelector(
    'a[href="#birth-certificate"]'
  );
  const checkStatusLink = document.querySelector('a[href="#check-status"]');

  const bookApppointmentLink = document.querySelector(
    'a[href="#book-appointment"]'
  );

  const apppointmentStatusLink = document.querySelector(
    'a[href="#appointment-status"]'
  );

  // Content
  const deathCertificateForm = document.getElementById(
    "death-certificate-form"
  );
  const birthCertificateForm = document.getElementById(
    "birth-certificate-form"
  );

  const checkStatus = document.getElementById("check-status");

  const bookAppointment = document.getElementById("book-appointment");

  const appointmentStatus = document.getElementById("appointment-status");

  function activateLinkAndContent(link, form) {
    // Deactivate all links
    const allLinks = document.querySelectorAll(".sidebar a");

    console.log(allLinks);
    allLinks.forEach((link) => {
      link.classList.remove("active");
    });

    // Activate the selected link
    link.classList.add("active");

    // Hide all forms
    const allForms = document.querySelectorAll(".dashboard-content");
    allForms.forEach((form) => {
      form.classList.remove("active");
    });

    // Show the corresponding form
    form.classList.add("active");
  }

  deathCertificateLink.addEventListener("click", function (event) {
    event.preventDefault();
    activateLinkAndContent(deathCertificateLink, deathCertificateForm);
  });

  // Event listener for Birth Certificate link
  birthCertificateLink.addEventListener("click", function (event) {
    event.preventDefault();
    activateLinkAndContent(birthCertificateLink, birthCertificateForm);
  });
  checkStatusLink.addEventListener("click", function (event) {
    event.preventDefault();
    activateLinkAndContent(checkStatusLink, checkStatus);
  });

  bookApppointmentLink.addEventListener("click", function (event) {
    event.preventDefault();
    activateLinkAndContent(bookApppointmentLink, bookAppointment);
  });
  apppointmentStatusLink.addEventListener("click", function (event) {
    event.preventDefault();
    activateLinkAndContent(apppointmentStatusLink, appointmentStatus);
  });
});

//For Admin Dashboard

document.addEventListener("DOMContentLoaded", function () {
  //Menu links
  const registrationsLink = document.querySelector(
    'a[href="#birth-registrations"]'
  );
  const deathResgistrationLink = document.querySelector(
    'a[href="#death-registrations"]'
  );
  const appointmentsLink = document.querySelector('a[href="#appointments"]');
  const issuedCertificateLink = document.querySelector(
    'a[href="#issued-certificates"]'
  );

  // Content
  const registrations = document.getElementById("birth-registrations");
  const appointments = document.getElementById("appointments");
  const deathRegistrations = document.getElementById("death-registrations");
  const issuedCertificate = document.getElementById("issued-certificates");

  // Function to activate the selected link and show the corresponding form
  function activateLinkAndContent(link, form) {
    // Deactivate all links
    const allLinks = document.querySelectorAll(".sidebar a");

    console.log(allLinks);
    allLinks.forEach((link) => {
      link.classList.remove("active");
    });

    // Activate the selected link
    link.classList.add("active");

    // Hide all forms
    const allForms = document.querySelectorAll(".dashboard-content");
    allForms.forEach((form) => {
      form.classList.remove("active");
    });

    // Show the corresponding form
    form.classList.add("active");
  }

  registrationsLink.addEventListener("click", function (event) {
    event.preventDefault();
    activateLinkAndContent(registrationsLink, registrations);
  });
  deathResgistrationLink.addEventListener("click", function (event) {
    event.preventDefault();
    activateLinkAndContent(deathResgistrationLink, deathRegistrations);
  });
  appointmentsLink.addEventListener("click", function (event) {
    event.preventDefault();
    activateLinkAndContent(appointmentsLink, appointments);
  });

  issuedCertificateLink.addEventListener("click", function (event) {
    event.preventDefault();
    activateLinkAndContent(issuedCertificateLink, issuedCertificate);
  });
});

//From Validations

function validateForm() {
  var email = document.getElementById("email").value;
  var password = document.getElementById("password").value;

  var feedbackContainer = document.getElementById("feedback");

  // Check if either field is empty
  if (email === "" || password === "") {
    feedbackContainer.textContent = "Please fill in all fields.";
    feedbackContainer.style.color = "red"; // Optional: Apply a red color for the error message
    return false; // Prevent the form from submitting
  }

  feedbackContainer.textContent = "";

  // If all fields are filled, allow the form to submit
  return true;
}

const loginForm = document.getElementById("login-form");
console.log(loginForm);

loginForm.addEventListener("submit", (e) => {
  e.preventDefault();
  console.log("Submit");
});
