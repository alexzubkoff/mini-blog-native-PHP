 <div class="container">
    <h2>Most popular posts</h2>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <img src="../img/blog.jpg" style="width:30%;">
                <div class="carousel-caption">
                    <h1><a href="/?post/<?=$this->popular[0]['id']?>"><?=$this->popular[0]['title']?></a></h1>
                    <p><strong>Author:&nbsp;</strong><?=$this->popular[0]['author']?></p>
                    <p><strong>Comments:&nbsp;</strong><?=$this->popular[0]['comments']?></p>
                </div>
            </div>

            <div class="item">
                <img src="../img/blog.jpg" style="width:30%;">
                <div class="carousel-caption">
                    <h1><a href="/?post/<?=$this->popular[1]['id']?>"><?=$this->popular[1]['title']?></a></h1>
                    <p><strong>Author:&nbsp;</strong><?=$this->popular[1]['author']?></p>
                    <p><strong>Comments:&nbsp;</strong><?=$this->popular[1]['comments']?></p>
                </div>
            </div>

            <div class="item">
                <img src="../img/blog.jpg" style="width:30%;">
                <div class="carousel-caption">
                    <h1><a href="/?post/<?=$this->popular[2]['id']?>"><?=$this->popular[2]['title']?></a></h1>
                    <p><strong>Author:&nbsp;</strong><?=$this->popular[2]['author']?></p>
                    <p><strong>Comments:&nbsp;</strong><?=$this->popular[2]['comments']?></p>
                </div>
            </div>
            <div class="item">
                <img src="../img/blog.jpg" style="width:30%;">
                <div class="carousel-caption">
                    <h1><a href="/?post/<?=$this->popular[3]['id']?>"><?=$this->popular[3]['title']?></a></h1>
                    <p><strong>Author:&nbsp;</strong><?=$this->popular[3]['author']?></p>
                    <p><strong>Comments:&nbsp;</strong><?=$this->popular[3]['comments']?></p>
                </div>
            </div>

            <div class="item">
                <img src="../img/blog.jpg" style="width:30%;">
                <div class="carousel-caption">
                    <h1><a href="/?post/<?=$this->popular[4]['id']?>"><?=$this->popular[4]['title']?></a></h1>
                    <p><strong>Author:&nbsp;</strong><?=$this->popular[4]['author']?></p>
                    <p><strong>Comments:&nbsp;</strong><?=$this->popular[4]['comments']?></p>
                </div>
            </div>

        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>

<h1>Posts:</h1>
<h1></h1>
<h1></h1>
<? foreach ($this->posts as $key =>$value ){?>
    <h3><a href="/?post/<?=$value['id']?>"><?=$value['title']?></a></h3>
    <div><strong>Author:&nbsp;</strong><?=nl2br($value['author']) ?></div>
    <div><strong>Date:&nbsp;</strong><?=nl2br($value['ctime']) ?></div>
    <div><strong>Post:&nbsp;</strong><?=nl2br(substr($value['post'],0,100)) ?>...</div>
    <div><strong>Comments:&nbsp;</strong><?=nl2br($value['comments']) ?></div>
    <span class=" btn-group"> <div>
            <a href="/?edit/<?=$value['id']?>"class="btn btn-mini btn-primary"><i class="icon-pencil"></i>Edit</a>
            <a href="/?delete/<?=$value['id']?>"class="btn btn-mini btn-danger" onclick="return confirm("Are you sure?");"><i class="icon-trash"></i>Delete</a>
        </div></span>

<?}?>

<h1></h1>

<form class="method-horizontal" action="/?add" method="post" >
    <input type="text" class="input-xxlarge" name="title" value="<?=@$this->post['title']?>" placeholder="Title"/>
    <input type="text" class="input-xxlarge" name="author" value="<?=@$this->post['author']?>" placeholder="Author"/>
    <div><textarea   class="input-xxlarge" name="post" style="height: 200px;width: 305px;" value="<?=@$this->post['author']?>" placeholder="Add post here"><?=@$this->post['post']?></textarea></div>

    <div class="form-actions"><button class="btn btn-primary" type="submit">Add</button></div>

</form>