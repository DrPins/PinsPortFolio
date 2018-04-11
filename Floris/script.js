$(document).ready(function () {

    /*Fonction pour empecher l'ouverture d'une page et pour faire apparaitre un 
     message qui va mener le visiteur à visualiser son panier*/
    $('.addPanier').click(function (event) {
        event.preventDefault();

        $.get($(this).attr('href'), {}, function (data) {
            if (data.error) {
                alert(data.message);
            }
            else {
                if (confirm(data.message + '. Voulez consulter votre panier ?')) {
                    location.href = 'panier.php';
                }
                else {
                    $('#total').empty().append(data.total);
                    $('#count').empty().append(data.count);
                }
            }

        }, 'json');

        return false;
    });
    /* Fonction pour scroller vers une section d'une meme page*/
    $('.scrollTo').click(function (e) {
        var linkHref = $(this).attr('href');

        $('html, body').animate({
            scrollTop: $(linkHref).offset().top
        });
        e.preventDefault();
    })
    /* Fonction pour valider les données du formulaire d'inscription*/
    $(function () {
        $("#error_nom").hide();
        $("#error_prenom").hide();
        $("#error_email").hide();
        $("#error_pwd").hide();
        $("#error_pwd2").hide();

        var error_nom = false;
        var error_prenom = false;
        var error_email = false;
        var error_pwd = false;
        var error_pwd2 = false;

        $("#nom").focusout(function () {
            check_nom();
        });

        $("#prenom").focusout(function () {
            check_prenom();
        });

        $("#email").focusout(function () {
            check_email();
        });

        $("#password").focusout(function () {
            check_pwd();
        });

        $("#password2").focusout(function () {
            check_pwd2();
        });
    })

    function check_nom() {
        var taille_nom = $("#nom").val().length;

        if (taille_nom < 3 || taille_nom > 20) {
            $("#error_nom").html("Le nom n'est pas valide");
            $("#error_nom").show();
            error_nom = true;
        }
        else {
            $("#error_nom").hide();
        }
    }


    function check_prenom() {
        var taille_prenom = $("#prenom").val().length;

        if (taille_prenom < 3 || taille_prenom > 20) {
            $("#error_prenom").html("Le prenom n'est pas valide");
            $("#error_prenom").show();
            error_prenom = true;
        }
        else {
            $("#error_prenom").hide();
        }
    }

    function check_email() {
        $('#email').filter(function () {
            var emil = $('#email').val();
            var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            if (!emailReg.test(emil)) {
                $("#error_email").html("E-Mail non valide");
                $("#error_email").show();
                error_email = true;
            } else {
                $("#error_email").hide();
            }
        })
    }

    function check_pwd() {
        var taille_pwd = $("#password").val().length;

        if (taille_pwd < 8) {
            $("#error_pwd").html("Le mot de passe doit contenir au moins 8 caractères");
            $("#error_pwd").show();
            error_pwd = true;
        }
        else {
            $("#error_pwd").hide();
        }
    }

    function check_pwd2() {
        var pwd = $("#password").val();
        var pwd2 = $("#password2").val();

        if (pwd != pwd2) {
            $("#error_pwd2").html("Le mot de passe ne correspond pas");
            $("#error_pwd2").show();
            error_pwd2 = true;
        }
        else {
            $("#error_pwd2").hide();
        }
    }

    $("#registration_form").submit(function () {
        error_nom = false;
        error_prenom = false;
        error_email = false;
        error_pwd2 = false;
        error_pwd = false;

        check_pwd2();
        check_pwd();
        check_email();
        check_prenom();
        check_nom();

        if (error_nom == false && error_prenom == false && error_email == false && error_pwd == false && error_pwd2 == false) {
            return true;
        }
        else {
            return false;
        }
    });

});

console.log("ready!");