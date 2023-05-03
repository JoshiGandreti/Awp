<!DOCTYPE html>
<html>
<head>
  <title>Accessing the GitHub API using Ajax and handling using JSON</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#getUserInfo').click(function() {
        var username = $('#username').val();
        $.ajax({
          type: 'GET',
          url: 'https://api.github.com/users/' + username,
          dataType: 'json',
          success: function(response) {
            $('#userInfo').html('<h2>' + response.login + '</h2><p><b>Public repos:</b>' + response.public_repos + '</p><p><b>Followers:</b> ' + response.followers + '</p>');
          },
          error: function(xhr, status, error) {
            console.log('Error: ' + error.message);
          }
        });
      });
    });
  </script>
</head>
<body>
  <input type="text" id="username" placeholder="Enter GitHub username">
  <button id="getUserInfo">Get User Info</button>
  <div id="userInfo"></div>
</body>
</html>
