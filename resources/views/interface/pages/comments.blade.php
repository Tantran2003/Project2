
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 <?php foreach($post as $posts){ ?>  

        <h1>{{$posts->title}}</h1>

        <h3>{{$posts->description}}</h3>
    
 <?php } ?>
 <livewire:comments :model="$posts"/>
</body>
</html>