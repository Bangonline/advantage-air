document.addEventListener("DOMContentLoaded", function () {
    var accButtons = document.querySelectorAll(".accordion-button");

    accButtons.forEach(function (button) {
        button.addEventListener("click", function () {
            var activeAccordion = document.querySelector(".accordion-header.active");

            // If there is an active accordion and it's not the one being clicked
            if (activeAccordion && activeAccordion !== this.parentElement) {
                activeAccordion.classList.remove("active");
                activeAccordion.nextElementSibling.style.maxHeight = null;
            }

            // Toggle the current accordion
            this.parentElement.classList.toggle("active");
            var panel = this.parentElement.nextElementSibling;
            if (panel.style.maxHeight) {
                panel.style.maxHeight = null;
            } else {
                panel.style.maxHeight = panel.scrollHeight + "px";
            }
        });
    });
});

//FAQ accordion
document.addEventListener("DOMContentLoaded", function () {
    var faqButtons = document.querySelectorAll(".faq-button");

    faqButtons.forEach(function (button) {
        button.addEventListener("click", function () {
            var activeFaq = document.querySelector(".faq-header.active");

            // If there is an active accordion and it's not the one being clicked
            if (activeFaq && activeFaq !== this.parentElement) {
                activeFaq.classList.remove("active");
                activeFaq.nextElementSibling.style.maxHeight = null;
            }

            // Toggle the current accordion
            this.parentElement.classList.toggle("active");
            var panel = this.parentElement.nextElementSibling;
            if (panel.style.maxHeight) {
                panel.style.maxHeight = null;
            } else {
                panel.style.maxHeight = panel.scrollHeight + "px";
            }
        });
    });
});