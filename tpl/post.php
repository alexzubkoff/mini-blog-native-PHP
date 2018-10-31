
<h1><?=$this->post['title'];?></h1>

<div><strong>Author:&nbsp;</strong>
    <?=$this->post['author'];?>
</div>
<div><strong>Date:&nbsp;</strong>
    <?=$this->post['ctime'];?>
</div>
<div><strong>Post:&nbsp;</strong>
    <?=$this->post['post'];?>
</div>
<hr>

<div class="comments">
    <?php foreach ($this->comments as $c){?>
        <div class="comment"><b><?=$c['name']?></b>:  <?=$c['post']?>
        <a href="/?deletecom/<?=$c['id']?>/<?=$this->post['id']?>" class="btn btn-mini btn-danger">Delete</a>
        </div>
    <?}?>
    <h1>Add comments:</h1>
    <form action="/?addcomment/<?=$this->post['id']?>" class="form-inline well" method="POST">
        <label>Name</label><input type="text" name="name"><label>Comment</label>
        <input type="text" name="post"><button class="btn-mini btn-primary" type="submit">Add comment</button>
    </form

</div>
