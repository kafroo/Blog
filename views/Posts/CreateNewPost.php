<base href="<?php echo url("/") ?>">

<h2>NewPost</h2>
<form class="post-form" action= "<?php echo url("/posts/submit") ?>" method="POST">
	<input type="text" name="newPosts" placeholder="Write Your Post Here">
	<button type="submit" name="submit">POST</button>
</form>