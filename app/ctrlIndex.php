<?php
/**
 * Created by PhpStorm.
 * User: alexz
 * Date: 01.11.2018
 * Time: 15:49
 */

class ctrlIndex extends ctrl {


    public function index()
    {
        $this->posts=  $this->db->query("SELECT post.id,post.title,post.author,post.ctime,post.post,COUNT(comment.id) as comments FROM post LEFT JOIN comment ON post.id = comment.postid GROUP BY post.id ORDER BY post.ctime DESC")->all();
        $this->popular = $this->db->query("SELECT post.id,post.title,post.author,post.ctime,post.post,COUNT(post.id) as comments FROM post LEFT JOIN comment ON post.id = comment.postid GROUP BY post.id ORDER BY comments DESC  LIMIT 5")->all();
        $this->out('posts.php');

    }

    public function add()
    {
        if (!empty($_POST))
        {
            $this->db->query("INSERT INTO post(author,ctime,title,post) VALUES(?,?,?,?)",htmlspecialchars($_POST['author']), date('Y-m-d H:i:s'), htmlspecialchars($_POST['title']),htmlspecialchars($_POST['post']));
            header("Location: /");
        }
    }

    public function delete($id)
    {
        $this->db->query("DELETE FROM post WHERE id = ?",$id);
        header("Location: /");
    }

    public function edit($id)
    {
        if (!empty($_POST)){
            $this->db->query("UPDATE post SET title = ?,post = ? WHERE id = ?",htmlspecialchars($_POST['title'],htmlspecialchars($_POST['post']),$id));
            header("Location: /");
        }
        $this->post = $this->db->query("SELECT * FROM post WHERE id = ?",$id)->assoc();
        $this->posts = $this->db->query("SELECT * FROM post ORDER BY ctime DESC")->all();
        $this->out('posts.php');
    }

    public function  post($id)
    {
        $this->post = $this->db->query("SELECT * FROM post WHERE id = ?",$id)->assoc();
        $this->comments = $this->db->query("SELECT * FROM comment WHERE postid = ? ORDER BY id DESC ",$id)->all();
        $this->out('post.php');
    }

    public function addcomment($postid)
    {
        $this->db->query("INSERT INTO comment (postid,name,post) VALUES (?,?,?)",$postid,htmlspecialchars($_POST['name']),htmlspecialchars($_POST['post']));
        header("Location: /?post/".intval($postid));
    }

    public function deletecom($commId,$postid)
    {
        $this->db->query("DELETE  FROM comment WHERE id=?",$commId);
        header("Location: /?post/".intval($postid));
    }
}