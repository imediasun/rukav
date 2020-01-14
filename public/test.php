<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>

<div>
<input type="text" id="textdata" />
<button id="send">send</button>
</div>

<h2>
Result:
</h2>

<div id="result">
</div>



<script>
            $('#send').on('click', function () {
				
                        $.ajax({
                            url: "/geoapi/get-adresses",
                            type: "POST",
                            dataType: "JSON",
                            data: {_token: '{{csrf_token()}}'},
                            success: function (response) { 
							alert('1');
                            },
                            error: function (response) { 
							alert('2');
                            }
                        });
            });
</script>

</body>
</html>