<script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script type="text/javascript">
    $(function(){
        $.ajax({
            type: 'PUT',
            url: 'http://api.timemanagement.dev/v1/test-put',
            data: {"name":"Ha Anh Man  22222", "age": 27},
            success: function(data) {
                console.log(data);
            }
        });
    });
</script>