<html>
<meta charset="utf-8">
<title>pv</title>
<body>
<h1>list</h1>
<p>当前pv量：<span class="pv"></span></p>
<script src="./static/jquery.2.1.4.min.js"></script>
<script>
    $.get('addpv.php?name=list',function (res) {
        $('.pv').html(res);
    })
</script>
</body>
</html>