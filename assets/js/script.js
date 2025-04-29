jQuery(document).ready(function($) {

    // Botón de búsqueda
    $(".btnSearch").on("click", function() {
        $(".searchSection").toggleClass("isActive");
    });

    // Selector de idioma con fadeToggle
    const $langSelector = $('.language-selector');
    const $toggleBtn = $langSelector.find('.lang-toggle');
    const $dropdown = $langSelector.find('.lang-dropdown');

    $toggleBtn.on("click", function(e) {
        e.stopPropagation();
        $toggleBtn.toggleClass("active");
        $dropdown.fadeToggle(150);
    });

    $(document).on("click", function(e) {
        if (!$langSelector.is(e.target) && $langSelector.has(e.target).length === 0) {
            $dropdown.fadeOut(150);
            $toggleBtn.removeClass("active");
        }
    });

    $('.offCanvasIcon').on('click', function (event) {
        console.log("open!!");
        event.preventDefault(); // Evita que haga scroll al principio
        $('body').addClass('noScroll');
        $('.menuCont .overlay').fadeIn(500);
        $('.offCanvasMenu').toggleClass('open');
    });

    $('.offCanvasMenu .closeOffCanvas').on('click', function () {
        $('body').removeClass('noScroll');
        $('.menuCont .overlay').fadeOut(500);
        $('.offCanvasMenu').removeClass('open submenuIsOpen');
    });

    /*Infinite loop text*/
    const container = document.getElementById('marquee-container');
    const baseSpan = container.querySelector('.base-phrase');
    const spacing = 50;
    const speed = 1.5;
    let activePhrases = [];

    function createPhrase(leftPosition) {
      const clone = baseSpan.cloneNode(true);
      clone.classList.remove('base-phrase');
      clone.classList.add('phrase');
      clone.style.left = `${leftPosition}px`;
      clone.style.position = 'absolute';
      container.appendChild(clone);
      activePhrases.push(clone);
    }

    function fillInitialPhrases() {
      activePhrases.forEach(el => el.remove());
      activePhrases = [];

      let left = 0;
      while (left < container.offsetWidth * 2) {
        const temp = baseSpan.cloneNode(true);
        temp.classList.remove('base-phrase');
        temp.classList.add('phrase');
        temp.style.left = `${left}px`;
        temp.style.position = 'absolute';
        container.appendChild(temp);
        activePhrases.push(temp);
        left += temp.offsetWidth + spacing;
      }
    }

    function loop() {
      for (let i = 0; i < activePhrases.length; i++) {
        const el = activePhrases[i];
        let currentLeft = parseFloat(el.style.left);
        el.style.left = `${currentLeft - speed}px`;
      }

      if (activePhrases.length && parseFloat(activePhrases[0].style.left) + activePhrases[0].offsetWidth < 0) {
        container.removeChild(activePhrases[0]);
        activePhrases.shift();
      }

      const last = activePhrases[activePhrases.length - 1];
      if (last && parseFloat(last.style.left) + last.offsetWidth + spacing < container.offsetWidth) {
        const newLeft = parseFloat(last.style.left) + last.offsetWidth + spacing;
        createPhrase(newLeft);
      }

      requestAnimationFrame(loop);
    }

    window.addEventListener('load', () => {
      baseSpan.style.position = 'absolute';
      baseSpan.style.left = '-9999px';
      fillInitialPhrases();
      loop();
    });

    window.addEventListener('resize', () => {
      fillInitialPhrases();
    });
});