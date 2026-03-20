<div id="loading-overlay">
    <div class="sk-wave sk-primary">
        <div class="sk-wave-rect"></div>
        <div class="sk-wave-rect"></div>
        <div class="sk-wave-rect"></div>
        <div class="sk-wave-rect"></div>
        <div class="sk-wave-rect"></div>
    </div>
</div>

<style>
    #loading-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 1);
        /* transparan */
        backdrop-filter: blur(10px);
        /* efek blur kaca */
        -webkit-backdrop-filter: blur(10px);
        /* support Safari */
        z-index: 9999;
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 1;
        visibility: visible;
        transition: opacity 0.6s ease, visibility 0.6s ease;
    }

    #loading-overlay.hide {
        opacity: 0;
        visibility: hidden;
    }
</style>

{{-- <script>
    // Loading
    // Fungsi tampilkan overlay
    function showLoader() {
        const overlay = document.getElementById("loading-overlay");
        overlay.classList.remove("hide");
    }

    // Fungsi sembunyikan overlay
    function hideLoader() {
        const overlay = document.getElementById("loading-overlay");
        overlay.classList.add("hide");
    }

    // Loader saat klik link (kecuali # dan target="_blank")
    document.querySelectorAll("a").forEach((link) => {
        link.addEventListener("click", function (e) {
            const href = link.getAttribute("href");

            // Cegah loader untuk link dengan #
            if (!href || href.startsWith("#")) return;

            // Cegah loader untuk link dengan target _blank
            if (link.target && link.target === "_blank") return;

            // Kalau valid → tampilkan loader
            showLoader();
        });
    });

    // Loader saat submit form
    // document.querySelectorAll("form").forEach(form => {
    //     form.addEventListener("submit", function() {
    //         showLoader();
    //     });
    // });

    // Loader hilang setelah halaman selesai load
    window.addEventListener("load", function () {
        setTimeout(() => {
            hideLoader();
        }, 1000);
    });
    // Loading end
</script> --}}
