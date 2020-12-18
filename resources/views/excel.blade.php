<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Import Excel File</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('style.css') }}">

</head>
<body>
    <div class="container "> 
    <h1 class="bg-primary text-white" >Select Excel file to import in Database </h1><br><br>
        <div style="border-style: solid; border-width: thin;">
            <form action="import" method="POST" enctype="multipart/form-data">
                @csrf
                @if(session('errors'))
                    @foreach($errors as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                @endif
                @if(session('sucess'))
                    {{ session('sucess') }}
                @endif
                <br><br>
                <input type="file" name="file" id="file"><br><br>
                <button type="submit"> Upload File</button><br><br>
            </form>
        </div>
    </div>
</body>
</html>