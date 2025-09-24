<!DOCTYPE html>
<html lang="fa">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>تبریک برای ارسال ایمیل تست</title>
  <style>
    body {
      font-family: sans-serif;
      background-color: #f5f5f5;
      margin: 0;
      padding: 0;
      direction: rtl;
    }
    .container {
      max-width: 600px;
      margin: 40px auto;
      background-color: #fff;
      padding: 20px 30px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      border-radius: 8px;
      text-align: center;
    }
    h1 {
      font-size: 22px;
      font-weight: 700;
      margin-bottom: 15px;
      color: #333;
    }
    p {
      font-size: 16px;
      line-height: 1.5;
      color: #555;
      margin-bottom: 15px;
    }
    img {
      max-width: 100%;
      height: auto;
      border-radius: 5px;
      margin-bottom: 20px;
    }
    a:hover {
      border-left-width: 1em;
      min-height: 2em;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>{{$title}}</h1>
    <p>{{$body}}</p>
    <img src="https://assets-examples.mailtrap.io/integration-examples/welcome.png" alt="Inspect with Tabs" />
    <p>با احترام تیم آلفا</p>
  </div>
</body>
</html>
