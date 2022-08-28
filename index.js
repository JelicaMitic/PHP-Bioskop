$(function () {
    izaberiDan();
});

function izaberiDan() {

    $(document).on('change', '#select-dan', function () {

        var izabraniDan = this.value;

        $.ajax({
            url: 'vratiRaspored.php',
            method: 'post',
            data: { dan: izabraniDan },

            success: function (data) {
                $('.div-list-index').html(data);
            }
        })

    })

}