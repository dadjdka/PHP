<html>
    <meta charset="utf-8">
    <title>pv</title>
<body>
    <h1>pv</h1>
    <p>当前pv量：<span class="pv"></span></p>

    <a href="list.php">列表页</a>
    <a href="inner.php">内容也</a>
<script src="./static/jquery.2.1.4.min.js"></script>
<script>
    $.get('addpv.php?name=index',function (res) {
        $('.pv').html(res);
    })
</script>
</body>
</html>