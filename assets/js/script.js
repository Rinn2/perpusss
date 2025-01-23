const navlist = document.querySelector(".navlist");
const menuBtn = document.querySelector(".ri-menu-line");

menuBtn.onclick = function () {
  navlist.classList.toggle("active");
  menuBtn.classList.toggle("ri-arrow-up-double-line");
};

window.addEventListener("scroll", () => {
  document.querySelector("nav").classList.toggle("scrolling", scrollY > 50);
});

const daftarTabs = document.querySelectorAll(".daftar-tab");
const tabContents = document.querySelectorAll(".tab-content");

function tabOpen(tabId, element) {
    daftarTabs.forEach(tab => tab.classList.remove("active"));
    tabContents.forEach(content => content.classList.remove("active-content"));

    document.getElementById(tabId).classList.add("active-content");
    element.classList.add("active");
}
//Login//
  function openModal(modalId) {
      document.getElementById(modalId).style.display = "flex";
  }

  function closeModal(modalId) {
      document.getElementById(modalId).style.display = "none";
  }

  function switchModal(currentModalId, targetModalId) {
      closeModal(currentModalId);
      openModal(targetModalId);
  }

  window.onclick = function(event) {
      if (event.target.classList.contains('modal')) {
          closeModal(event.target.id);
      }
  }
  function openModal(modalId) {
    document.getElementById(modalId).style.display = "flex";
  }
  
  function closeModal(modalId) {
    document.getElementById(modalId).style.display = "none";
  }
  
  function switchModal(currentModalId, targetModalId) {
    closeModal(currentModalId);
    openModal(targetModalId);
  }
  
  function handleLogin(event) {
    event.preventDefault();
    closeModal('loginModal');
    document.getElementById('loginListItem').style.display = 'none';
    document.getElementById('userIcon').style.display = 'block';
  }
  
  function handleCreateAccount(event) {
    event.preventDefault();
    // Simulate successful account creation
    switchModal('createAccountModal', 'loginModal');
  }
  
  function handleLogout() {
    document.getElementById('userIcon').style.display = 'none';
    document.getElementById('loginListItem').style.display = 'block';
  }
  
  function toggleDropdown() {
    const dropdownContent = document.getElementById('dropdownContent');
    dropdownContent.style.display = dropdownContent.style.display === 'block' ? 'none' : 'block';
  }
  
  window.onclick = function(event) {
    if (event.target.classList.contains('modal')) {
      closeModal(event.target.id);
    }
  }
  


let themeBtn = document.querySelector("#theme-btn");

themeBtn.onclick = function () {
  themeBtn.classList.toggle("ri-sun-line");
  if (themeBtn.classList.contains("ri-sun-line")) {
    document.body.classList.add("active");
  } else {
    document.body.classList.remove("active");
  }
};

const typed = new Typed(".multiple-text", {
  strings: ["For The Next Generation Of Innovators", "Transforming Tomorrow through Information Systems Innovation", "UI/UX Designer"],
  typeSpeed: 100,
  backSpeed: 100,
  backDelay: 1000,
  loop: true,
});

const sr = ScrollReveal({
  distance: "200px",
  duration: 3500,
  delay: 200,
  reset: true,
});

sr.reveal(".home-container h3", { origin: "top" });
sr.reveal(".home-container h1", { origin: "left" });
sr.reveal(".home-container p", { origin: "left" });
sr.reveal(".home-container .right", { origin: "right" });
sr.reveal(".social-icons-container", { origin: "right" });
sr.reveal(".about-container .title", { origin: "right" });
sr.reveal(".about-container h3", { origin: "bottom" });
sr.reveal(".about-container p", { origin: "bottom" });
sr.reveal(".about-container .left", { origin: "left" });
sr.reveal(".about-container .right", { origin: "right" });
sr.reveal(".fasilitas .title", { origin: "top" });
sr.reveal(".fasilitas .content-1", { origin: "left" });
sr.reveal(".fasilitas .content-2", { origin: "right" });
sr.reveal(".daftar-container", { origin: "bottom" });
sr.reveal(".daftar.title", { origin: "top" });
sr.reveal(".daftar-buttons", { origin: "left" });
sr.reveal(".Kritik .title", { origin: "right" });
sr.reveal(".Kritik .Kritik-container", { origin: "left" });
sr.reveal(".contact .title", { origin: "top" });
sr.reveal(".contact .row .box", { origin: "right" });
sr.reveal(".contact .row .contact-form", { origin: "left" });
