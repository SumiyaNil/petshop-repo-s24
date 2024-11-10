@extends('frontend.master')
@section('content')




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>

var ENDPOINT = "{{ route('load') }}";

var page = 1;



$(".load-more-data").click(function(){

page++;

infinteLoadMore(page);

});



/*------------------------------------------

--------------------------------------------

call infinteLoadMore()

--------------------------------------------

--------------------------------------------*/

function infinteLoadMore(page) {

$.ajax({

        url: ENDPOINT + "?page=" + page,

        datatype: "html",

        type: "get",

        beforeSend: function () {

            $('.auto-load').show();

        }

    })

    .done(function (response) {

        if (response.html == '') {

            $('.auto-load').html("We don't have more data to display :(");

            return;

        }

        $('.auto-load').hide();

        $("#data-wrapper").append(response.html);

    })

    .fail(function (jqXHR, ajaxOptions, thrownError) {

        console.log('Server error occured');

    });

}

</script>
@endsection