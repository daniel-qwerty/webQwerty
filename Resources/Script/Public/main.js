
var urlBase = "http://qwerty.com.bo/";

function goTo(_scrollTop)
{
    $('html, body').animate({
        scrollTop: _scrollTop - 40
    }, 1000);
    return false;
}

function saveLike(Message, lanId) {
    var email = $('.registerForm #email').val();
    $.ajax({
        type: "POST",
        url: contactUrl,
        data: {Name: "Suscripcion", Email: email, Message: "", Language: lanId, Status: 0}
    });
    $('.registerForm #email').val("");


}

function validarEmail(email) {
    expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (!expr.test(email)) {
        swal("Error", "La dirección de correo '" + email + "' es incorrecta", "error");
        return false;
    } else
        return true;
}

function saveContact(errorMesage, Message, lanId) {

    var nombre = $('#contacto-nombre').val();
    var email = $('#contacto-email').val();
    var mensaje = $('#contacto-mensaje').val();

    if (nombre === "" || email === "" || mensaje === "") {
        swal("Alerta!!", "Todos los campos son obligatorios", "warning");
    } else {

        if (validarEmail(email)) {
            swal("Exito", "Ya recibimos su mensaje, en breve le responderemos", "success");
            $.ajax({
                type: "POST",
                url: urlBase + "Service/Contact/Save",
                data: {Name: nombre, Email: email, Message: mensaje, Language: lanId, Status: 0}
            });
            $('#contacto-nombre').val("");
            $('#contacto-email').val("");
            $('#contacto-mensaje').val("");
        }


    }
}
function starMapContactos(imagePath) {


// mapa
    var qwertyMap = L.map('qwerty-map').setView([-17.7640973, -63.194664], 15);
    L.tileLayer('http://{s}.tile.openstreetmap.se/hydda/full/{z}/{x}/{y}.png', {
        attribution: 'QWERTY',
        maxZoom: 18
    }).addTo(qwertyMap);

    var qwertyIcon = L.icon({
        iconUrl: imagePath + '/Public/qwerty-marker.png',
        shadowUrl: imagePath + '/Public/qwerty-marker-shadow.png',
        iconSize: [95, 63], // size of the icon
        shadowSize: [112, 22], // size of the shadow
        iconAnchor: [24, 63], // point of the icon which will correspond to marker's location
        shadowAnchor: [22, 22], // the same for the shadow
        popupAnchor: [-3, -76] // point from which the popup should open relative to the iconAnchor
    });
    var marker = L.marker([-17.7654973, -63.194664], {icon: qwertyIcon}).addTo(qwertyMap);
}

function openMenu()
{
    $(".qwerty-menu-fullscreen").addClass("opened");
}
function closeMenu()
{
    $(".qwerty-menu-fullscreen").removeClass("opened");
}
function hideModal()
{
    $("#myModal").css("display", "none");
}
//Tool Tip
$('[data-toggle="tooltip"]').tooltip();

window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}


//scroll
$(window).scroll(function (e) {
    var win_height = $(window).height();
    var qwerty_nav = $(".qwerty-nav-main");

    if ($(window).scrollTop() > 300) {
        $(".go-up").css("visibility", "visible")
    } else {
        $(".go-up").css("visibility", "hidden")
    }

    if ($(window).scrollTop() > win_height) {
        qwerty_nav.css("position", "fixed");
        qwerty_nav.css("top", "0");
    } else {
        qwerty_nav.css("position", "static");
    }


    if ($(window).scrollTop() > header_who - 45) {
        $(".qwerty-header-who").css("position", "fixed");
        $(".qwerty-header-who").css("top", "45px");
    } else {
        $(".qwerty-header-who").css("position", "relative");
        $(".qwerty-header-who").css("top", "0");
    }

    if ($(window).scrollTop() > header_services - 45) {
        $(".qwerty-header-services").css("position", "fixed");
        $(".qwerty-header-services").css("top", "45px");
    } else {
        $(".qwerty-header-services").css("position", "relative");
        $(".qwerty-header-services").css("top", "0");
    }

    if ($(window).scrollTop() > header_us - 45) {
        $(".qwerty-header-us").css("position", "fixed");
        $(".qwerty-header-us").css("top", "45px");
    } else {
        $(".qwerty-header-us").css("position", "relative");
        $(".qwerty-header-us").css("top", "0");
    }

    if ($(window).scrollTop() > header_blog - 45) {
        $(".qwerty-header-blog").css("position", "fixed");
        $(".qwerty-header-blog").css("top", "45px");
    } else {
        $(".qwerty-header-blog").css("position", "relative");
        $(".qwerty-header-blog").css("top", "0");
    }

    if ($(window).scrollTop() > header_work - 45) {
        $(".qwerty-header-work").css("position", "fixed");
        $(".qwerty-header-work").css("top", "45px");
    } else {
        $(".qwerty-header-work").css("position", "relative");
        $(".qwerty-header-work").css("top", "0");
    }

    if ($(window).scrollTop() > header_contact - 45) {
        $(".qwerty-header-contact").css("position", "fixed");
        $(".qwerty-header-contact").css("top", "45px");
    } else {
        $(".qwerty-header-contact").css("position", "relative");
        $(".qwerty-header-contact").css("top", "0");
    }
});

$('.blog-small-item').hover(
        function () {
            $(this).addClass("hover");
        },
        function () {
            $(this).removeClass("hover");
        }
);
function show_categorias() {
            document.getElementById("cat-dropdown").classList.toggle("show");
            //        $("#cat-dropdown").show()
        }
        $(document).ready(function () {


            window.onclick = function (e) {
                if (!e.target.matches('#cat-event' || !e.target.matches('#cat-dropdown'))) {

                    var dropdown = document.getElementById("cat-dropdown");

                    var openDropdown = dropdown;
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }

                }
            }

            $("a[rel^='prettyPhoto']").prettyPhoto(
                    {social_tools: "",
                        show_title: false,
                        theme: 'light_square', /* light_rounded / dark_rounded / light_square / dark_square / facebook */
                        deeplinking: false}
            );
     });