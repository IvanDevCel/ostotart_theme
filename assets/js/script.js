jQuery(document).ready(function($) {
    AOS.init();

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
    let animationFrameId;
    
    function createPhrase(leftPosition) {
      const clone = baseSpan.cloneNode(true);
      clone.classList.remove('base-phrase');
      clone.classList.add('phrase');
      clone.style.left = `${leftPosition}px`;
      container.appendChild(clone);
      activePhrases.push(clone);
    }
    
    function measurePhraseWidth() {
      const probe = baseSpan.cloneNode(true);
      probe.classList.remove('base-phrase');
      probe.classList.add('phrase');
      probe.style.visibility = 'hidden';
      probe.style.position = 'absolute';
      probe.style.left = '0px';
      container.appendChild(probe);
    
      const width = probe.offsetWidth;
      container.removeChild(probe);
    
      return width;
    }
    
    function fillInitialPhrases() {
      activePhrases.forEach(el => el.remove());
      activePhrases = [];
    
      const phraseWidth = measurePhraseWidth();
      const containerWidth = container.offsetWidth;
      const targetWidth = containerWidth * 2.5; // cubrimos más para evitar parones
    
      let left = 0;
      while (left < targetWidth) {
        createPhrase(left);
        left += phraseWidth + spacing;
      }
    
      if (activePhrases.length > 0) {
        activePhrases[0].style.left = '0px'; // aseguramos que arranque en el borde
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
      if (last) {
        const lastLeft = parseFloat(last.style.left);
    
        // 💥 Medimos bien el ancho real antes de clonar
        const phraseWidth = measurePhraseWidth();
    
        if (lastLeft + phraseWidth + spacing < container.offsetWidth * 2.5) {
          const newLeft = lastLeft + last.offsetWidth + spacing;
          createPhrase(newLeft);
        }
      }
    
      animationFrameId = requestAnimationFrame(loop);
    }
    
    function resetMarquee() {
      cancelAnimationFrame(animationFrameId);
      fillInitialPhrases();
      loop();
    }
    
    window.addEventListener('load', () => {
      baseSpan.style.position = 'absolute';
      baseSpan.style.left = '-9999px'; // Lo sacamos sin romper el flow
      resetMarquee();
    });
    
    window.addEventListener('resize', () => {
      resetMarquee();
    });
    
});