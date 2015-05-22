<?php
class Alanstormdotcom_Weblog_IndexController extends Mage_Core_Controller_Front_Action{

    public function testModelAction(){

        $params = $this->getRequest()->getParams();

//        var_dump($params);die;

        $blogpost = Mage::getModel('weblog/blogpost');
//        $resource = Mage::getResourceModel('weblog/core');
////        Zend_Debug::dump($resource);die;
////        Zend_Debug::dump($blogpost);die;
//
//        echo("Loading the blogpost with an ID of ". $params['id']);
//
        $blogpost->load($params['id']);
//
//        $mesage = $blogpost->setBlogpostId(23)? $blogpost->getBlogpostId() : "no";
//        echo $mesage;

        $data = $blogpost->getOrigTitle();
        Zend_debug::dump($data);

        $blogpost->setTitle("The title was set to update new title");

        $blogpost->save();echo"The title was change from: <h1>".$blogpost->getOrigData('title').'</h1> To: <h4>'. $blogpost->getTitle().'</h4>';die;


    }
    public function createNewPostAction(){
        $blogpost = Mage::getModel('weblog/blogpost');
        $blogpost->setTitle('created Post with date time');
        $blogpost->setPost('This post was create from code!');
        $blogpost->setDate(date('y-m-d h:i:s',time()));
        $blogpost->setTimestamp(time());
        $id = $blogpost->save();
        echo "Post created with date time: <h1>". $id ."</h1>";
    }
    public function editAction(){
        $id = $this->getRequest()->getParam('id');
        $blog = Mage::getModel('weblog/blogpost');
        $blog->load($id);
        $blog->setTitle('change by Edit action');
        $blog->save(); echo "Edited!";
    }
    public function deleteAction(){
        $id = $this->getRequest()->getParam('id');
        $blog = Mage::getModel('weblog/blogpost');
        $blog->load($id);
        $blog->delete();echo"deleted";
    }
    public function showAction(){
        $posts = Mage::getModel('weblog/blogpost')->getCollection();
        foreach($posts as $blog_post){
            echo'<h3>'.$blog_post->getTitle().'<h3>';
            echo nl2br($blog_post->getPost());

        }
    }

}