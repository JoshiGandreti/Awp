<!DOCTYPE html>
<html>
<head>
	<title>Number Table</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script >
        $(document).ready(function() {
    $('#submit').click(function() {
        var number = $('#number').val();
        $.ajax({
            url: 'table.php',
            type: 'POST',
            data: {number: number},
            success: function(data) {
                $('#table-container').html(data);
            }
        });
    });
});
    </script>
</head>
<body>
	<label for="number">Enter a number:</label>
	<input type="number" id="number" name="number" min="1">
	<button id="submit">Submit</button>
	<div id="table-container"></div>
</body>
</html>


