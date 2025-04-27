document.addEventListener("DOMContentLoaded", function() {
    function startInit() {
        const logo = document.querySelector("body .logoHeader"); 
        const headerContent = document.querySelector("header .contentHeader"); 
        document.body.classList.add("noScroll");

        setTimeout(() => { 
            document.body.classList.add("startInit");
        }, 2600);

        logo.addEventListener('transitionend', (event) => {
            if (event.propertyName === 'transform') {
                headerContent.classList.add('showHeader');
                document.body.classList.remove('noScroll');
            }
        });
    }

    startInit();
});
