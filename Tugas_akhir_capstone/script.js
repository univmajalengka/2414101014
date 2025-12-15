// Interaksi: smooth scroll, simple carousel, mobile nav
document.addEventListener('DOMContentLoaded', () => {
    console.log('Halaman Desa Wisata Bantaragung siap!');

    // Smooth scroll for internal links
    document.querySelectorAll('a[href^="#"]').forEach(a => {
        a.addEventListener('click', function (e) {
            const targetId = this.getAttribute('href');
            if (targetId === '#' || targetId === '') return;
            const target = document.querySelector(targetId);
            if (target) {
                e.preventDefault();
                target.scrollIntoView({behavior: 'smooth', block: 'start'});
                // close mobile nav if open
                const navList = document.getElementById('nav-list');
                if (navList && navList.classList.contains('open')) navList.classList.remove('open');
            }
        });
    });

    // Mobile nav toggle
    const navToggle = document.querySelector('.nav-toggle');
    const navList = document.getElementById('nav-list');
    if (navToggle && navList) {
        navToggle.addEventListener('click', () => {
            const expanded = navToggle.getAttribute('aria-expanded') === 'true';
            navToggle.setAttribute('aria-expanded', String(!expanded));
            navList.classList.toggle('open');
        });
    }

    // Carousel: single-slide view + drag/swipe support + autoplay
    const carousel = document.querySelector('.hero-carousel');
    const track = document.querySelector('.carousel-track');
    if (carousel && track) {
        const slides = Array.from(track.children);
        const slideCount = slides.length;
        let index = 0;
        let autoplayInterval = null;
        let isDragging = false;
        let startX = 0;
        let currentTranslate = 0;
        let prevTranslate = 0;
        const threshold = 50; // px to consider as swipe

        // prevent default image drag
        slides.forEach(img => img.setAttribute('draggable','false'));

        function getSlideWidth(){
            return carousel.clientWidth;
        }

        function setTrackPositionByIndex(i, withTransition = true){
            const slideW = getSlideWidth();
            if (withTransition) track.style.transition = 'transform 0.6s ease';
            else track.style.transition = 'none';
            track.style.transform = `translateX(${-i * slideW}px)`;
            prevTranslate = -i * slideW;
            currentTranslate = prevTranslate;
        }

        function nextSlide(){
            index = (index + 1) % slideCount;
            setTrackPositionByIndex(index);
        }

        function prevSlide(){
            index = (index - 1 + slideCount) % slideCount;
            setTrackPositionByIndex(index);
        }

        // autoplay
        function startAutoplay(){
            stopAutoplay();
            autoplayInterval = setInterval(nextSlide, 4000);
        }
        function stopAutoplay(){
            if (autoplayInterval) { clearInterval(autoplayInterval); autoplayInterval = null; }
        }

        // pointer handlers for drag/swipe
        function pointerDown(e){
            stopAutoplay();
            isDragging = true;
            track.classList.add('grabbing');
            startX = (e.type.includes('touch')) ? e.touches[0].clientX : e.clientX;
            track.style.transition = 'none';
        }

        function pointerMove(e){
            if (!isDragging) return;
            const currentX = (e.type.includes('touch')) ? e.touches[0].clientX : e.clientX;
            const dx = currentX - startX;
            currentTranslate = prevTranslate + dx;
            track.style.transform = `translateX(${currentTranslate}px)`;
        }

        function pointerUp(e){
            if (!isDragging) return;
            isDragging = false;
            track.classList.remove('grabbing');
            const slideW = getSlideWidth();
            const movedBy = currentTranslate - prevTranslate; // negative when moved left
            if (movedBy < -threshold) {
                // moved left -> next
                index = Math.min(index + 1, slideCount - 1);
            } else if (movedBy > threshold) {
                // moved right -> prev
                index = Math.max(index - 1, 0);
            }
            setTrackPositionByIndex(index, true);
            startAutoplay();
        }

        // mouse events
        track.addEventListener('mousedown', pointerDown);
        window.addEventListener('mousemove', pointerMove);
        window.addEventListener('mouseup', pointerUp);

        // touch events
        track.addEventListener('touchstart', pointerDown, {passive:true});
        track.addEventListener('touchmove', pointerMove, {passive:true});
        track.addEventListener('touchend', pointerUp);

        // resize: re-position
        window.addEventListener('resize', ()=> setTrackPositionByIndex(index, false));

        // init
        setTrackPositionByIndex(0);
        startAutoplay();
    }

        // Lightbox for objek wisata images
        (function(){
            // create lightbox element
            const lb = document.createElement('div');
            lb.id = 'lightbox';
            lb.className = 'lightbox';
            lb.innerHTML = `
                <div class="lightbox-content">
                    <button class="lightbox-close" aria-label="Tutup">×</button>
                    <img src="" alt="">
                    <p class="lightbox-caption"></p>
                </div>
            `;
            document.body.appendChild(lb);

            const lbImg = lb.querySelector('img');
            const lbCaption = lb.querySelector('.lightbox-caption');
            const lbClose = lb.querySelector('.lightbox-close');

            function openLightbox(src, caption){
                lbImg.src = src;
                lbImg.alt = caption || 'Foto objek wisata';
                lbCaption.textContent = caption || '';
                lb.classList.add('open');
                lb.setAttribute('aria-hidden','false');
            }

            function closeLightbox(){
                lb.classList.remove('open');
                lb.setAttribute('aria-hidden','true');
                lbImg.src = '';
            }

            // delegate click on objek-media or open-photo buttons
            document.addEventListener('click', (e)=>{
                const media = e.target.closest('.objek-media');
                if (media) {
                    const src = media.dataset.src || media.querySelector('img')?.src;
                    const cap = media.dataset.caption || media.querySelector('img')?.alt;
                    if (src) openLightbox(src, cap);
                    return;
                }
                if (e.target.matches('.open-photo')){
                    const card = e.target.closest('.objek-card');
                    const media2 = card && card.querySelector('.objek-media');
                    if (media2){
                        const src = media2.dataset.src || media2.querySelector('img')?.src;
                        const cap = media2.dataset.caption || media2.querySelector('img')?.alt;
                        if (src) openLightbox(src, cap);
                    }
                    return;
                }
                if (e.target === lb || e.target === lbClose) closeLightbox();
            });

            // close on Esc
            window.addEventListener('keydown', (e)=>{ if (e.key === 'Escape') closeLightbox(); });
        })();

        // YouTube slot loader: parses data-video (ID or URL) and sets iframe src to embed URL
        (function(){
            function extractYouTubeID(input){
                if (!input) return '';
                // if input already looks like an ID (11 chars, letters/numbers/_-)
                const idCandidate = input.trim();
                if (/^[a-zA-Z0-9_-]{11}$/.test(idCandidate)) return idCandidate;
                // try parsing common YouTube URL forms
                try{
                    const u = new URL(idCandidate);
                    // youtu.be short
                    if (u.hostname.includes('youtu.be')) return u.pathname.slice(1);
                    // youtube.com watch?v=ID
                    if (u.searchParams && u.searchParams.get('v')) return u.searchParams.get('v');
                    // /embed/ID
                    const parts = u.pathname.split('/');
                    const embedIdx = parts.indexOf('embed');
                    if (embedIdx !== -1 && parts[embedIdx+1]) return parts[embedIdx+1];
                }catch(e){
                    // not a URL, continue
                }
                // fallback: try to find 11-char id inside string
                const m = input.match(/[a-zA-Z0-9_-]{11}/);
                return m ? m[0] : '';
            }

            function setIframeFromData(iframe){
                const data = iframe.getAttribute('data-video') || '';
                const id = extractYouTubeID(data);
                if (id){
                    iframe.src = `https://www.youtube.com/embed/${id}`;
                } else {
                    // leave empty; show button exists to fill
                    iframe.src = '';
                }
            }

            // initialize existing slots
            document.querySelectorAll('.youtube-iframe').forEach(iframe => setIframeFromData(iframe));

            // modal-based fill UI
            (function(){
                let activeIframe = null;
                const modal = document.getElementById('videoModal');
                const input = document.getElementById('videoInput');
                const previewBtn = document.getElementById('videoPreviewBtn');
                const previewImg = document.getElementById('videoPreviewImg');
                const btnCancel = document.getElementById('videoCancel');
                const btnSave = document.getElementById('videoSave');

                function openModalFor(iframe, startValue = ''){
                    activeIframe = iframe;
                    input.value = startValue || '';
                    previewImg.style.display = 'none';
                    modal.classList.add('open');
                    modal.setAttribute('aria-hidden','false');
                    input.focus();
                }

                function closeModal(){
                    modal.classList.remove('open');
                    modal.setAttribute('aria-hidden','true');
                    activeIframe = null;
                }

                // handle click on buttons and placeholders
                document.addEventListener('click', (e)=>{
                    const btn = e.target.closest('.fill-video');
                    if (btn){
                        const card = btn.closest('.video-card');
                        const iframe = card.querySelector('.youtube-iframe');
                        openModalFor(iframe, iframe.getAttribute('data-video')||'');
                        return;
                    }
                    const ph = e.target.closest('.video-placeholder');
                    if (ph){
                        // find iframe in same card
                        const card = ph.closest('.video-card');
                        const iframe = card.querySelector('.youtube-iframe');
                        openModalFor(iframe, iframe.getAttribute('data-video')||'');
                        return;
                    }
                });

                previewBtn.addEventListener('click', ()=>{
                    const id = extractYouTubeID(input.value.trim());
                    if (!id){ alert('Link/ID tidak valid.'); return; }
                    previewImg.src = `https://img.youtube.com/vi/${id}/hqdefault.jpg`;
                    previewImg.style.display = 'block';
                });

                btnCancel.addEventListener('click', closeModal);
                window.addEventListener('keydown', (e)=>{ if (e.key === 'Escape') closeModal(); });

                btnSave.addEventListener('click', ()=>{
                    if (!activeIframe) return;
                    const id = extractYouTubeID(input.value.trim());
                    if (!id){ alert('Link/ID tidak valid.'); return; }
                    activeIframe.setAttribute('data-video', id);
                    setIframeFromData(activeIframe);
                    // update thumbnail if placeholder exists
                    const card = activeIframe.closest('.video-card');
                    const ph = card.querySelector('.video-placeholder');
                    if (ph){
                        const img = ph.querySelector('img');
                        img.src = `https://img.youtube.com/vi/${id}/hqdefault.jpg`;
                        ph.setAttribute('aria-hidden','true');
                        ph.style.display = 'none';
                    }
                    const caption = card.querySelector('.video-caption');
                    if (caption) caption.textContent = 'Video siap ditonton';
                    closeModal();
                });

                // initialize placeholders visibility based on whether iframe got src
                document.querySelectorAll('.video-card').forEach(card=>{
                    const iframe = card.querySelector('.youtube-iframe');
                    const ph = card.querySelector('.video-placeholder');
                    if (!iframe) return;
                    // set iframe src if data-video present
                    setIframeFromData(iframe);
                    const src = iframe.src || '';
                    if (ph){
                        if (src){ ph.style.display = 'none'; ph.setAttribute('aria-hidden','true'); }
                        else { ph.style.display = 'flex'; ph.setAttribute('aria-hidden','false'); }
                    }
                });
            })();
        })();

    // Highlight active nav on scroll (simple)
    const sections = document.querySelectorAll('main section[id]');
    function onScroll(){
        const fromTop = window.scrollY + 120;
        document.querySelectorAll('#nav-list a').forEach(link => {
            const href = link.getAttribute('href');
            if (!href || href === '#') return;
            const sec = document.querySelector(href);
            if (!sec) return;
            if (sec.offsetTop <= fromTop && (sec.offsetTop + sec.offsetHeight) > fromTop){
                link.classList.add('active');
            } else {
                link.classList.remove('active');
            }
        });
    }
    window.addEventListener('scroll', onScroll, {passive:true});
    onScroll();

    // Gallery lightbox click handler
    document.addEventListener('click', (e)=>{
        const item = e.target.closest('.gallery-item');
        if (!item){
            const itemImg = e.target.closest('.gallery-item img');
            if (itemImg) {
                const item2 = itemImg.parentElement.closest('.gallery-item');
                if (item2) openGalleryLightbox(item2);
            }
            return;
        }
        openGalleryLightbox(item);
    });

    function openGalleryLightbox(item){
        const src = item.dataset.src || item.querySelector('img')?.src;
        const cap = item.dataset.caption || item.querySelector('img')?.alt;
        if (src){
            // reuse objek wisata lightbox
            const lb = document.getElementById('lightbox');
            if (lb){
                const lbImg = lb.querySelector('img');
                const lbCaption = lb.querySelector('.lightbox-caption');
                lbImg.src = src;
                lbImg.alt = cap || 'Galeri foto';
                lbCaption.textContent = cap || '';
                lb.classList.add('open');
                lb.setAttribute('aria-hidden','false');
            }
        }
    }
});