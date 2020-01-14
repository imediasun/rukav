<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Import-Export Data</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"

</head>
<body>
<div class="container">
    <br />
    <form id="data"  method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-4">
            <h3>Insert your partner_ID</h3>
            <input type="text" name="partner_id">
        </div>
    </div>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-6">
            <div class="row">
                <input type="hidden" name="MAX_FILE_SIZE" value="3145728">
                    <div class="col-md-6">
                        <input type="file" name="imported-file[]" multiple/>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-primary" type="submit">Import</button>
                    </div>

            </div>
        </div>

    </div>
    </form>
    <div class="row">
       <div class="response">

       </div>
    </div>
</div>

<script
        src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>
<script>
    $("#data").submit(function(e) {
        console.log(123);
        e.preventDefault();
        var formData = new FormData(this);
console.log(formData);
        $.ajax({
            url: '/items/import',
            type: 'POST',
            dataType:'json',
            data: formData,
            headers: {
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                $('.response').empty();
                $.each( data.data, function( key, value ) {
                    $('.response').append('<h3>Information added successfuly!</h3>')
                    $('.response').append('<h3>'+value.vorname+'=>'+value.nachname+'</h3>')
                });
                if(data.error){
                    $('.response').html('<h3>'+data.error+'</h3>');
                }

            },

            cache: false,
            contentType: false,
            processData: false
        });
    });

</script>

</body>
</html>