@if (session('sukses'))
    <div class="position-fixed top-0 end-0 p-3" style="z-index:9999;">
        <div id="alert" class="alert alert-success text-bg-success d-flex flex-column animate__animated" role="alert"
            style="opacity:0; visibility:hidden; position:relative; overflow:hidden;">
            <div class="d-flex align-items-center">
                <span class="alert-icon text-success me-2">
                    <i class="ti ti-check ti-xs"></i>
                </span>
                <span>{{ session('sukses') }}</span>
            </div>

            <!-- Timer line -->
            <div id="alert-timer"
                style="
                position:absolute;
                top:0;
                left:0;
                height:4px;
                background-color:#fff;
                width:0%;
            ">
            </div>
        </div>
    </div>
@endif

@if (session('error'))
    <div class="position-fixed top-0 end-0 p-3" style="z-index:9999;">
        <div id="alert" class="alert alert-danger text-bg-danger d-flex flex-column animate__animated" role="alert"
            style="opacity:0; visibility:hidden; position:relative; overflow:hidden;">
            <div class="d-flex align-items-center">
                <span class="alert-icon text-danger me-2">
                    <i class="ti ti-x ti-xs"></i>
                </span>
                <span>{{ session('error') }}</span>
            </div>

            <!-- Timer line -->
            <div id="alert-timer"
                style="
                position:absolute;
                top:0;
                left:0;
                height:4px;
                background-color:#fff;
                width:0%;
            ">
            </div>
        </div>
    </div>
@endif
