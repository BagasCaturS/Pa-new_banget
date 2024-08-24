<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>University Search</title>
  <style>
    .suggestion {
      padding: 5px 10px;
      cursor: pointer;
      background-color: #fff;
      transition: background-color 0.3s ease;
      position: relative;
      z-index: 1;
    }

    .suggestion:hover {
      background-color: #f1f1f1;
    }

    #suggestion-list {
      list-style-type: none;
      padding: 0;
      margin: 0;
      position: absolute;
      width: 100%;
      z-index: 2;
      max-height: 200px;
      overflow-y: auto;
    }
  </style>
</head>
<body>
  <div class="container">
    <input type="search" name="search" id="search" class="w-full p-2 border border-gray-300 rounded-md" placeholder="Enter university name">
    <ul id="suggestion-list"></ul>
    <button type="submit">Search</button>
  </div>

  <script src="main.js"></script>
</head>
</html>