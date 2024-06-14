document.addEventListener("DOMContentLoaded", function() {
    const tabs = document.querySelectorAll('.tab-link');
    tabs.forEach(tab => {
        tab.addEventListener('click', function() {
            document.querySelectorAll('.tab-link').forEach(link => link.classList.remove('current'));
            document.querySelectorAll('.tabs-content').forEach(content => content.classList.remove('current'));
            
            this.classList.add('currently');
            const content = document.querySelector(`.${this.getAttribute('data-tab')}`);
            if (content) {
                content.classList.add('currently');
            } else {
                console.error(`Element with class ${this.getAttribute('data-tab')} not found.`);
            }
        });
    });
});
