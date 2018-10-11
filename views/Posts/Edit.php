<base href="<?php echo url("/") ?>">

<h2>EditPost</h2>
<form class="post-form" action= "<?php echo url("/posts/save/".$post_info['id']) ?>" method="POST">
	<input type="text" name="newPosts" placeholder="Write Your Post Here" value = "<?php echo $post_info['content']; ?>">
	<button type="submit" name="submit">EDIT</button>
</form>
