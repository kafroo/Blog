<a href = "<?php echo url("/posts/new")?>">NewPost</a>
<?php
 foreach ($posts as $post) {?>
			<div><?php echo $post['content']; ?></div>
            <a href = "<?php echo url("/posts/edit/". $post['id'])?>">Edit</a>
			<a href = "<?php echo url("/posts/delete/". $post['id'])?>">Delete</a>
		<?php }
?>

