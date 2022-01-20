<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    @php
        $url=json_decode($response);
    @endphp
    <br>
    <br>
    <a href={{$url->redirect_url}}  class="btn btn-primary">pagar</a>
    {{-- <button class="btn btn-primary"  onclick="pagar();">Pagar</button>
    <iframe src={{$url->redirect_url}} frameborder="0" style="display: none;" id="pagina">
    </iframe> --}}
</body>
<script>
const pagar = () => {
    const iframe = document.querySelector("pagina");
    iframe.style.display="block";
}
</script>
</html>
