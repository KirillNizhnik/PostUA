(() => {
    const refs = {
        openModalBtn: document.querySelector("[data-modal-open]"),
        closeModalBtn: document.querySelector("[data-modal-close]"),
        modal: document.querySelector("[data-modal]"),
    };
    const menuItems = document.querySelectorAll('.mobile-menu__item ');

    refs.openModalBtn.addEventListener("click", toggleModal);
    refs.closeModalBtn.addEventListener("click", toggleModal);

    function toggleModal() {
        refs.modal.classList.toggle("is-hidden");
        refs.closeModalBtn.classList.toggle("active-btn");
        refs.openModalBtn.classList.toggle("inactive-btn")
    }
    menuItems.forEach(item => {
        item.addEventListener('click', () => {
            toggleModal(); // Закрывает модальное окно при нажатии на элемент меню
        });
    });
})();


