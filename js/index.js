$(function () {
    izaberiDan();
    $("#s-in").hide();
    traziFilm();
});

function izaberiDan() {

    $(document).on('change', '#select-dan', function () {

        var izabraniDan = this.value;
        if (izabraniDan == "") {
            alert("Izaberite dan za koji želite da vidite raspored");
        }

        $.ajax({
            url: 'vratiRaspored.php',
            method: 'post',
            data: { dan: izabraniDan },

            success: function (data) {
                $('#s-in').show();
                $('.div-list-index').html(data);
            }
        })

    })

}

function traziFilm() {

    $(document).on('keyup', '#s-in', function () {

        var nazivFilma = this.value;
        var dan = $('#select-dan').val();

        $.ajax({
            url: 'vratiFilmovePoNazivu.php',
            method: 'post',
            data: { naziv: nazivFilma, dan: dan },

            success: function (data) {
                $('.div-list-index').html(data);
            }
        })

    })
}