<html>
<head>
<!-- selectpicker -->
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
</head>
    <input id = "divisions" type="hidden" value = "{{ url('divisions/div') }}">
<div class="container">
  <div class="row-fluid">
    <select class="selectpicker" data-live-search="true">
        <option>Tom Foolery</option>
        <option>Bill Gordon</option>
        <option>Elizabeth Warren</option>
        <option>Mario Flores</option>
        <option>Don Young</option>
        <option>Marvin Martinez</option>
    </select>
  </div>
</div>

<!-- selectpicker -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
</html> 

<script>
        var getDivisions = function()
    {
        $.ajax({
            url: $('#divisions').val(),
            type: 'get',
            success: function(divisions)
            {                
                $(divisions).each(function (index, division) {
                    // divi.push([
                    //     '<option value="' + division.no + '">' + division.no + ' ' + division.name + '</option>',
                    // ])
                    $('.selectpicker')+='<option value="' + division.no + '">' + division.no + ' ' + division.name + '</option>';
                })
                // $('.selectpicker').add(divi);
            },
        })
    }
    
    getDivisions();
    
</script>