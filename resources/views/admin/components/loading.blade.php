<div id="loading-overlay">
    <div class="sk-wave sk-white">
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
        background: rgba(36, 39, 69, 1);
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
