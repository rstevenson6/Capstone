<!DOCTYPE html>
<html lang = "en">

<head>
    <meta charset = "utf-8">
    <title>DBTest</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $.ajax({
                type: "POST",
                url: "/ajax/getInstructors",
                dataType: 'text',
                data: {name: "Fazackerley, Scott"},
                success: function(result){
                    $("#main-container").text(result);
                }
            });
        });
    </script>
</head>

<body>
Body!
<div id="main-container" class="container">
</div>
</body>

</html>