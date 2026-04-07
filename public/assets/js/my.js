document.addEventListener("DOMContentLoaded", function () {
    // ====== LOADING START ======
    const overlay = document.getElementById("loading-overlay");

    function showLoader() {
        overlay.classList.remove("hide");
    }

    function hideLoader() {
        overlay.classList.add("hide");
    }

    // Loader saat klik link (kecuali # dan target="_blank")
    document.querySelectorAll("a").forEach((link) => {
        link.addEventListener("click", function () {
            const href = link.getAttribute("href");
            if (!href || href.startsWith("#")) return;
            if (link.target && link.target === "_blank") return;
            showLoader();
        });
    });

    // Loader saat submit form (kalau perlu diaktifkan)
    // document.querySelectorAll("form").forEach(form => {
    //     form.addEventListener("submit", function() {
    //         showLoader();
    //     });
    // });

    // ====== ALERT START ======
    function showAlert() {
        const alert = document.getElementById("alert");
        const timer = document.getElementById("alert-timer");

        if (alert) {
            const showDelay = 250; // jeda sedikit setelah loader hilang
            const displayTime = 5000; // waktu tampil alert

            setTimeout(() => {
                alert.style.opacity = "1";
                alert.style.visibility = "visible";
                alert.classList.add("animate__bounceInRight");

                timer.style.transition = `width ${displayTime}ms linear`;
                timer.style.width = "100%";

                setTimeout(() => {
                    alert.classList.remove("animate__bounceInRight");
                    alert.classList.add("animate__bounceOutRight");

                    alert.addEventListener("animationend", () => {
                        alert.remove();
                    });
                }, displayTime);
            }, showDelay);
        }
    }

    // ====== SAAT HALAMAN SELESAI LOAD ======
    window.addEventListener("load", function () {
        setTimeout(() => {
            hideLoader();
            showAlert();
        }, 800);
    });

    // ====== TOGGLE PASSWORD ======
    document
        .querySelectorAll(".form-password-toggle")
        .forEach(function (wrapper) {
            const input = wrapper.querySelector('input[type="password"]');
            const toggle = wrapper.querySelector("span");

            toggle.addEventListener("click", function () {
                if (input.type === "password") {
                    input.type = "text";
                    toggle
                        .querySelector("i")
                        .classList.replace("ti-eye-off", "ti-eye");
                } else {
                    input.type = "password";
                    toggle
                        .querySelector("i")
                        .classList.replace("ti-eye", "ti-eye-off");
                }
            });
        });

    // ====== FORMAT INPUT ======
    // Format penghasilan (ribuan)
    document.querySelectorAll(".penghasilan").forEach((input) => {
        input.addEventListener("input", function () {
            let value = this.value.replace(/\D/g, "");
            this.value = value.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        });
    });

    // Format nomor HP
    document.querySelectorAll(".phone").forEach((input) => {
        input.addEventListener("input", function () {
            // Hapus semua karakter bukan angka
            let value = this.value.replace(/\D/g, "").slice(0, 13);

            // Format Indonesia: 0812-3456-789
            if (value.length > 4 && value.length <= 8) {
                value = value.replace(/(\d{4})(\d+)/, "$1-$2");
            } else if (value.length > 8) {
                value = value.replace(/(\d{4})(\d{4})(\d+)/, "$1-$2-$3");
            }

            this.value = value;
        });
    });

    // Batasi max-length berdasarkan class "max-XX"
    document
        .querySelectorAll("input[class*='max-'], textarea[class*='max-']")
        .forEach((input) => {
            // cari angka setelah "max-"
            const match = input.className.match(/max-(\d+)/);
            if (match) {
                const max = parseInt(match[1], 10);
                input.setAttribute("maxlength", max);
            }
        });

    // Batasi hanya angka untuk class "angka"
    document.querySelectorAll("input.angka").forEach((input) => {
        input.addEventListener("input", function () {
            this.value = this.value.replace(/\D/g, ""); // hapus semua selain angka
        });
    });

    // Angka desimal
    document.querySelectorAll("input.desimal").forEach((input) => {
        input.addEventListener("input", function () {
            // Hanya izinkan angka dan titik
            this.value = this.value.replace(/[^0-9.]/g, "");

            // Biar titik hanya boleh 1x
            if ((this.value.match(/\./g) || []).length > 1) {
                this.value = this.value.substring(
                    0,
                    this.value.lastIndexOf("."),
                );
            }
        });
    });

    // File input → tampilkan nama file
    document.querySelectorAll('input[type="file"]').forEach(function (input) {
        input.addEventListener("change", function () {
            let fileName = this.files.length
                ? this.files[0].name
                : "Pilih file";

            // cari label yang punya atribut for sesuai id input
            let label = document.querySelector('label[for="' + this.id + '"]');
            if (label) {
                label.textContent = fileName;
            }
        });
    });

    // ====== TOMBOL BACK TO TOP ======
    const btnUp = document.getElementById("btn-back-to-top");
    let isVisible = false;

    window.addEventListener("scroll", () => {
        if (window.scrollY > 200 && !isVisible) {
            btnUp.style.display = "block";
            btnUp.classList.remove("animate__fadeOut");
            btnUp.classList.add("animate__animated", "animate__fadeIn");
            isVisible = true;
        } else if (window.scrollY <= 200 && isVisible) {
            btnUp.classList.remove("animate__fadeIn");
            btnUp.classList.add("animate__fadeOut");
            setTimeout(() => {
                btnUp.style.display = "none";
            }, 400); // waktu animasi fadeOut (sesuai durasi Animate.css)
            isVisible = false;
        }
    });
    // Saat tombol diklik, scroll ke atas dengan efek halus
    if (btnUp) {
        btnUp.addEventListener("click", function () {
            window.scrollTo({ top: 0, behavior: "smooth" });
        });
    }

    // ====== KONFIRMASI KUNCI DOKUMEN (MODAL) ======
    document.querySelectorAll(".btn-kunci").forEach((btn) => {
        btn.addEventListener("click", function () {
            Swal.fire({
                titleText: "Yakin ingin mengunci dokumen?",
                text: "Pastikan semua dokumen sudah benar dan sesuai.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Iya!",
                cancelButtonText: "Batal",
                confirmButtonColor: "#38c172",
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById("form-kunci").submit();
                }
            });
        });
    });

    // document.addEventListener("click", function (e) {
    //     // Cek apakah yang diklik adalah elemen dengan class .btn-kunci
    //     if (e.target && e.target.classList.contains("btn-kunci")) {
    //         e.preventDefault(); // Mencegah aksi default browser

    //         Swal.fire({
    //             titleText: "Yakin ingin mengunci dokumen?",
    //             text: "Pastikan semua dokumen sudah benar dan sesuai.",
    //             icon: "warning",
    //             showCancelButton: true,
    //             confirmButtonText: "Iya!",
    //             cancelButtonText: "Batal",
    //             confirmButtonColor: "#38c172",
    //         }).then((result) => {
    //             if (result.isConfirmed) {
    //                 const form = document.getElementById("form-kunci");
    //                 if (form) {
    //                     form.submit();
    //                 } else {
    //                     console.error("Form tidak ditemukan!");
    //                 }
    //             }
    //         });
    //     }
    // });

    // ====== BATAL KUNCI DOKUMEN (MODAL) ======
    document.querySelectorAll(".btn-batal-kunci").forEach((btn) => {
        btn.addEventListener("click", function () {
            Swal.fire({
                titleText: "Yakin ingin membuka kunci dokumen?",
                text: "Anda dapat mengunggah atau mengubah dokumen kembali.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Iya!",
                cancelButtonText: "Batal",
                confirmButtonColor: "#38c172",
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById("form-batal-kunci").submit();
                }
            });
        });
    });
});
