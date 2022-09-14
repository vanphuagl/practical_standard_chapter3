$(document).ready(function () {
  let arrayServices = [];

  $(".chkbutton").click(function () {
    let value = $(this).attr("value");

    if (this.checked) {
      if ($.inArray(value, arrayServices) === -1) {
        arrayServices.push(value);
        getlistServices(arrayServices);
      }
    } else {
      if ($.inArray(value, arrayServices) !== -1) {
        arrayServices = arrayServices.filter((item) => item != value);
        getlistServices(arrayServices);
      }
    }
  });

  function getlistServices(arr_key) {
    let link = "";

    if (arr_key.length) {
      link =
        "http://localhost/task14/wp-json/wp/v2/services?services-products=" +
        arr_key.toString();
      // link = "http://103.77.160.168/~aglstaff/nguyenvanphu/task14/wp-json/wp/v2/services?services-san-pham=" + arr_key.toString();
    } else {
      link = "http://localhost/task14/wp-json/wp/v2/services";
      // link = "http://103.77.160.168/~aglstaff/nguyenvanphu/task14/wp-json/wp/v2/services";
    }

    $.ajax({
      url: link,
      success: function (result) {
        $("#services").empty();
        for (let i = 0; i < result.length; i++) {
          let item = result[i];
          $("#services").append(`
						<li class="c-column__item">
							<a href="${item.link}">
								<img src="${item.fimg_url}">
								<p>${item.title.rendered}</p>
							</a>
						</li>
					`);
        }
        $("#totalServices").empty();
        $("#totalServices").append(result.length);
      },
    });
  }

  getlistServices(arrayServices);

  // end filter services

  const pathName = window.location.pathname;
  if (pathName.includes("confirm")) {
    $(".btn-reset").addClass("is-hidden");
	$(".btn-back").removeClass("is-hidden");
  }
});
