<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @csrf
    <div id="tableData">
        @include('test.pagination')
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
<script>
    $('body').on('click','a',function(){
        event.preventDefault();
        let url = $(this).attr('href');
        let page = url.split('page=')['1'];
        getData(page)
    });
    function getData(page){
        token = $('input[name="_token"]').val();
        $.ajax({
            url: '{{ route('get_data') }}',
            method: 'post',
            data: {_token: token, page: page,},
            success:function(result){
                $('#tableData').html(result)
            }
        })
    }
</script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
</html>