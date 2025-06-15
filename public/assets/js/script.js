AOS.init({
    duration: 1200,
});

const buttons = document.querySelectorAll(".openModal");
const modal = document.getElementById("modal");
const modalImage = document.getElementById("modalImage");
const modalTitle = document.getElementById("modalTitle");
const modalDescription = document.getElementById("modalDescription");
const modalIngredients = document.getElementById("modalIngredients");
const closeModal = document.getElementById("closeModal");
const closeModalButton = document.getElementById("closeModalButton");

buttons.forEach((button) => {
    button.addEventListener("click", () => {
        const title = button.dataset.title;
        const description = button.dataset.description;
        const ingredients = button.dataset.ingredients;
        const image = button.dataset.image;

        modalImage.src = image;
        modalTitle.textContent = title;
        modalDescription.textContent = description;
        modalIngredients.textContent = "Ingredients: " + ingredients;

        modal.classList.remove("hidden");
    });
});

closeModal.addEventListener("click", () => {
    modal.classList.add("hidden");
});
closeModalButton.addEventListener("click", () => {
    modal.classList.add("hidden");
});
