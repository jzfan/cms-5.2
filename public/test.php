<!DOCTYPE html>
<html>
<head>
	<title></title>
  <link rel="stylesheet" href="/css/dropzone.min.css">
</head>
<body>

<div type="text" id="video" class='dropzone' style="display: inline-block">
                      </div>
</body>
<script src="/js/jquery-2.2.3.min.js"></script>
<script src="/js/dropzone.min.js"></script>
<script type="text/javascript">
Dropzone.autoDiscover = false;
$("div#video").dropzone({ url: "/backend/upload/video",
});
</script>
</html>