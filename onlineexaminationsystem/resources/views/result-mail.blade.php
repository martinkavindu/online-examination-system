<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$data['title']}}</title>
</head>
<body>
  <P>

    <strong> Hello {{$data['name']}},</strong> Your exam({{$data['exam_name']}}) review passed,
    so now you can check your Marks.
  </P>
  
  <a href="{{$data['url']}}"> Click here to go to result page</a>

  <p>Thank you</p>
</body>
</html>