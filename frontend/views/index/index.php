<?php
/**
 * Date: 2016/8/3
 * Time: 17:04
 */

?>
<!doctype html>
<html ng-app>
<head>
    <script src="/vendor/angular/angular.min.js"></script>
</head>
<body>
Your name: <input type="text" ng-model="yourname" placeholder="World">
<hr>
Hello {{yourname || 'World'}}!
</body>
</html>
