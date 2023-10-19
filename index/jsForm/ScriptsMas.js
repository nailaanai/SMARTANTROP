// jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

$(".next").click(function () {
    if (animating) return false;
    animating = true;

    current_fs = $(this).parent();
    next_fs = $(this).parent().next();

    //activate next step on progressbar using the index of next_fs
    $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

    //show the next fieldset
    next_fs.show();
    //hide the current fieldset with style
    current_fs.animate({ opacity: 0 }, {
        step: function (now, mx) {
            //as the opacity of current_fs reduces to 0 - stored in "now"
            //1. scale current_fs down to 80%
            scale = 1 - (1 - now) * 0.2;
            //2. bring next_fs from the right(50%)
            left = (now * 50) + "%";
            //3. increase opacity of next_fs to 1 as it moves in
            opacity = 1 - now;
            current_fs.css({
                'transform': 'scale(' + scale + ')',
                'position': 'absolute'
            });
            next_fs.css({ 'left': left, 'opacity': opacity });
        },
        duration: 800,
        complete: function () {
            current_fs.hide();
            animating = false;
        },
        //this comes from the custom easing plugin
        easing: 'easeInOutBack'
    });
});

$(".previous").click(function () {
    if (animating) return false;
    animating = true;

    current_fs = $(this).parent();
    previous_fs = $(this).parent().prev();

    //de-activate current step on progressbar
    $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

    //show the previous fieldset
    previous_fs.show();
    //hide the current fieldset with style
    current_fs.animate({ opacity: 0 }, {
        step: function (now, mx) {
            //as the opacity of current_fs reduces to 0 - stored in "now"
            //1. scale previous_fs from 80% to 100%
            scale = 0.8 + (1 - now) * 0.2;
            //2. take current_fs to the right(50%) - from 0%
            left = ((1 - now) * 50) + "%";
            //3. increase opacity of previous_fs to 1 as it moves in
            opacity = 1 - now;
            current_fs.css({ 'left': left });
            previous_fs.css({ 'transform': 'scale(' + scale + ')', 'opacity': opacity });
        },
        duration: 800,
        complete: function () {
            current_fs.hide();
            animating = false;
        },
        //this comes from the custom easing plugin
        easing: 'easeInOutBack'
    });
});

$(".submit").click(function () {
    return false;
})

// Daftar opsi provinsi, kabupaten, kota, kecamatan, dan kelurahan
const dataProvinsi = {
    provinsi1: {
        kabupaten: ["Kabupaten Bandung", "Kabupaten Bandung Barat", "Kabupaten Bekasi"],
        kota: ["Kota Bandung", "Kota Banjar", "Kota Bekasi"],
        kecamatan: {
            "Kota Bandung": ["Andir", "Antapani", "Batununggal", "Bojongloa Kidul"],
            "Kabupaten Bandung": ["Kecamatan1", "Kecamatan2", "Kecamatan3"],
        },
        kelurahan: {
            "Kecamatan Bojongloa Kidul": ["Kelurahan1", "Kelurahan2", "Kelurahan3"],
            "Kecamatan Andir": ["KelurahanA", "KelurahanB", "KelurahanC"],
        }
    },
    provinsi2: {
        kabupaten: ["Kabupaten Sampang", "Kabupaten Sidoarjo", "Kabupaten Sumenep"],
        kota: ["Kota Batu", "Kota Blitar", "Kota Kediri"],
        kecamatan: {
            "Kota Batu": ["Batu", "Bumiaji", "Junrejo"],
            "Kabupaten Sampang": ["Batu", "Bumiaji", "Junrejo"],
        },
        kelurahan: {
            "Kecamatan Batu": ["Oro-oro Ombo", "Sidomulyo", "Pesanggrahan", "Sumberejo"],
        }
    }
    // Tambahkan data provinsi dan kabupaten sesuai dengan kebutuhan Anda
};

const provinsiDropdown = $("#provinsi");
const kotaDropdown = $("#kota");
const kabupatenDropdown = $("#kabupaten");
const kecamatanDropdown = $("#kecamatan");
const kelurahanDropdown = $("#kelurahan");

// Fungsi untuk mengisi dropdown kota berdasarkan pilihan provinsi
provinsiDropdown.change(function () {
    const selectedProvinsi = $(this).val();

    // Mengosongkan dropdown kota, kabupaten, kecamatan, dan kelurahan
    kotaDropdown.empty().append("<option value=''>Pilih Kota</option>");
    kabupatenDropdown.empty().append("<option value=''>Pilih Kabupaten</option>");
    kecamatanDropdown.empty().append("<option value=''>Pilih Kecamatan</option>");
    kelurahanDropdown.empty().append("<option value=''>Pilih Kelurahan</option>");

    if (selectedProvinsi && dataProvinsi[selectedProvinsi]) {
        const kotaOptions = dataProvinsi[selectedProvinsi].kota || [];
        const kabupatenOptions = dataProvinsi[selectedProvinsi].kabupaten || [];
        const kecamatanOptions = dataProvinsi[selectedProvinsi].kecamatan || {};
        const kelurahanOptions = dataProvinsi[selectedProvinsi].kelurahan || {};

        // Isi dropdown kota
        $.each(kotaOptions, function (index, kota) {
            kotaDropdown.append("<option value='" + kota + "'>" + kota + "</option>");
        });

        // Isi dropdown kabupaten
        $.each(kabupatenOptions, function (index, kabupaten) {
            kabupatenDropdown.append("<option value='" + kabupaten + "'>" + kabupaten + "</option>");
        });

        // Isi dropdown kecamatan
        const selectedKota = kotaDropdown.val();
        if (selectedKota && kecamatanOptions[selectedKota]) {
            $.each(kecamatanOptions[selectedKota], function (index, kecamatan) {
                kecamatanDropdown.append("<option value='" + kecamatan + "'>" + kecamatan + "</option>");
            });
        }

        // Isi dropdown kelurahan
        const selectedKecamatan = kecamatanDropdown.val();
        if (selectedKecamatan && kelurahanOptions[selectedKecamatan]) {
            $.each(kelurahanOptions[selectedKecamatan], function (index, kelurahan) {
                kelurahanDropdown.append("<option value='" + kelurahan + "'>" + kelurahan + "</option>");
            });
        }
    }
});

// Fungsi untuk mengisi dropdown kecamatan berdasarkan pilihan kota atau kabupaten
kotaDropdown.change(function () {
    const selectedKota = $(this).val();
    kecamatanDropdown.empty().append("<option value=''>Pilih Kecamatan</option>");
    kelurahanDropdown.empty().append("<option value=''>Pilih Kelurahan</option>");

    const selectedProvinsi = provinsiDropdown.val();

    if (selectedProvinsi && selectedKota && dataProvinsi[selectedProvinsi].kecamatan[selectedKota]) {
        $.each(dataProvinsi[selectedProvinsi].kecamatan[selectedKota], function (index, kecamatan) {
            kecamatanDropdown.append("<option value='" + kecamatan + "'>" + kecamatan + "</option>");
        });
    }
});

// Fungsi untuk mengisi dropdown kelurahan berdasarkan pilihan kecamatan
kecamatanDropdown.change(function () {
    const selectedKecamatan = $(this).val();
    kelurahanDropdown.empty().append("<option value=''>Pilih Kelurahan</option>");

    const selectedProvinsi = provinsiDropdown.val();
    const selectedKota = kotaDropdown.val();

    if (selectedProvinsi && selectedKota && selectedKecamatan && dataProvinsi[selectedProvinsi].Kelurahan[selectedKecamatan]) {
        $.each(dataProvinsi[selectedProvinsi].Kelurahan[selectedKecamatan], function (index, kelurahan) {
            kelurahanDropdown.append("<option value='" + kelurahan + "'>" + kelurahan + "</option>");
        });
    }
});

