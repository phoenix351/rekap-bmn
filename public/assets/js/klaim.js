// CALCULATE PROGRESS BAR
// const NAME_SERVER = "http://localhost";
const NAME_SERVER = "http://monitoringbps.com/rekap-bmn/public";
stepProgress = function (currstep) {
  var percent = parseFloat(100 / $(".step").length) * currstep;
  percent = percent.toFixed();
  $(".progress-bar")
    .css("width", percent + "%")
    .html(percent + "%");
};

// DISPLAY AND HIDE "NEXT", "BACK" AND "SUMBIT" BUTTONS
hideButtons = function (step) {
  var limit = parseInt($(".step").length);
  $(".action").hide();
  if (step < limit) {
    $(".next").show();
  }
  if (step > 1) {
    $(".back").show();
  }
  if (step == limit) {
    $(".next").hide();
    $(".submit").show();
  }
};

function checkForm(val) {
  // CHECK IF ALL "REQUIRED" FIELD ALL FILLED IN
  var valid = true;
  $("#" + val + " input:required").each(function () {
    if ($(this).val() === "") {
      $(this).addClass("is-invalid");
      valid = false;
    } else {
      $(this).removeClass("is-invalid");
    }
  });
  return valid;
}

function nextTab(elem) {
  $(elem).next().find('a[data-toggle="tab"]').click();
}

function prevTab(elem) {
  $(elem).prev().find('a[data-toggle="tab"]').click();
}

function calculateTotalKlaim(klaim) {
  return (
    klaim.pertamax_harga +
    klaim.pertalite_harga +
    klaim.dexlite_harga +
    klaim.maintenance +
    klaim.ongkos_kerja +
    klaim.bea_materai
  );
}

function currencyToNum(curr) {
  return Number(curr.toString().replace(/\./g, ""));
}

$(".nav-tabs").on("click", "li", function () {
  $(".nav-tabs li.active").removeClass("active");
  $(this).addClass("active");
});
$(document).ready(function () {
  $("#basic-datatables").DataTable({});

  $("#item").select2({
    dropdownParent: $("#addRowModal"),
    theme: "bootstrap",
    width: "100%", // need to override the changed default
  });

  $("#item_update").select2({
    dropdownParent: $("#editRowModal"),
    theme: "bootstrap",
    width: "100%", // need to override the changed default
  });

  $("#item").change(() => {
    // $("input[name=jenis]").val("");
    let selected_id = $("#item").val();
    console.log(selected_id);
    $("#id").val(selected_id);

    $.ajax({
      url: `${NAME_SERVER}/klaim/get-item?id=${selected_id}`,
      dataType: "json",
    })
      .done(function (data) {
        // set tahun anggaran
        if (data.anggaran.length > 0) {
          $(".next-step").prop("disabled", false);

          data.anggaran.forEach((item) => {
            $("#tahun").html(``);

            $("#tahun").append(
              `<option value="${item.tahun}" >${item.tahun}</option>`
            );
          });
        } else {
          $(".next-step").prop("disabled", true);

          $("#tahun").html(
            `<option value="" disabled selected>No Data</option>`
          );
        }

        $("input[name=jenis]").val([data.item_user.jenis]);
      })
      .then(() => {
        $("input[name=jenis]").prop("disabled", true);
      });
    //hapus peruntukkan
  });

  $("#multi-filter-select").DataTable({
    pageLength: 5,
    initComplete: function () {
      this.api()
        .columns()
        .every(function () {
          var column = this;
          var select = $(
            '<select class="form-control"><option value=""></option></select>'
          )
            .appendTo($(column.footer()).empty())
            .on("change", function () {
              var val = $.fn.dataTable.util.escapeRegex($(this).val());

              column.search(val ? "^" + val + "$" : "", true, false).draw();
            });

          column
            .data()
            .unique()
            .sort()
            .each(function (d, j) {
              select.append('<option value="' + d + '">' + d + "</option>");
            });
        });
    },
  });

  // Add Row
  $("#add-row").DataTable({
    pageLength: 5,
  });

  $("#pertamax_harga").keyup((e) => {
    e.target.value = currencyToNum(e.target.value).toLocaleString("in-ID");
  });

  $("#pertalite_harga").keyup((e) => {
    e.target.value = currencyToNum(e.target.value).toLocaleString("in-ID");
  });
  $("#dexlite_harga").keyup((e) => {
    e.target.value = currencyToNum(e.target.value).toLocaleString("in-ID");
  });
  $("#maintenance").keyup((e) => {
    e.target.value = currencyToNum(e.target.value).toLocaleString("in-ID");
  });
  $("#ongkos_kerja").keyup((e) => {
    e.target.value = currencyToNum(e.target.value).toLocaleString("in-ID");
  });
  $("#bea_materai").keyup((e) => {
    e.target.value = currencyToNum(e.target.value).toLocaleString("in-ID");
  });
  $("#total_klaim").keyup((e) => {
    e.target.value = currencyToNum(e.target.value).toLocaleString("in-ID");
  });
});

$(".nav-tabs > li a[title]").tooltip();

//Wizard
$('a[data-toggle="tab"]').on("shown.bs.tab", function (e) {
  var target = $(e.target);

  if (target.parent().hasClass("disabled")) {
    return false;
  }
});
$(".next-step").prop("disabled", true);
$(".next-step").click(function (e) {
  let tanggal = $("#tanggal").val();
  let form = document.getElementById("klaim-add");
  let tanggal_input = document.getElementById("tanggal");
  if (tanggal.length < 2) {
    tanggal_input.setCustomValidity("Tanggal tidak boleh kosong !");
    form.reportValidity();
    return 0;
  }
  let url = `${NAME_SERVER}/anggaran/get-anggaran-by-item-and-tahun`;
  $.ajax({
    url: url,
    dataType: "json",
    method: "get",
    data: {
      item_id: $("#item").val(),
      tahun: $("#tahun").val(),
    },
  })
    .done(function (data) {
      // set tahun anggaran
      $("#pagu_sisa").val(
        (
          Number(data.pagu_anggaran) - Number(data.pagu_realisasi)
        ).toLocaleString("in-ID")
      );
      $("#id_anggaran").val(data.id);
      $("#pagu_anggaran").val(data.pagu_anggaran.toLocaleString("in-ID"));
    })
    .then(() => {
      //
    });

  var active = $(".wizard .nav-tabs li.active");
  active.next().removeClass("disabled");
  nextTab(active);
});
$(".prev-step").click(function (e) {
  var active = $(".wizard .nav-tabs li.active");
  prevTab(active);
});

$(".klaim-price").keyup(() => {
  let klaim = {
    pertamax_harga: currencyToNum($("#pertamax_harga").val()),
    pertalite_harga: currencyToNum($("#pertalite_harga").val()),
    dexlite_harga: currencyToNum($("#dexlite_harga").val()),
    maintenance: currencyToNum($("#maintenance").val()),
    ongkos_kerja: currencyToNum($("#ongkos_kerja").val()),
    bea_materai: currencyToNum($("#bea_materai").val()),
  };
  let total_klaim = calculateTotalKlaim(klaim);
  // assign to total
  $("#total_klaim").val(total_klaim.toLocaleString("in-ID"));

  let pagu_sisa_after = Number(
    currencyToNum($("#pagu_sisa").val()) - total_klaim
  );
  $("#pagu_sisa_after").val(pagu_sisa_after.toLocaleString("in-ID"));
});

$(".non-edit").keydown(() => {
  return false;
});

$(".submit").click((e) => {
  let klaim = currencyToNum($("#total_klaim").val());
  let form = document.getElementById("klaim-add");
  let total_klaim = document.getElementById("total_klaim");
  console.log(klaim);
  if (klaim < 1000) {
    total_klaim.setCustomValidity(
      " Total Klaim tidak boleh kurang dari Rp 1.000,00 !"
    );
    form.reportValidity();
    e.preventDefault();
  } else {
    total_klaim.setCustomValidity("");
  }
  let pertamax_harga = currencyToNum($("#pertamax_harga").val());
  let pertalite_harga = currencyToNum($("#pertalite_harga").val());
  let dexlite_harga = currencyToNum($("#dexlite_harga").val());

  let pertamax_volume = Number($("#pertamax_volume").val());
  let pertalite_volume = Number($("#pertalite_volume").val());
  let dexlite_volume = Number($("#dexlite_volume").val());

  let pertamax_form = document.getElementById("pertamax_harga");
  let pertalite_form = document.getElementById("pertalite_harga");
  let dexlite_form = document.getElementById("dexlite_harga");

  if (
    (pertamax_harga > 0 && pertamax_volume == 0) ||
    (pertamax_harga == 0 && pertamax_volume > 0)
  ) {
    pertamax_form.setCustomValidity("Antara Volume dan Harga harus sesuai !");
    form.reportValidity();
    e.preventDefault();
  } else {
    pertamax_form.setCustomValidity("");
  }

  if (
    (pertalite_harga > 0 && pertalite_volume == 0) ||
    (pertalite_harga == 0 && pertalite_volume > 0)
  ) {
    pertalite_form.setCustomValidity("Antara Volume dan Harga harus sesuai !");
    form.reportValidity();
    e.preventDefault();
  } else {
    pertalite_form.setCustomValidity("");
  }

  if (
    (dexlite_harga > 0 && dexlite_volume == 0) ||
    (dexlite_harga == 0 && dexlite_volume > 0)
  ) {
    console.log({
      dexlite_harga,
      dexlite_volume,
    });
    dexlite_form.setCustomValidity("Antara Volume dan Harga harus sesuai !");
    form.reportValidity();
    e.preventDefault();
  } else {
    dexlite_form.setCustomValidity("");
  }
  let pagu_sisa_after = document.getElementById("pagu_sisa_after");

  if (currencyToNum($("#pagu_sisa_after").val()) < 0) {
    pagu_sisa_after.setCustomValidity("Sisa Anggaran tidak boleh negatif !");
    form.reportValidity();
    e.preventDefault();
  } else {
    pagu_sisa_after.setCustomValidity("");
  }
});
