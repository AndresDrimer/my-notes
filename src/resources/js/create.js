// Para mostrar la alerta y la capa de superposición
let closeBtn = document.querySelector(".close");
let alertModal = document.querySelector(".alert");
let overlay = document.querySelector(".back-overlay");
closeBtn.addEventListener("click", () => {
    alertModal.style.display = 'none';
    overlay.style.display = 'none';
});
