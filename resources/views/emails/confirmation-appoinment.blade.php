<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    {{-- @dd($appointment) --}}
    <h1 style="text-align: center; color:blue;">Welcome From Laravel Email</h1>
    <h1 style="text-align: center; color:blue;">{{$appointment->name}}</h1>
    <h1 style="text-align: center; color:blue;">{{$appointment->email}}</h1>
    <h1 style="text-align: center; color:blue;">{{$appointment->phone}}</h1>
    <h1 style="text-align: center; color:blue;">{{$appointment->doctor->name}}</h1>
    <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus dolores neque illo aspernatur. Quos, officia? Quo suscipit ipsum, dolores explicabo nemo, aspernatur a vel repellendus quisquam nesciunt quos nobis placeat sunt incidunt dicta quasi quia iste quidem facere optio reiciendis libero? Placeat distinctio officia ex perferendis nam ad molestias soluta incidunt iure veritatis amet nesciunt quos quasi odit ipsum quod reiciendis, tempore itaque maxime consectetur recusandae quae est, laborum quam! Cum earum mollitia, facilis ut sit possimus natus velit delectus deleniti? Magnam nulla repellendus suscipit error deleniti maxime cupiditate dignissimos praesentium explicabo, quidem nam vel vero consequuntur repellat nostrum consectetur.
    </p>
    <button style="border:3px solid #000; padding:5px;">Click Here</button>
</body>
</html>